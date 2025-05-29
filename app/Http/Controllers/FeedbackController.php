<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FeedbackController extends Controller
{
    // User melihat daftar keluhan miliknya
    
    public function index()
    {
        $complaints = Feedback::where('user_id','peminjaman_id', Auth::id())->get();
        $feedbacks = Feedback::with(['user', 'peminjaman'])->get();
        return view('feedback.index', compact('feedbacks'));
    }

    // Form buat keluhan
    public function create()
    public function create($peminjaman_id)
    {
        return view('feedbacks.create');
        $peminjaman = Peminjaman::findOrFail($peminjaman_id);
        return view('feedbacks.create', compact('peminjaman'));
    }

    // Simpan keluhan

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'peminjaman_id' => 'required|exists:peminjamans,peminjaman_id',
            'keluhan' => 'required',
            'attachment' => 'nullable|file|max:2048'
        ]);

        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('feedbacks');
        }

        Complaint::create([
        Feedback::create([
            'user_id' => Auth::id(),
            'peminjaman_id' => Auth::id(),
            'title' => $request->title,
            'judul' => $request->title,
            'keluhan' => $request->description,
            'attachment' => $attachmentPath
        ]);

        return redirect()->route('feedbacks.index')->with('success', 'Keluhan berhasil dikirim.');
    }


    // Admin: Daftar semua keluhan
    public function adminIndex()
    {
        $complaints = Complaint::all();
        return view('feedbacks.admin', compact('feedbacks'));
    }
}