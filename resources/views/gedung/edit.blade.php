@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Ruangan</h1>

    <form action="{{ route('ruangan.update', $ruangan) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
            <input type="text" class="form-control" name="nama_ruangan" value="{{ $ruangan->nama_ruangan }}" required>
        </div>

        <div class="mb-3">
            <label for="kapasitas" class="form-label">Kapasitas</label>
            <input type="number" class="form-control" name="kapasitas" value="{{ $ruangan->kapasitas }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi">{{ $ruangan->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="tersedia" class="form-label">Status</label>
            <select name="tersedia" class="form-select" required>
                <option value="1" {{ $ruangan->tersedia ? 'selected' : '' }}>Tersedia</option>
                <option value="0" {{ !$ruangan->tersedia ? 'selected' : '' }}>Tidak Tersedia</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="gedung_id" class="form-label">Gedung ID</label>
            <input type="text" class="form-control" name="gedung_id" value="{{ $ruangan->gedung_id }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
