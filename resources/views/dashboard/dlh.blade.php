@extends('layouts.app')

@section('title', 'Dashboard DLH')

@section('content')
    <div class="page-head">
        <h1>Halo, {{ auth()->user()->name }}</h1>
        <p>Pantau dan tuntaskan sampah yang tidak layak daur ulang.</p>
    </div>

    <div class="stat-row">
        <div class="stat-card">
            <div class="label">Total diterima</div>
            <div class="value">{{ $distribusis->count() }}</div>
        </div>
        <div class="stat-card">
            <div class="label">Menunggu dikirim TPA</div>
            <div class="value">{{ $distribusis->where('status', 'diterima_dlh')->count() }}</div>
        </div>
        <div class="stat-card">
            <div class="label">Sudah terbuang</div>
            <div class="value">{{ $distribusis->where('status', 'terbuang')->count() }}</div>
        </div>
    </div>

    <div class="card">
        <h2>Distribusi sampah</h2>
        <p class="card-sub">Sampah tidak layak daur ulang yang diteruskan bank sampah ke DLH</p>

        @if ($distribusis->isEmpty())
            <div class="empty-state">Belum ada distribusi sampah masuk.</div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Kategori</th>
                        <th>Penyetor asal</th>
                        <th>Berat</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($distribusis as $distribusi)
                        <tr>
                            <td>{{ $distribusi->detailPilahan->kategoriSampah->nama ?? '—' }}</td>
                            <td>{{ $distribusi->detailPilahan->setoranSampah->penyetor->name ?? '—' }}</td>
                            <td>{{ $distribusi->detailPilahan->berat_aktual ?? '—' }} kg</td>
                            <td><span class="badge badge-{{ $distribusi->status }}">{{ str_replace('_', ' ', $distribusi->status) }}</span></td>
                            <td><button class="btn btn-ghost" disabled title="Segera hadir">Update status</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
