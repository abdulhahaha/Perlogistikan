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
    Schema::create('inventory_details', function (Blueprint $table) {
        $table->id(); 
        $table->date('receive_date');  // Tanggal penerimaan
        $table->string('location', 255);  // Lokasi barang
        $table->string('plt_id', 100);  // ID palet atau tempat penyimpanan
        $table->string('material', 255);  // Nama atau kode material
        $table->text('material_description')->nullable();  // Deskripsi material, bisa kosong
        $table->string('uom', 50);  // Unit of Measurement (satuan unit)
        $table->integer('unrestricted');  // Jumlah barang unrestricted (bebas digunakan)
        $table->integer('blocked');  // Jumlah barang yang diblokir
        $table->text('remarks')->nullable();  // Keterangan tambahan, bisa kosong
        $table->timestamps();  // Created_at dan Updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_details');
    }
};
