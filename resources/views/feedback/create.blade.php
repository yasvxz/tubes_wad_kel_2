@extends('layouts.app')
@section('content')
<h2>Buat Keluhan Baru</h2>
<form action="{{ route('feedbacks.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label>Judul:</label>
        <input type="text" name="title" required>
    </div>
    <div>
        <label>Deskripsi:</label>
        <textarea name="keluhan" required></textarea>
    </div>
    <div>
        <label>Lampiran (opsional):</label>
        <input type="file" name="attachment">
    </div>
    <button type="submit">Kirim Keluhan</button>
</form>
@endsection