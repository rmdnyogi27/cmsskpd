<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    /**
     * Menampilkan daftar semua vidio.
     * Rute: route('route_untuk_daftar_vidio')
     */
    public function index()
    {
        // Di sini seharusnya Anda mengambil data vidio dari database (Model Vidio)
        // Contoh: $videos = Vidio::all();

        // Data dummy untuk contoh
        $videos = [
            (object)['id' => 1, 'judul' => 'Peresmian Kantor Baru', 'uploader' => 'Admin', 'tanggal' => '2025-10-20'],
            (object)['id' => 2, 'judul' => 'Festival Budaya Indramayu', 'uploader' => 'Admin', 'tanggal' => '2025-10-25'],
        ];

        return view('web.index', compact('videos'));
    }

    /**
     * Menampilkan formulir untuk membuat vidio baru.
     * Rute: route('route_untuk_tambah_vidio')
     */
    public function create()
    {
        return view('web.create');
    }

    // Anda bisa tambahkan fungsi store(Request $request), edit($id), dll.
}