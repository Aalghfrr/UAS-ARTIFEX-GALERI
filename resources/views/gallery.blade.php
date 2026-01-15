@extends('layouts.app')

@section('content')

<div class="promo-banner">
    🌈 <strong>Promo Khusus Minggu Ini!</strong>
    Nikmati potongan harga hingga <span class="highlight">50%</span>
</div>

<h1 class="section-title">Koleksi Terbaru</h1>

<div class="product-grid">
@foreach ($artworks as $art)
    <div class="product-card">
        <div class="badge">🔥 POPULER</div>

        {{-- IMAGE AMAN --}}
        <img 
            src="{{ $art->image ? asset('storage/artworks/'.$art->image) : asset('images/default.png') }}" 
            alt="{{ $art->title }}"
        >

        <div class="product-info">
            <h3>{{ $art->title }}</h3>

            {{-- PASTI BACA artist_name --}}
            <p class="artist-name">by {{ $art->artist_name }}</p>

            {{-- TANPA Str BIAR AMAN --}}
            <p class="desc">
                {{ \Illuminate\Support\Str::limit($art->description, 80) }}
            </p>

            <p class="price">
                Rp {{ number_format($art->price, 0, ',', '.') }}
            </p>

            <form action="{{ url('/add-to-cart/'.$art->id) }}" method="POST">
                @csrf
                <input type="number" name="quantity" min="1" value="1">
                <button type="submit" class="btn-primary">
                    🛒 Beli Sekarang
                </button>
            </form>
        </div>
    </div>
@endforeach
</div>

@endsection
