<?php

namespace Database\Seeders;

use App\Models\Identitas;
use Illuminate\Database\Seeder;

class IdentitasSeeder extends Seeder
{
    public function run(): void
    {
        Identitas::create([
            'nama_website' => 'Website Resmi INDRAMAYU REANG',
            'email' => 'info@indramayureang.go.id',
            'domain' => 'www.indramayureang.go.id',
            'sosial_network' => 'https://facebook.com/indramayureang',
            'no_telpon' => '081234567890',
            'meta_deskripsi' => 'Website resmi pemerintah daerah Indramayu.',
            'meta_keyword' => 'indramayu, pemerintahan, website resmi',
            'google_maps' => '<iframe src="https://maps.google.com/..."></iframe>',
            'favicon' => null,
        ]);
    }
}
