@extends('layouts.app')

@section('content')
<div class="container">
  <h3 class="mb-3">Pesan Ruangan</h3>

  <form class="row g-3 mb-4">
    <div class="col-auto">
      <label class="form-label">Pilih Tanggal</label>
      <input type="date" name="tanggal" value="{{ $tanggal }}" class="form-control">
    </div>
    <div class="col-auto align-self-end">
      <button type="submit" class="btn btn-primary">Lihat Jadwal</button>
    </div>
  </form>

  <table class="table table-bordered text-center align-middle">
    <thead class="table-danger">
      <tr>
        <th>Ruangan</th>
        @for ($i = 8; $i <= 17; $i++)
          <th>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00</th>
        @endfor
      </tr>
    </thead>
    <tbody>
      @foreach($ruangans as $ruangan)
        <tr>
          <td class="text-start">
            {{ $ruangan->nama_ruangan }}
            <div class="text-muted small">{{ $ruangan->kapasitas }} orang</div>
          </td>
          @for ($i = 8; $i <= 17; $i++)
            <td style="background-color: 
              {{ isset($peminjamans[$ruangan->ruangan_id]) && $peminjamans[$ruangan->ruangan_id]->where('jam_mulai', '<=', $i.':00')->where('jam_selesai', '>', $i.':00')->count() > 0 ? '#fd7e14' : '' }}">
              @if(isset($peminjamans[$ruangan->ruangan_id]))
                @foreach($peminjamans[$ruangan->ruangan_id] as $pinjam)
                  @if($i.':00' >= $pinjam->jam_mulai && $i.':00' < $pinjam->jam_selesai)
                    <div class="text-white">
                      <small>{{ $pinjam->jam_mulai }}-{{ $pinjam->jam_selesai }}</small><br>
                      <small><em>{{ $pinjam->status }}</em></small>
                    </div>
                    @break
                  @endif
                @endforeach
              @endif
            </td>
          @endfor
        </tr>
      @endforeach
    </tbody>
  </table>

  <a href="{{ route('mahasiswa.peminjaman.create') }}" class="btn btn-success mt-3">Ajukan Peminjaman</a>
</div>
@endsection
