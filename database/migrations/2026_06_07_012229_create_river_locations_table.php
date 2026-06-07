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
    Schema::create('river_locations', function (Blueprint $table) {

        $table->id();

        $table->string('river_name');

        $table->decimal('latitude', 10, 7);
        $table->decimal('longitude', 10, 7);

        $table->string('district');

        $table->string('city')
              ->default('Surabaya');
              
        $table->string('main_image_path')
              ->nullable();

        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('river_locations');
    }
};
