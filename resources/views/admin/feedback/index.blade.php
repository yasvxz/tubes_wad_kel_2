@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Daftar Feedback</h3>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Tanggal</th>
                            <th>Mahasiswa</th>
                            <th>Ruangan</th>
                            <th>Waktu Peminjaman</th>
                            <th>Feedback</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($feedbacks as $feedback)
                            <tr>
                                <td>{{ $feedback->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    {{ $feedback->user->nama }}<br>
                                    <small class="text-muted">{{ $feedback->user->nim }}</small>
                                </td>
                                <td>{{ $feedback->peminjaman->ruangan->nama_ruangan }}</td>
                                <td>
                                    {{ $feedback->peminjaman->tanggal }}<br>
                                    <small>{{ $feedback->peminjaman->jam_mulai }} - {{ $feedback->peminjaman->jam_selesai }}</small>
                                </td>
                                <td>{{ $feedback->keluhan }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada feedback.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 