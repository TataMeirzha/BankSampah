<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DistribusiDlh extends Model
{
    protected $table = 'distribusi_dlhs';

    protected $fillable = [
        'detail_pilahan_id',
        'dlh_id',
        'status',
        'tanggal_terima',
        'tanggal_kirim_tpa',
        'tanggal_terbuang',
        'bukti_foto',
        'catatan',
    ];

    protected $casts = [
        'tanggal_terima' => 'datetime',
        'tanggal_kirim_tpa' => 'datetime',
        'tanggal_terbuang' => 'datetime',
    ];

    public const STATUS_DITERIMA_DLH = 'diterima_dlh';
    public const STATUS_DIKIRIM_TPA = 'dikirim_tpa';
    public const STATUS_TERBUANG = 'terbuang';

    public function detailPilahan(): BelongsTo
    {
        return $this->belongsTo(DetailPilahan::class);
    }

    public function dlh(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dlh_id');
    }
}
