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
    Schema::create('river_galleries', function (Blueprint $table) {

        $table->id();

        $table->foreignId('location_id')
              ->constrained('river_locations')
              ->cascadeOnDelete();

        $table->string('image_path');

        $table->string('caption')
              ->nullable();

        $table->integer('display_order')
              ->default(1);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('river_galleries');
    }
};
