<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produk extends Model
{
    /** @use HasFactory<\Database\Factories\ProdukFactory> */
    use HasFactory;

    protected $fillable = [
        'NamaProduk',
        'Harga',
        'Stok'
    ];

    public function DetailPenjualan(): HasMany
    {
        return $this->hasMany(DetailPenjualan::class, 'ProdukID');
    }
}
