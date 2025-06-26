<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class penjualan extends Model
{
    /** @use HasFactory<\Database\Factories\PenjualanFactory> */
    use HasFactory;

    // protected $primaryKey = 'PenjualanID';

    protected $guarded = [
        'PenjualanID',
        'PelangganID',
        'UserID'
    ];

    protected $with = ['pengguna', 'pelanggan'];

    public function pengguna (): BelongsTo
    {
        return $this->belongsTo(User::class, 'UserID'); //nama fk
    }

    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class, 'PelangganID'); //nama fk
    }
}
