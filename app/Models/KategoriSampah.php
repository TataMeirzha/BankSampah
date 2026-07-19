<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriSampah extends Model
{
    protected $fillable = [
        'bank_sampah_id',
        'nama',
        'deskripsi',
        'satuan',
        'harga_per_kg',
        'is_active',
    ];

    protected $casts = [
        'harga_per_kg' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function bankSampah(): BelongsTo
    {
        return $this->belongsTo(User::class, 'bank_sampah_id');
    }

    public function rekomendasi(): HasMany
    {
        return $this->hasMany(RekomendasiSampah::class);
    }

    public function detailPilahans(): HasMany
    {
        return $this->hasMany(DetailPilahan::class);
    }
}
