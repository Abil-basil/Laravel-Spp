<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
