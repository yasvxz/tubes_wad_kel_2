<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use Illuminate\Http\Request;

class GedungController extends Controller
{
    public function index()
    {
        $gedungs = Gedung::withCount('ruangans')->get();
        return view('gedung.index', compact('gedungs'));
    }

    public function create()
    {
        return view('gedung.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_gedung' => 'required|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'kapasitas_total' => 'required|integer|min:0',
        ]);

        Gedung::create($request->all());

        return redirect()->route('gedung.index')->with('success', 'Gedung berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $gedung = Gedung::with('ruangans')->findOrFail($id);
        return view('gedung.edit', compact('gedung'));
    }

    public function update(Request $request, $id)
    {
        $gedung = Gedung::findOrFail($id);

        $request->validate([
            'nama_gedung' => 'required|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'kapasitas_total' => 'required|integer|min:0',
        ]);

        $gedung->update($request->all());

        return redirect()->route('gedung.index')->with('success', 'Gedung berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $gedung = Gedung::findOrFail($id);
        $gedung->delete();

        return redirect()->route('gedung.index')->with('success', 'Gedung berhasil dihapus.');
    }
} 