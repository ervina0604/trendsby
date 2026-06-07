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
    Schema::create('sentiment_analyses', function (Blueprint $table) {

        $table->id();

        $table->foreignId('post_id')
              ->unique()
              ->constrained('posts')
              ->cascadeOnDelete();

        $table->enum('sentiment_label',[
            'positive',
            'neutral',
            'negative'
        ]);

        $table->decimal('sentiment_score',5,4);

        $table->string('model_name');

        $table->string('model_version')
              ->nullable();

        $table->timestamp('analyzed_at')
              ->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sentiment_analyses');
    }
};
