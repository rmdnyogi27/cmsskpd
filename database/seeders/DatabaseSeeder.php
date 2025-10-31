<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Jalankan semua seeder aplikasi.
     */
    public function run(): void
    {
        // Jalankan seeder identitas
        $this->call(IdentitasSeeder::class);
    }
}
