@extends('layouts.app')

@section('title', 'Dashboard Penyetor')

@section('content')
    <div class="page-head">
        <h1>Halo, {{ auth()->user()->name }}</h1>
        <p>Pantau riwayat setoran sampah dan poin kamu di sini.</p>
    </div>

    <div class="stat-row">
        <div class="stat-card">
            <div class="label">Total poin</div>
            <div class="value">{{ number_format($totalPoin) }}</div>
        </div>
        <div class="stat-card">
            <div class="label">Total setoran</div>
            <div class="value">{{ $setorans->count() }}</div>
        </div>
        <div class="stat-card">
            <div class="label">Menunggu diproses</div>
            <div class="value">{{ $setorans->where('status', 'menunggu')->count() }}</div>
        </div>
    </div>

    <div class="card">
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom: 18px;">
            <div>
                <h2 style="margin-bottom:2px;">Riwayat setoran</h2>
                <p class="card-sub" style="margin:0;">Semua sampah yang pernah kamu setorkan</p>
            </div>
            <button class="btn btn-primary" disabled title="Segera hadir">+ Setoran baru</button>
        </div>

        @if ($setorans->isEmpty())
            <div class="empty-state">Belum ada setoran. Fitur untuk membuat setoran baru akan segera hadir.</div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                        <th>Bank sampah</th>
                        <th>Estimasi berat</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($setorans as $setoran)
                        <tr>
                            <td>{{ $setoran->tanggal_setor->translatedFormat('d M Y') }}</td>
                            <td>{{ Str::limit($setoran->deskripsi, 60) }}</td>
                            <td>{{ $setoran->bankSampah->name ?? '—' }}</td>
                            <td>{{ $setoran->estimasi_berat ? $setoran->estimasi_berat.' kg' : '—' }}</td>
                            <td><span class="badge badge-{{ $setoran->status }}">{{ str_replace('_', ' ', $setoran->status) }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
