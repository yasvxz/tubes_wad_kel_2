@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Tambah Gedung</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('gedung.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="nama_gedung" class="form-label">Nama Gedung</label>
                            <input type="text" class="form-control @error('nama_gedung') is-invalid @enderror" 
                                id="nama_gedung" name="nama_gedung" value="{{ old('nama_gedung') }}" required>
                            @error('nama_gedung')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <input type="text" class="form-control @error('lokasi') is-invalid @enderror" 
                                id="lokasi" name="lokasi" value="{{ old('lokasi') }}">
                            @error('lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kapasitas_total" class="form-label">Kapasitas Total Gedung</label>
                            <div class="input-group">
                                <input type="number" class="form-control @error('kapasitas_total') is-invalid @enderror" 
                                    id="kapasitas_total" name="kapasitas_total" value="{{ old('kapasitas_total', 0) }}" min="0">
                                <span class="input-group-text">orang</span>
                            </div>
                            @error('kapasitas_total')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('gedung.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 