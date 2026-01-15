<?php
use App\Models\Artwork;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ArtistDashboardController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\PaymentController;
use App\Models\Like;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ArtworkController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



// ======================
// ✨ 1. LANDING PAGE
// ======================
Route::get('/welcome', function () {
    return view('landing');
})->name('landing');

// ======================
// 🏡 2. Redirect "/" ke landing
// ======================
Route::get('/', function () {
    return redirect()->route('landing');
});

// ======================
// 🎨 3. HALAMAN GALLERY
// ======================
Route::get('/gallery', function () {
    $artworks = Artwork::latest()->get();
    return view('welcome', compact('artworks'));
});


// ======================
// 👤 4. AUTH ROUTES (DENGAN LOGOUT GET)
// ======================
Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register');
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout'); // POST untuk form
    Route::get('/logout', 'logout')->name('logout.get'); // GET untuk link
});

// ======================
// 🔵 5. GOOGLE LOGIN
// ======================
Route::get('/auth/google', [GoogleLoginController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleLoginController::class, 'handleGoogleCallback']);

// ======================
// 🛍️ 6. SHOP & CART
// ======================  


Route::post('/cart/add/{id}', [ShopController::class,'addToCart'])->name('cart.add');
Route::get('/cart', [ShopController::class,'cart'])->name('cart');
Route::post('/cart/increase/{id}', [ShopController::class,'increase'])->name('cart.increase');
Route::post('/cart/decrease/{id}', [ShopController::class,'decrease'])->name('cart.decrease');

Route::get('/checkout', [ShopController::class,'checkout'])->name('checkout');
Route::post('/checkout', [ShopController::class,'processCheckout'])->name('checkout.process');

Route::get('/invoice', function () {
    return view('invoice', ['invoice' => session('invoice')]);
})->name('invoice');


// ======================
// 💳 7. PAYMENT
// ======================
Route::controller(PaymentController::class)->group(function () {
    Route::get('/payment', 'index')->name('payment');
    Route::post('/payment/process', 'process')->name('payment.process');
    Route::get('/payment/success', 'success')->name('payment.success');
    Route::get('/payment/cancel', 'cancel')->name('payment.cancel');
});

// ======================
// ❤️ 8. LIKE & 💬 COMMENT
// ======================
Route::middleware(['auth'])->group(function () {
    Route::post('/like/{artwork}', [LikeController::class, 'toggle'])->name('like.toggle');
    Route::post('/comment/{artwork}', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.delete');
});

// ======================
// 📊 9. API ROUTES
// ======================
Route::get('/api/artworks/{artwork}/likes', function ($artworkId) {
    return response()->json([
        'total' => Like::where('artwork_id', $artworkId)->count(),
    ]);
});

// ======================
// 🎨 10. ARTIST DASHBOARD
// ======================
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard-seniman',
        [ArtistDashboardController::class, 'index']
    )->name('seniman.dashboard');

    Route::get('/dashboard-seniman/create',
        [ArtistDashboardController::class, 'create']
    )->name('seniman.create');

    Route::post('/dashboard-seniman/store',
        [ArtistDashboardController::class, 'store']
    )->name('seniman.store');

    Route::get('/dashboard-seniman/edit/{id}',
        [ArtistDashboardController::class, 'edit']
    )->name('seniman.edit');

    Route::post('/dashboard-seniman/update/{id}',
        [ArtistDashboardController::class, 'update']
    )->name('seniman.update');
});



// ======================
// 📊 11. USER DASHBOARD
// ======================
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// ======================
// 🛠️ 12. ADMIN DASHBOARD
// ======================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::get('/users', [\App\Http\Controllers\AdminController::class, 'users'])->name('users');
    Route::get('/artworks', [\App\Http\Controllers\AdminController::class, 'artworks'])->name('artworks');
    Route::get('/transactions', [\App\Http\Controllers\AdminController::class, 'transactions'])->name('transactions');
});

// ======================
// 🔍 13. SEARCH
// ======================
Route::get('/search', function () {
    $query = request('q');
    $artworks = Artwork::where('title', 'like', "%{$query}%")
        ->orWhere('description', 'like', "%{$query}%")
        ->with('artist')
        ->latest()
        ->get();
    
    return view('search', compact('artworks', 'query'));
})->name('search');

// ======================
// 📞 14. CONTACT
// ======================
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// ======================
// ℹ️ 15. ABOUT
// ======================
Route::get('/about', function () {
    return view('about');
})->name('about');

// ======================
// 🎨 16. FIX: ROUTE UNTUK dashboard.seniman (jika masih diperlukan)
// ======================


