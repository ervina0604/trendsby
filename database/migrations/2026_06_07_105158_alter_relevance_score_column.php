<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE image_caption_analyses
            MODIFY relevance_score DECIMAL(10,4)
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE image_caption_analyses
            MODIFY relevance_score DECIMAL(5,4)
        ");
    }
};