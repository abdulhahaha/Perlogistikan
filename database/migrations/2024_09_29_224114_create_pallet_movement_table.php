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
        Schema::create('pallet_movement', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('from_plt_id');
            $table->unsignedBigInteger('to_plt_id');
            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('location_id');
            $table->integer('qty');
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('from_plt_id')->references('id')->on('inventory_details')->onDelete('cascade');
            $table->foreign('to_plt_id')->references('id')->on('inventory_details')->onDelete('cascade');
            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pallet_movement');
    }
};
