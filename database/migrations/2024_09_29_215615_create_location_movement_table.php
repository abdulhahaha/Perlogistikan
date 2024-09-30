<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('location_movement', function (Blueprint $table) {
        $table->id();
        $table->date('date');
        $table->unsignedBigInteger('from_location');
        $table->unsignedBigInteger('material_id');
        $table->string('material_description');
        $table->unsignedBigInteger('plt_id');
        $table->integer('qty');
        $table->unsignedBigInteger('to_location');
        $table->timestamps();
        
        // Foreign key untuk menghubungkan tabel terkait
        $table->foreign('from_location')->references('id')->on('locations');
        $table->foreign('to_location')->references('id')->on('locations');
        $table->foreign('material_id')->references('id')->on('materials');
        $table->foreign('plt_id')->references('id')->on('inventory_details');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location_movement');
    }
};
