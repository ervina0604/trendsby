<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('priority_scores');

        Schema::create('priority_scores', function (
            Blueprint $table
        ) {
            $table->id();

            $table->foreignId('post_id')
                ->unique()
                ->constrained('posts')
                ->cascadeOnDelete();

            $table->decimal(
                'priority_value',
                5,
                4
            );

            $table->enum(
                'priority_level',
                [
                    'Baik',
                    'Perlu Perhatian',
                    'Prioritas Tinggi'
                ]
            );

            $table->string('method')
                ->default('SAW');

            $table->decimal(
                'sentiment_weight',
                4,
                2
            );

            $table->decimal(
                'relevance_weight',
                4,
                2
            );

            $table->decimal(
                'engagement_weight',
                4,
                2
            );

            $table->date('period_start');

            $table->date('period_end');

            $table->timestamp('calculated_at')
                ->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(
            'priority_scores'
        );
    }
};