@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Ruangan</h1>

    <form action="{{ route('ruangan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
            <input type="text" class="form-control" name="nama_ruangan" required>
        </div>

        <div class="mb-3">
            <label for="kapasitas" class="form-label">Kapasitas</label>
            <input type="number" class="form-control" name="kapasitas" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi"></textarea>
        </div>

        <div class="mb-3">
            <label for="tersedia" class="form-label">Status</label>
            <select name="tersedia" class="form-select" required>
                <option value="1">Tersedia</option>
                <option value="0">Tidak Tersedia</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="gedung_id" class="form-label">Gedung ID</label>
            <input type="text" class="form-control" name="gedung_id" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
