<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    use HasFactory;

    protected $table = 'artworks';

    protected $fillable = [
        'artist_name',
        'title',
        'description',
        'price',
        'image',
    ];

    protected $casts = [
        'price' => 'integer',
    ];
}
