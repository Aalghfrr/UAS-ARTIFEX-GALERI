<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel artworks.
     */
    public function up(): void
    {
        Schema::create('artworks', function (Blueprint $table) {
            $table->id();

            // Relasi ke user (seniman pemilik karya)
            $table->foreignId('artist_id')
                ->constrained('users')
                ->onDelete('cascade');

            // Informasi karya seni
            $table->string('title');                 // Judul karya
            $table->text('description')->nullable(); // Deskripsi detail karya
            $table->bigInteger('price')->default(0); // Harga karya
            $table->text('image')->nullable();       // Lokasi file / URL artwork

            // Waktu pembuatan & update otomatis
            $table->timestamps();
        });
    }

    /**
     * Undo migrasi
     */
    public function down(): void
    {
        Schema::dropIfExists('artworks');
    }
};
