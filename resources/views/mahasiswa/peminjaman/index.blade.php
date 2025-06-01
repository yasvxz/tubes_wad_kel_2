@extends('layouts.mahasiswa')

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
                      @if($pinjam->status === 'menunggu')
                        <span class="badge bg-warning text-dark">Menunggu</span>
                      @elseif($pinjam->status === 'disetujui')
                        <span class="badge bg-success">Disetujui</span>
                        @if(!$pinjam->feedback)
                          <button type="button" class="btn btn-sm btn-light mt-1" data-bs-toggle="modal" data-bs-target="#feedbackModal{{ $pinjam->peminjaman_id }}">
                            Beri Feedback
                          </button>
                        @endif
                      @elseif($pinjam->status === 'ditolak')
                        <span class="badge bg-danger">Ditolak</span>
                      @endif
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

  <!-- Feedback Modals -->
  @foreach($ruangans as $ruangan)
    @if(isset($peminjamans[$ruangan->ruangan_id]))
      @foreach($peminjamans[$ruangan->ruangan_id] as $pinjam)
        @if($pinjam->status === 'disetujui' && !$pinjam->feedback)
          <div class="modal fade" id="feedbackModal{{ $pinjam->peminjaman_id }}" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Beri Feedback - {{ $ruangan->nama_ruangan }}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('feedback.store') }}" method="POST">
                  @csrf
                  <div class="modal-body">
                    <input type="hidden" name="peminjaman_id" value="{{ $pinjam->peminjaman_id }}">
                    <div class="mb-3">
                      <label class="form-label">Feedback</label>
                      <textarea name="keluhan" class="form-control" rows="3" required placeholder="Berikan feedback Anda tentang peminjaman ruangan ini..."></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Kirim Feedback</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        @endif
      @endforeach
    @endif
  @endforeach
</div>
@endsection
