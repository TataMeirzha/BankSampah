@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="page-head">
        <h1>Halo, {{ auth()->user()->name }}</h1>
        <p>Panel admin.</p>
    </div>

    <div class="card">
        <h2>Segera hadir</h2>
        <p class="card-sub">Verifikasi akun bank sampah &amp; DLH, dan ringkasan sistem akan tampil di sini.</p>
    </div>
@endsection
