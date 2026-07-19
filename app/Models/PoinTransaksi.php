<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PoinTransaksi extends Model
{
    protected $fillable = [
        'user_id',
        'setoran_sampah_id',
        'jumlah_poin',
        'jenis',
        'keterangan',
    ];

    public const JENIS_MASUK = 'masuk';
    public const JENIS_KELUAR = 'keluar';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function setoranSampah(): BelongsTo
    {
        return $this->belongsTo(SetoranSampah::class);
    }
}
