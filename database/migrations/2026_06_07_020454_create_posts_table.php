<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {

            $table->id();

            $table->foreignId('location_id')
                ->nullable()
                ->constrained('river_locations')
                ->nullOnDelete();

            $table->string('instagram_post_id')->nullable();

            $table->longText('caption')->nullable();

            $table->string('post_url')->nullable();

            $table->string('username')->nullable();

            $table->integer('likes_count')->default(0);

            $table->integer('comments_count')->default(0);

            $table->timestamp('upload_date')->nullable();

            $table->timestamp('scraped_at')->nullable();

            $table->boolean('is_river_related')->default(false);

            $table->string('detected_river')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};