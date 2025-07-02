<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPenjualan extends Model
{
    /** @use HasFactory<\Database\Factories\DetailPenjualanFactory> */
    use HasFactory;

    // protected $guarded = [
    //     'PenjualanID'
    // ];

    protected $fillable = [
        'PenjualanID',
        'ProdukID',
        'JumlahProduk',
        'Subtotal'
    ];

    public function penjualan (): BelongsTo
    {
        return $this->belongsTo(penjualan::class, 'PenjualanID'); //nama fk
    }

    public function produk (): BelongsTo
    {
        return $this->belongsTo(produk::class, 'ProdukID'); //nama fk
    }
}
