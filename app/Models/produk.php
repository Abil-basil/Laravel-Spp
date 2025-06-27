<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class produk extends Model
{
    /** @use HasFactory<\Database\Factories\ProdukFactory> */
    use HasFactory;

    // protected $primaryKey = 'ProdukID';

    protected $fillable = [
        'NamaProduk',
        'Harga',
        'Stok'
    ];

    public function detail(): HasMany
    {
        return $this->hasMany(DetailPenjualan::class, 'ProdukID');
    }
}
