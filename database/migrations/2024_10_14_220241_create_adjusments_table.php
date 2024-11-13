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
        Schema::create('adjusments', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->date('date'); // Tanggal adjustment
            $table->string('reference'); // Referensi adjustment
            $table->string('location'); // Lokasi
            $table->string('plt_id'); // ID PLT
            $table->string('material'); // Material
            $table->string('material_description'); // Deskripsi Material
            $table->string('uom'); // Unit of Measure
            $table->integer('qty'); // Quantity
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adjusments');
    }
};
