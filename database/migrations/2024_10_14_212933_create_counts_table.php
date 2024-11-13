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
        Schema::create('counts', function (Blueprint $table) {
            $table->id('plt_id');
            $table->string('material');
            $table->string('material_description');
            $table->boolean('location')->default(0); // Y/N untuk lokasi
            $table->string('actual_location')->nullable();
            $table->string('uom'); // Unit of Measure
            $table->integer('qty'); // Quantity
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counts');
    }
};
