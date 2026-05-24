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
        Schema::create('hashtags', function (Blueprint $table) {
            $table->unsignedBigInteger('id_hashtag')->autoIncrement();
            $table->string('hashtag_text', 100);
            $table->unsignedBigInteger('id_post')->nullable();

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
        Schema::dropIfExists('hashtags');
    }
};
