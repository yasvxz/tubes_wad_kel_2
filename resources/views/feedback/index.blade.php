@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Feedback Mahasiswa</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Mahasiswa</th>
                <th>Ruangan</th>
                <th>Pesan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($feedbacks as $fb)
            <tr>
                <td>{{ $fb->user->name }}</td>
                <td>{{ $fb->peminjaman->ruangan->nama ?? 'N/A' }}</td>
                <td>{{ $fb->pesan }}</td>
                <td>{{ $fb->created_at->format('d M Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
