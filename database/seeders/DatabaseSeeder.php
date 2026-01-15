<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Jalankan semua seeder utama aplikasi
     */
    public function run(): void
    {
        // ✅ Jalankan seeder untuk mengisi data awal karya
        $this->call([
            ArtworksSeeder::class,
        ]);
    }
}
