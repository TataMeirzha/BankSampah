<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SetoranSampah extends Model
{
    protected $fillable = [
        'user_id',
        'bank_sampah_id',
        'deskripsi',
        'foto',
        'estimasi_berat',
        'status',
        'tanggal_setor',
        'catatan_bank_sampah',
    ];

    protected $casts = [
        'estimasi_berat' => 'decimal:2',
        'tanggal_setor' => 'datetime',
    ];

    // Nilai status yang valid, dipakai untuk validasi & dropdown di form
    public const STATUS_MENUNGGU = 'menunggu';
    public const STATUS_DIVERIFIKASI = 'diverifikasi';
    public const STATUS_DIPILAH = 'dipilah';
    public const STATUS_SELESAI = 'selesai';

    public function penyetor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bankSampah(): BelongsTo
    {
        return $this->belongsTo(User::class, 'bank_sampah_id');
    }

    public function detailPilahans(): HasMany
    {
        return $this->hasMany(DetailPilahan::class);
    }

    public function poinTransaksis(): HasMany
    {
        return $this->hasMany(PoinTransaksi::class);
    }
}
