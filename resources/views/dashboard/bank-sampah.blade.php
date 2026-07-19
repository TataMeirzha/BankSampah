@extends('layouts.app')

@section('title', 'Dashboard Bank Sampah')

@section('content')
    <div class="page-head">
        <h1>Halo, {{ auth()->user()->name }}</h1>
        <p>Kelola setoran sampah yang masuk dari warga di sekitarmu.</p>
    </div>

    <div class="stat-row">
        <div class="stat-card">
            <div class="label">Total setoran masuk</div>
            <div class="value">{{ $setorans->count() }}</div>
        </div>
        <div class="stat-card">
            <div class="label">Menunggu verifikasi</div>
            <div class="value">{{ $setorans->where('status', 'menunggu')->count() }}</div>
        </div>
        <div class="stat-card">
            <div class="label">Sudah dipilah</div>
            <div class="value">{{ $setorans->whereIn('status', ['dipilah', 'selesai'])->count() }}</div>
        </div>
    </div>

    <div class="card">
        <h2>Setoran masuk</h2>
        <p class="card-sub">Setoran dari penyetor yang ditujukan ke bank sampah kamu</p>

        @if ($setorans->isEmpty())
            <div class="empty-state">Belum ada setoran masuk. Fitur agar penyetor bisa memilih bank sampah tertentu akan segera hadir.</div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Penyetor</th>
                        <th>Deskripsi</th>
                        <th>Estimasi berat</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($setorans as $setoran)
                        <tr>
                            <td>{{ $setoran->tanggal_setor->translatedFormat('d M Y') }}</td>
                            <td>{{ $setoran->penyetor->name ?? '—' }}</td>
                            <td>{{ Str::limit($setoran->deskripsi, 50) }}</td>
                            <td>{{ $setoran->estimasi_berat ? $setoran->estimasi_berat.' kg' : '—' }}</td>
                            <td><span class="badge badge-{{ $setoran->status }}">{{ str_replace('_', ' ', $setoran->status) }}</span></td>
                            <td><button class="btn btn-ghost" disabled title="Segera hadir">Pilah</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
