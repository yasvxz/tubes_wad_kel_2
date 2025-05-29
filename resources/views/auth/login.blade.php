@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100 bg-light">
  <div class="card shadow" style="width: 100%; max-width: 400px;">
    <div class="card-header text-center bg-primary text-white">
      <h4>Sistem Peminjaman Ruangan</h4>
    </div>
    <div class="card-body">
      @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif
      <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        <div class="mb-3">
          <label for="username_sso" class="form-label">Username SSO</label>
          <input type="text" name="username_sso" id="username_sso" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>
    </div>
  </div>
</div>
@endsection
