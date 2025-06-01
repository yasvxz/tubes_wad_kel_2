@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Manajemen Peminjaman Ruangan</h3>
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
                            <th>Mahasiswa</th>
                            <th>Ruangan</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Keperluan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($peminjamans as $p)
                        <tr>
                            <td>{{ $p->user->nama }} ({{ $p->user->nim }})</td>
                            <td>{{ $p->ruangan->nama_ruangan }}</td>
                            <td>{{ $p->tanggal }}</td>
                            <td>{{ $p->jam_mulai }} - {{ $p->jam_selesai }}</td>
                            <td>{{ $p->keperluan }}</td>
                            <td>
                                @if($p->status === 'menunggu')
                                    <span class="badge bg-warning text-dark">Menunggu</span>
                                @elseif($p->status === 'disetujui')
                                    <span class="badge bg-success">Disetujui</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span><br>
                                    <small><em>{{ $p->alasan_penolakan }}</em></small>
                                @endif
                            </td>
                            <td>
                                @if($p->status === 'menunggu')
                                    <form method="POST" action="{{ route('admin.peminjaman.acc', $p->peminjaman_id) }}" class="d-inline">
                                        @csrf
                                        <button class="btn btn-sm btn-success">Setujui</button>
                                    </form>

                                    <form method="POST" action="{{ route('admin.peminjaman.reject', $p->peminjaman_id) }}" class="d-inline">
                                        @csrf
                                        <input type="text" name="alasan_penolakan" class="form-control form-control-sm d-inline-block" style="width: 150px;" placeholder="Alasan" required>
                                        <button class="btn btn-sm btn-danger">Tolak</button>
                                    </form>
                                @else
                                    <em>-</em>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
