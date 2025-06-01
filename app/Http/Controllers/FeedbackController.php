<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FeedbackController extends Controller
{
    // User melihat daftar keluhan miliknya
    public function index()
    {
        $complaints = Feedback::where('user_id','peminjaman_id', Auth::id())->get();
        return view('feedback.index', compact('feedbacks'));
    }

    // Form buat keluhan
    public function create()
    {
        return view('feedbacks.create');
    }

    // Simpan keluhan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'peminjaman_id' => 'required|exists:peminjamans,peminjaman_id',
            'keluhan' => 'required|string'
        ]);

        $validated['user_id'] = auth()->id();
        
        Feedback::create($validated);

        return redirect()->back()->with('success', 'Terima kasih atas feedback Anda!');
    }

    // Detail keluhan
    public function show(Feedback $feedback)
    {
        $this->authorize('view', $feedback);
        return view('feedbacks.show', compact('feedback'));
    }

    // Admin: Daftar semua keluhan
    public function adminIndex()
    {
        $feedbacks = Feedback::with(['user', 'peminjaman.ruangan'])->latest()->get();
        return view('admin.feedback.index', compact('feedbacks'));
    }
}