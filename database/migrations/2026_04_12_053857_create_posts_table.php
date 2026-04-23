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
        $table->increments('id_post');
        $table->unsignedBigInteger('id_user')->nullable();
        $table->text('caption')->nullable();
        $table->date('tanggal_post')->nullable();
        $table->integer('like_count')->default(0);
        $table->integer('comment_count')->default(0);

        $table->foreign('id_user')
              ->references('id')
              ->on('users')
              ->nullOnDelete();
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
