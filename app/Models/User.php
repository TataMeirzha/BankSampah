<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public const ROLE_PENYETOR = 'penyetor';
    public const ROLE_BANK_SAMPAH = 'bank_sampah';
    public const ROLE_DLH = 'dlh';
    public const ROLE_ADMIN = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'is_verified',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_verified' => 'boolean',
        ];
    }

    public function alamat(): HasOne
    {
        return $this->hasOne(Alamat::class);
    }

    // Setoran yang diajukan user ini (role: penyetor)
    public function setoranSampahs(): HasMany
    {
        return $this->hasMany(SetoranSampah::class, 'user_id');
    }

    // Setoran yang ditangani user ini (role: bank_sampah)
    public function setoranDitangani(): HasMany
    {
        return $this->hasMany(SetoranSampah::class, 'bank_sampah_id');
    }

    // Distribusi yang ditangani user ini (role: dlh)
    public function distribusiDitangani(): HasMany
    {
        return $this->hasMany(DistribusiDlh::class, 'dlh_id');
    }

    // Kategori sampah & harga milik bank sampah ini (role: bank_sampah)
    public function kategoriSampahs(): HasMany
    {
        return $this->hasMany(KategoriSampah::class, 'bank_sampah_id');
    }

    public function poinTransaksis(): HasMany
    {
        return $this->hasMany(PoinTransaksi::class);
    }

    public function totalPoin(): int
    {
        return $this->poinTransaksis()->where('jenis', 'masuk')->sum('jumlah_poin')
            - $this->poinTransaksis()->where('jenis', 'keluar')->sum('jumlah_poin');
    }

    public function isPenyetor(): bool
    {
        return $this->role === self::ROLE_PENYETOR;
    }

    public function isBankSampah(): bool
    {
        return $this->role === self::ROLE_BANK_SAMPAH;
    }

    public function isDlh(): bool
    {
        return $this->role === self::ROLE_DLH;
    }

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }
}
