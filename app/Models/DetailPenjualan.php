<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPenjualan extends Model
{
    /** @use HasFactory<\Database\Factories\DetailPenjualanFactory> */
    use HasFactory;

    protected $fillable = [
        'PenjualanID',
        'ProdukID',
        'JumlahProduk',
        'Subtotal'
    ];

    public function Penjualan(): BelongsTo
    {
        return $this->belongsTo(Penjualan::class, 'PenjualanID');
    }

    public function Produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class, 'ProdukID');
    }
}
