<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class penjualan extends Model
{
    /** @use HasFactory<\Database\Factories\PenjualanFactory> */
    use HasFactory;

    // protected $primaryKey = 'PenjualanID';

    protected $fillable = [
        'TanggalPenjualan',
        'TotalHarga',
        'PelangganID',
        'UserID'
    ];

    protected $with = ['pengguna', 'pelanggan', 'detail'];

    public function pengguna (): BelongsTo
    {
        return $this->belongsTo(User::class, 'UserID'); //nama fk
    }

    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class, 'PelangganID'); //nama fk
    }

    public function detail () : HasMany
    {
        return $this->hasMany(DetailPenjualan::class, 'PenjualanID');
    }
}
