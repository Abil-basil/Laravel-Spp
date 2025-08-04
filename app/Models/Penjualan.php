<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penjualan extends Model
{
    /** @use HasFactory<\Database\Factories\PenjualanFactory> */
    use HasFactory;

    protected $fillable = [
        'TanggalPenjualan',
        'TotalHarga',
        'PenggunaID',
        'PelangganID'
    ];

    public function Pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class, 'PelangganID');
    }

    public function Pengguna(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'PenggunaID');
    }

    public function DetailPenjualan(): HasMany
    {
        return $this->hasMany(DetailPenjualan::class, 'PenjualanID');
    }
}
