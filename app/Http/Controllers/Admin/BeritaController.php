<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function create()
    {
        return view('admin.berita.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'keyword' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'isi' => 'required|string',
            'status' => 'required|in:aktif,tidak',
        ]);

        Berita::create($request->all());

        return redirect()->route('berita.tambah')->with('success', 'Berita berhasil disimpan!');
    }
}
