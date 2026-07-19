<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RekomendasiSampah extends Model
{
    protected $fillable = [
        'kategori_sampah_id',
        'judul',
        'deskripsi',
    ];

    public function kategoriSampah(): BelongsTo
    {
        return $this->belongsTo(KategoriSampah::class);
    }
}
