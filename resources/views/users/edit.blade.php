@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit User</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->user_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $user->nama }}">
        </div>

        <div class="mb-3">
            <label>NIM</label>
            <input type="text" name="nim" class="form-control" value="{{ $user->nim }}">
        </div>

        <div class="mb-3">
            <label>Username SSO</label>
            <input type="text" name="username_sso" class="form-control" value="{{ $user->username_sso }}">
        </div>

        <div class="mb-3">
            <label>Password (kosongin kalau gak diubah)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control">
                <option value="mahasiswa" {{ $user->role === 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
