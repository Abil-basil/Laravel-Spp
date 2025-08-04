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
        Schema::create('detail_penjualans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('PenjualanID')->constrained(
                table: 'penjualans',
                indexName: 'penjulan_id'
            );
            $table->foreignId('ProdukID')->constrained(
                table: 'produks',
                indexName: 'produk_id'
            );
            $table->integer('JumlahProduk');
            $table->decimal('Subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjualans');
    }
};
