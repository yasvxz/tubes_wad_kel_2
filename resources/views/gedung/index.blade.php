@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Kelola Ruangan</h3>
        <a href="{{ route('ruangan.create') }}" class="btn btn-primary">+ Tambah Ruangan</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Ruangan</th>
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
                                <td>{{ $ruangan->kapasitas }} orang</td>
                                <td>{{ $ruangan->deskripsi }}</td>
                                <td>
                                    <span class="badge {{ $ruangan->tersedia ? 'bg-success' : 'bg-danger' }}">
                                        {{ $ruangan->tersedia ? 'Tersedia' : 'Tidak Tersedia' }}
                                    </span>
                                </td>
                                <td>{{ $ruangan->gedung->nama_gedung ?? $ruangan->gedung_id }}</td>
                                <td>
                                    <a href="{{ route('ruangan.edit', $ruangan->ruangan_id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('ruangan.destroy', $ruangan->ruangan_id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus ruangan ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada ruangan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
