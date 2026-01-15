<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

class GoogleLoginController extends Controller
{
    private $clientId;
    private $clientSecret;
    private $redirectUri;

    public function __construct()
    {
        $this->clientId = env('GOOGLE_CLIENT_ID');
        $this->clientSecret = env('GOOGLE_CLIENT_SECRET');
        $this->redirectUri = env('GOOGLE_REDIRECT_URI', 'http://localhost:8000/auth/google/callback');
    }

    /**
     * Redirect to Google OAuth (FAST VERSION)
     */
    public function redirectToGoogle()
    {
        // Simple redirect tanpa try-catch yang berat
        $params = [
            'client_id' => $this->clientId,
            'redirect_uri' => $this->redirectUri,
            'response_type' => 'code',
            'scope' => 'openid email profile',
            'access_type' => 'offline',
            'prompt' => 'consent',
        ];

        $authUrl = 'https://accounts.google.com/o/oauth2/v2/auth?' . http_build_query($params);
        return redirect()->away($authUrl);
    }

    /**
     * Handle Google OAuth callback (OPTIMIZED FOR SPEED)
     */
    public function handleGoogleCallback(Request $request)
    {
        $code = $request->get('code');
        
        if (!$code) {
            return redirect()->route('login')->with('error', 'Authorization code not found.');
        }

        try {
            // 1. GET ACCESS TOKEN (gunakan timeout pendek)
            $tokenResponse = Http::timeout(10)->asForm()->post('https://oauth2.googleapis.com/token', [
                'code' => $code,
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'redirect_uri' => $this->redirectUri,
                'grant_type' => 'authorization_code',
            ]);

            if (!$tokenResponse->successful()) {
                return redirect()->route('login')->with('error', 'Failed to get access token from Google.');
            }

            $tokenData = $tokenResponse->json();
            $accessToken = $tokenData['access_token'];

            // 2. GET USER INFO (gunakan timeout pendek)
            $userResponse = Http::timeout(10)->withToken($accessToken)->get('https://www.googleapis.com/oauth2/v3/userinfo');
            
            if (!$userResponse->successful()) {
                return redirect()->route('login')->with('error', 'Failed to get user information from Google.');
            }

            $googleUser = $userResponse->json();

            // 3. FIND OR CREATE USER (OPTIMIZED QUERY)
            $user = $this->findOrCreateUser($googleUser);

            // 4. LOGIN USER (FAST SESSION)
            $this->fastLogin($user);

            // 5. REDIRECT KE HOME TANPA LOAD DATA BERAT
            return redirect()->route('home')->with('success', 'Welcome back!');

        } catch (\Exception $e) {
            \Log::error('Google Login Error: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Login failed. Please try again.');
        }
    }

    /**
     * Optimized user find/create
     */
    private function findOrCreateUser($googleUser)
    {
        // Gunakan cache untuk cek user
        $cacheKey = 'google_user_' . md5($googleUser['email']);
        
        return Cache::remember($cacheKey, 300, function () use ($googleUser) {
            $user = User::where('email', $googleUser['email'])->first();
            
            if (!$user) {
                // Buat user baru dengan data minimal
                $user = User::create([
                    'name' => $googleUser['name'] ?? explode('@', $googleUser['email'])[0],
                    'email' => $googleUser['email'],
                    'google_id' => $googleUser['sub'],
                    'avatar' => $googleUser['picture'] ?? null,
                    'password' => Hash::make(bin2hex(random_bytes(16))), // Password random simple
                    'email_verified_at' => now(),
                ]);
                
                // Jangan langsung assign role atau buat data berat
                // $user->assignRole('user'); // Jika perlu, lakukan di background
                
            } elseif (!$user->google_id) {
                // Update hanya field yang perlu
                $user->update([
                    'google_id' => $googleUser['sub'],
                    'avatar' => $googleUser['picture'] ?? $user->avatar
                ]);
            }
            
            return $user;
        });
    }

    /**
     * Fast login tanpa session yang berat
     */
    private function fastLogin($user)
    {
        // Login tanpa "remember me" untuk session yang lebih ringan
        Auth::login($user, false);
        
        // Set session minimal
        session([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_email' => $user->email,
        ]);
        
        // Regenerate session ID untuk security
        session()->regenerate();
    }

    /**
     * Ultra simple callback (jika masih lambat)
     */
    public function handleGoogleCallbackSimple(Request $request)
    {
        $code = $request->get('code');
        
        if (!$code) {
            return redirect()->route('login');
        }

        // Simple token exchange
        $tokenData = [
            'code' => $code,
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'redirect_uri' => $this->redirectUri,
            'grant_type' => 'authorization_code',
        ];

        // Gunakan curl yang lebih cepat
        $ch = curl_init('https://oauth2.googleapis.com/token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($tokenData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5); // Timeout 5 detik
        
        $tokenResponse = curl_exec($ch);
        curl_close($ch);

        $tokenData = json_decode($tokenResponse, true);
        
        if (!isset($tokenData['access_token'])) {
            return redirect()->route('login');
        }

        // Get user info dengan curl juga
        $ch = curl_init('https://www.googleapis.com/oauth2/v3/userinfo?access_token=' . $tokenData['access_token']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        
        $userResponse = curl_exec($ch);
        curl_close($ch);
        
        $googleUser = json_decode($userResponse, true);

        if (!isset($googleUser['email'])) {
            return redirect()->route('login');
        }

        // Cari user langsung tanpa cache
        $user = User::where('email', $googleUser['email'])->first(['id', 'name', 'email', 'google_id', 'avatar']);
        
        if (!$user) {
            $user = User::create([
                'name' => $googleUser['name'] ?? $googleUser['email'],
                'email' => $googleUser['email'],
                'google_id' => $googleUser['sub'] ?? null,
                'avatar' => $googleUser['picture'] ?? null,
                'password' => Hash::make(uniqid()), // Password simple
            ]);
        }

        // Login cepat
        Auth::login($user, false);
        
        // Redirect langsung tanpa session yang berat
        return redirect()->to('/gallery?logged_in=1');
    }
}