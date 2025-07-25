<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelanggan extends Model
{
    /** @use HasFactory<\Database\Factories\PelangganFactory> */
    use HasFactory;

    // protected $primaryKey = 'PelangganID';

    protected $fillable = [
        'Namapelanggan',
        'Alamat',
        'NoTelp'
    ];

    // protected $with = ['penjualan'];

    public function penjualan(): HasMany
    {
        return $this->hasMany(penjualan::class, 'PelangganID');
    }
}