// =============================
// 🧾 INVOICE (FINAL & AMAN)
// =============================
Route::get('/invoice', function () {

    if (!session()->has('invoice')) {
        return redirect('/gallery')->with('error', 'Invoice tidak ditemukan');
    }

    $invoice = session('invoice');

    return view('invoice', compact('invoice'));

})->name('invoice');


/*
|--------------------------------------------------------------------------
| ADMIN LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', function () {
    if (session('admin_login')) {
        return redirect('/admin/dashboard');
    }
    return view('admin.login');
});

Route::post('/admin/login', function (Request $request) {

    $admin = DB::table('admins')
        ->where('username', $request->username)
        ->where('password', $request->password) // TANPA BCRYPT
        ->first();

    if (!$admin) {
        return back()->with('error', 'Username atau password salah');
    }

    session([
        'admin_login' => true,
        'admin_id'    => $admin->id,
        'admin_name'  => $admin->username
    ]);

    return redirect('/admin/dashboard');
});

Route::get('/admin/logout', function () {
    session()->flush();
    return redirect('/admin/login');
});


/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', function () {

    if (!session('admin_login')) {
        return redirect('/admin/login');
    }

    return view('admin.dashboard');
});


/*
|--------------------------------------------------------------------------
| ARTWORKS CRUD (ADMIN) – FIXED
|--------------------------------------------------------------------------
*/

// Index
Route::get('/admin/artworks', function () {

    if (!session('admin_login')) {
        return redirect('/admin/login');
    }

    $artworks = DB::table('artworks')->get();
    return view('admin.artworks.index', compact('artworks'));
});

// Create form
Route::get('/admin/artworks/create', function () {

    if (!session('admin_login')) {
        return redirect('/admin/login');
    }

    return view('admin.artworks.create');
});

// Store artwork – diperbaiki supaya menyimpan semua field
Route::post('/admin/artworks/store', function (Request $request) {

    if (!session('admin_login')) {
        return redirect('/admin/login');
    }

    $request->validate([
        'title'       => 'required|string|max:255',
        'artist_name' => 'required|string|max:255',
        'price'       => 'required|numeric',
        'description' => 'nullable|string',
        'image'       => 'nullable|string', // URL IMAGE
    ]);

    Artwork::create([
        'title'       => $request->title,
        'artist_name' => $request->artist_name,
        'price'       => $request->price,
        'description' => $request->description,
        'image'       => $request->image, // URL LANGSUNG
    ]);

    return redirect('/admin/artworks');
});
// Edit form
Route::get('/admin/artworks/edit/{id}', function ($id) {

    if (!session('admin_login')) {
        return redirect('/admin/login');
    }

    $artwork = DB::table('artworks')->where('id', $id)->first();
    return view('admin.artworks.edit', compact('artwork'));
});

// Update artwork – diperbaiki supaya update semua field
Route::post('/admin/artworks/update/{id}', function (Request $request, $id) {

    if (!session('admin_login')) {
        return redirect('/admin/login');
    }

    $request->validate([
        'title'       => 'required|string|max:255',
        'artist_name' => 'required|string|max:255',
        'price'       => 'required|numeric',
        'description' => 'nullable|string',
    ]);

    DB::table('artworks')->where('id', $id)->update([
        'title'       => $request->title,
        'artist_name' => $request->artist_name,
        'price'       => $request->price,
        'description' => $request->description,
        'updated_at'  => now()
    ]);

    return redirect('/admin/artworks');
});

// Delete artwork
Route::post('/admin/artworks/delete/{id}', function ($id) {

    if (!session('admin_login')) {
        return redirect('/admin/login');
    }

    DB::table('artworks')->where('id', $id)->delete();

    return redirect('/admin/artworks');
});

/*
|--------------------------------------------------------------------------
| USERS CRUD (ADMIN)
|--------------------------------------------------------------------------
*/

Route::get('/admin/users', function () {

    if (!session('admin_login')) {
        return redirect('/admin/login');
    }

    $users = DB::table('users')->get();
    return view('admin.users.index', compact('users'));
});

Route::get('/admin/users/delete/{id}', function ($id) {

    if (!session('admin_login')) {
        return redirect('/admin/login');
    }

    DB::table('users')->where('id', $id)->delete();
    return redirect('/admin/users');
});

Route::get('/admin/users/edit/{id}', function ($id) {

    if (!session('admin_login')) {
        return redirect('/admin/login');
    }

    $user = DB::table('users')->where('id', $id)->first();
    return view('admin.users.edit', compact('user'));
});

Route::post('/admin/users/update/{id}', function (Request $request, $id) {

    if (!session('admin_login')) {
        return redirect('/admin/login');
    }

    DB::table('users')->where('id', $id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'updated_at' => now()
    ]);

    return redirect('/admin/users');
});
