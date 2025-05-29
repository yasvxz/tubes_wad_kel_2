<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanAdminController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with(['user', 'ruangan'])->latest()->get();
        return view('admin.peminjaman.index', compact('peminjamans'));
    }

    public function approve($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->status = 'disetujui';
        $peminjaman->alasan_penolakan = null;
        $peminjaman->save();

        return back()->with('success', 'Peminjaman disetujui.');
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'alasan_penolakan' => 'required'
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->status = 'ditolak';
        $peminjaman->alasan_penolakan = $request->alasan_penolakan;
        $peminjaman->save();

        return back()->with('success', 'Peminjaman ditolak.');
    }
}
