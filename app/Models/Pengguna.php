<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengguna extends Model
{
    /** @use HasFactory<\Database\Factories\PenggunaFactory> */
    use HasFactory;

    protected $fillable = [
        'Username',
        'Password',
        'Email',
        'Peran'
    ];

    public function penjualan() : HasMany
    {
        return $this->hasMany(Penjualan::class, 'PenggunaID');
    }
}
