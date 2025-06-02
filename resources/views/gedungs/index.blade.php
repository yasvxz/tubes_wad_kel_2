@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Kelola Gedung</h3>
        <a href="{{ route('gedung.create') }}" class="btn btn-primary">+ Tambah Gedung</a>
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
                            <th>Nama Gedung</th>
                            <th>Lokasi</th>
                            <th>Deskripsi</th>
                            <th>Kapasitas Total</th>
                            <th>Jumlah Ruangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($gedungs as $gedung)
                            <tr>
                                <td>{{ $gedung->nama_gedung }}</td>
                                <td>{{ $gedung->lokasi ?? '-' }}</td>
                                <td>{{ $gedung->deskripsi ?? '-' }}</td>
                                <td>{{ number_format($gedung->kapasitas_total) }} orang</td>
                                <td>{{ $gedung->ruangans->count() }} ruangan</td>
                                <td>
                                    <a href="{{ route('gedung.edit', $gedung->gedung_id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('gedung.destroy', $gedung->gedung_id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus gedung ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada gedung.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 