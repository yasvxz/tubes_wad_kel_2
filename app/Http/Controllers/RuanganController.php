<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index()
    {
        $ruangans = Ruangan::all();
        return view('ruangan.index', compact('ruangans'));
    }

    public function create()
    {
        return view('ruangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ruangan' => 'required',
            'gedung_id' => 'required|exists:gedungs,gedung_id',
            'kapasitas' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'tersedia' => 'required|boolean',
        ]);

        Ruangan::create($request->all());

        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $ruangan = Ruangan::findOrFail($id);
        return view('ruangan.edit', compact('ruangan'));
    }

    public function update(Request $request, $ruangan_id)
    {
        $ruangan = Ruangan::findOrFail($ruangan_id);

        $request->validate([
            'nama_ruangan' => 'required',
            'gedung_id' => 'required|exists:gedungs,gedung_id',
            'kapasitas' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'tersedia' => 'required|boolean',
        ]);

        $ruangan->update($request->all());

        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil diperbarui.');
    }

    public function destroy($ruangan_id)
    {
        Ruangan::destroy($ruangan_id);
        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil dihapus.');
    }
}
