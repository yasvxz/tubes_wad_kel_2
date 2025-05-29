<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = $request->input('tanggal') ?? now()->toDateString();
        $ruangans = Ruangan::orderBy('nama_ruangan')->get();
        $peminjamans = Peminjaman::whereDate('tanggal', $tanggal)->get()->groupBy('ruangan_id');

    return view('mahasiswa.peminjaman.index', compact('ruangans', 'peminjamans', 'tanggal'));
    }

    public function create()
    {
        $ruangans = Ruangan::where('tersedia', true)->get();
        return view('mahasiswa.peminjaman.create', compact('ruangans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ruangan_id' => 'required|exists:ruangans,ruangan_id',
            'tanggal' => 'required|date|after_or_equal:today',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'keperluan' => 'required',
        ]);

        Peminjaman::create([
            'user_id' => Auth::id(),
            'ruangan_id' => $request->ruangan_id,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'keperluan' => $request->keperluan,
        ]);

        return redirect()->route('mahasiswa.peminjaman.index')->with('success', 'Pengajuan berhasil dikirim.');


        
    }
}
