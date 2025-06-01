<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with(['user', 'ruangan'])->get();
        return response()->json([
            'status' => 'success',
            'data' => $peminjamans
        ]);
    }

    public function show($id)
    {
        $peminjaman = Peminjaman::with(['user', 'ruangan'])->find($id);
        
        if (!$peminjaman) {
            return response()->json([
                'status' => 'error',
                'message' => 'Peminjaman not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $peminjaman
        ]);
    }
}
