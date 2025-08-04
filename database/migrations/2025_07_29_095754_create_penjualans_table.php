<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->string('TanggalPenjualan');
            $table->decimal('TotalHarga');
            $table->foreignId('PenggunaID')->constrained(
                table: 'penggunas',
                indexName: 'penjualan_pengguna_id'
            );
            $table->foreignId('PelangganID')->constrained(
                table: 'pelanggans',
                indexName: 'penjualan_pelanggan_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
