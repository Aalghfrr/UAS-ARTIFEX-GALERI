<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Fotoyu - Galeri Seniman Digital</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>

    <nav class="navbar">
        <div class="nav-left">
            <a href="{{ url('/') }}" class="logo">🎨 Fotoyu</a>
        </div>

        <div class="nav-center">
            <a href="{{ url('/') }}">Beranda</a>
            <a href="{{ url('/cart') }}">Keranjang 🛒 (<span id="cart-count">{{ session('cart_count', 0) }}</span>)</a>
            @auth
                <a href="{{ url('/artist/dashboard') }}">Karya Saya</a>
            @endauth
        </div>

        <div class="nav-right">
            @auth
                <span class="user-name">👋 {{ Auth::user()->name }}</span>
                <a href="{{ url('/logout') }}" class="logout-btn">Logout</a>
            @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            @endauth
        </div>
    </nav>

    <div class="content">
        @yield('content')
    </div>

    <footer>
        <p>© 2025 Fotoyu — Platform Karya Digital Indonesia</p>
    </footer>

</body>
</html>
