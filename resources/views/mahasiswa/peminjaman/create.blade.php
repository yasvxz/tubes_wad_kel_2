@extends('layouts.mahasiswa')

@section('content')
<div class="container">
  <h3>Form Peminjaman Ruangan</h3>
  <form method="POST" action="{{ route('mahasiswa.peminjaman.store') }}">
    @csrf

    <div class="mb-3">
      <label>Ruangan</label>
      <select name="ruangan_id" class="form-control">
        @foreach($ruangans as $ruangan)
          <option value="{{ $ruangan->ruangan_id }}">{{ $ruangan->nama_ruangan }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label>Tanggal</label>
      <input type="date" name="tanggal" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Jam Mulai</label>
      <input type="time" name="jam_mulai" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Jam Selesai</label>
      <input type="time" name="jam_selesai" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Keperluan</label>
      <textarea name="keperluan" class="form-control" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Ajukan Peminjaman</button>
  </form>
</div>
@endsection
