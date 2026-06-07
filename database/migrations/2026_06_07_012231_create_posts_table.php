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
    Schema::create('posts', function (Blueprint $table) {

        $table->id();

        $table->foreignId('location_id')
              ->constrained('river_locations')
              ->cascadeOnDelete();

        $table->string('instagram_post_id')->nullable();

        $table->longText('caption')->nullable();

        $table->string('image_url')->nullable();

        $table->string('local_image_path')->nullable();

        $table->string('post_url')->nullable();

        $table->string('username')->nullable();

        $table->integer('likes_count')->default(0);

        $table->integer('comments_count')->default(0);

        $table->timestamp('upload_date')->nullable();

        $table->timestamp('scraped_at')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
