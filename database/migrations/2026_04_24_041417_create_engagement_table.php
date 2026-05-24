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
        Schema::create('engagement', function (Blueprint $table) {
        $table->unsignedBigInteger('id_engagement')->autoIncrement();
        $table->unsignedBigInteger('id_post')->nullable();
        $table->integer('like_count')->default(0);
        $table->integer('comment_count')->default(0);
        $table->integer('score')->default(0); // ✅ cukup sekali di sini

        $table->foreign('id_post')
            ->references('id_post')->on('posts')
            ->cascadeOnDelete();

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('engagement');
    }
};
