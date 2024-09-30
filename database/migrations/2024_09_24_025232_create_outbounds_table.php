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
        Schema::create('outbounds', function (Blueprint $table) {
            $table->id();
            $table->date('shipped_date');               // Tanggal pengiriman
            $table->string('no_document');              // Nomor dokumen
            $table->string('shipper');                  // Nama pengirim
            $table->string('plt_id')->nullable();       // PLT ID (bisa null)
            $table->string('location')->nullable();     // Lokasi (bisa null)
            $table->string('material');                 // Material
            $table->text('material_description');       // Deskripsi material
            $table->integer('inbound_qty');             // Jumlah material inbound
            $table->string('uom');                      // Unit of Measure
            $table->text('remarks')->nullable();        // Remarks (bisa null)
            $table->timestamps();                       // Timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outbounds');
    }
};
