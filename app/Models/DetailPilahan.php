<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DetailPilahan extends Model
{
    protected $fillable = [
        'setoran_sampah_id',
        'kategori_sampah_id',
        'berat_aktual',
        'status_kelayakan',
        'catatan',
        'foto_bukti',
    ];

    protected $casts = [
        'berat_aktual' => 'decimal:2',
    ];

    public const KELAYAKAN_LAYAK = 'layak';
    public const KELAYAKAN_TIDAK_LAYAK = 'tidak_layak';

    public function setoranSampah(): BelongsTo
    {
        return $this->belongsTo(SetoranSampah::class);
    }

    public function kategoriSampah(): BelongsTo
    {
        return $this->belongsTo(KategoriSampah::class);
    }

    public function distribusiDlh(): HasOne
    {
        return $this->hasOne(DistribusiDlh::class);
    }
}
