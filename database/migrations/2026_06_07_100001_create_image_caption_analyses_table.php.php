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
        Schema::create('image_caption_analyses', function (Blueprint $table) {
    $table->id();

    $table->foreignId('post_id')
        ->constrained('posts')
        ->cascadeOnDelete();

    $table->foreignId('image_id')
        ->constrained('post_images')
        ->cascadeOnDelete();

    $table->decimal('relevance_score', 5, 4);

    $table->string('model_name');

    $table->string('model_version')->nullable();

    $table->timestamp('analyzed_at')->nullable();

    $table->timestamps();

    $table->unique(['post_id', 'image_id']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_caption_analyses');
    }
};