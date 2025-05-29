@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Ruangan</h1>

    <a href="{{ route('ruangan.create') }}" class="btn btn-primary mb-3">+ Tambah Ruangan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>Kapasitas</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Gedung</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($ruangans as $ruangan)
                <tr>
                    <td>{{ $ruangan->nama_ruangan }}</td>
                    <td>{{ $ruangan->kapasitas }}</td>
                    <td>{{ $ruangan->deskripsi }}</td>
                    <td>{{ $ruangan->tersedia ? 'Tersedia' : 'Tidak Tersedia' }}</td>
                    <td>{{ $ruangan->gedung_id }}</td>
                    <td>
                        <a href="{{ route('ruangan.edit', $ruangan) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('ruangan.destroy', $ruangan) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">Belum ada ruangan.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
