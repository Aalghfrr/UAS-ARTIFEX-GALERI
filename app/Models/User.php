<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory; // ✅ WAJIB untuk factory
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable; // ✅ Tambahkan HasFactory di sini

    /**
     * Kolom yang boleh diisi massal
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * Kolom yang disembunyikan saat dikonversi ke array/json
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * 🔹 Relasi: 1 User (Seniman) bisa punya banyak Artwork
     */
    public function artworks()
    {
        return $this->hasMany(Artwork::class, 'artist_id');
    }

    /**
     * 🔹 Relasi: 1 User (Pembeli) bisa punya banyak Cart
     */
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * 🔹 Relasi: 1 User bisa punya banyak Payment
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * 🔹 Relasi: 1 User bisa memberi banyak Like
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * 🔹 Relasi: 1 User bisa memberi banyak Comment
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
