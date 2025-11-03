<?php

namespace App\Http\Controllers;

use App\Models\Identitas;
use Illuminate\Http\Request;

class IdentitasWebsiteController extends Controller
{
    public function edit()
    {
        // Ambil data pertama dari tabel identitas
        $identitas = Identitas::first();

        // Kirim data ke view
        return view('admin.submenu1', compact('identitas'));
    }

    public function update(Request $request)
    {
        $identitas = Identitas::first();
        $identitas->update($request->all());

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }
}

