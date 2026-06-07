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
    Schema::create('priority_scores', function (Blueprint $table) {

        $table->id();

        $table->foreignId('location_id')
              ->constrained('river_locations')
              ->cascadeOnDelete();

        $table->decimal('priority_value',5,4);

        $table->enum('priority_level',[
            'Low',
            'Medium',
            'High'
        ]);

        $table->string('method')
              ->default('SAW');

        $table->integer('post_count')
              ->default(0);

        $table->decimal('sentiment_weight',4,3);

        $table->decimal('relevance_weight',4,3);

        $table->date('period_start');

        $table->date('period_end');

        $table->timestamp('calculated_at')
              ->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('priority_scores');
    }
};
