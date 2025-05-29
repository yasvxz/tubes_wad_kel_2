@extends('layouts.app')

@section('content')
<div class="container py-5">
<h3>Selamat datang, {{ auth()->user()->nama }}</h3>
<a href="{{ route('logout') }}" class="btn btn-danger mt-3">Logout</a>
</div>
@endsection
