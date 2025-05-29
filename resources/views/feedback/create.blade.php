@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Beri Feedback untuk Peminjaman Ruangan</h2>
    <form action="{{ route('feedbacks.store') }}" method="POST">
        @csrf
        <input type="hidden" name="peminjaman_id" value="{{ $peminjaman->id }}">
        
        <div class="mb-3">
            <label for="pesan" class="form-label">Keluhan / Feedback</label>
            <textarea name="pesan" id="pesan" rows="4" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>
@endsection
