<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    // halaman login
    public function index()
    {
        // kalau sudah login, jangan ke login lagi
        if (session('admin_login')) {
            return redirect('/admin/dashboard');
        }

        return view('admin.login');
    }

    // proses login (PASSWORD POLOS)
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = DB::table('admins')
            ->where('username', $request->username)
            ->first();

        // ⚠️ CEK PASSWORD POLOS (TANPA HASH)
        if (!$admin || $request->password !== $admin->password) {
            return back()->with('error', 'Username atau password salah');
        }

        // simpan session
        session([
            'admin_login' => true,
            'admin_id'    => $admin->id,
            'admin_name'  => $admin->username,
        ]);

        return redirect('/admin/dashboard');
    }

    // logout
    public function logout()
    {
        session()->flush();
        return redirect('/admin/login');
    }
}
