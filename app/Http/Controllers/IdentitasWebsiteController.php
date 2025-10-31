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
        $identitas = Identitas::first() ?? new Identitas();
        $identitas->fill($request->except('favicon'));

        if ($request->hasFile('favicon')) {
            $path = $request->file('favicon')->store('favicon', 'public');
            $identitas->favicon = $path;
        }

        $identitas->save();

        return redirect()->route('admin.identitas.edit')->with('success', 'Data berhasil diperbarui!');
    }
}
