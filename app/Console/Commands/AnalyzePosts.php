<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\SentimentAnalysis;
use App\Models\ImageCaptionAnalysis;
use App\Services\AIService;
use Illuminate\Console\Command;

class AnalyzePosts extends Command
{
    protected $signature = 'ai:analyze';

    protected $description = 'Analisis Sentiment IndoBERT dan CLIP';

    public function handle(AIService $ai)
    {
        $this->info("Memulai analisis AI...");

        $total = 0;

        Post::with([
            'images',
            'sentimentAnalysis',
            'imageCaptionAnalysis'
        ])
        ->where('is_river_related', true)
        ->chunk(100, function ($posts) use ($ai, &$total) {

            foreach ($posts as $post) {
                try {
                    $sentiment = $ai->analyzeSentiment($post->caption ?? '');

                    SentimentAnalysis::updateOrCreate(
                        ['post_id' => $post->id],
                        [
                            'sentiment_label' => $sentiment['sentiment'] ?? 'neutral',
                            'sentiment_score' => $sentiment['score'] ?? 0,
                            'model_name' => 'indobert-sentiment',
                            'model_version' => '1.0',
                            'analyzed_at' => now(),
                        ]
                    );

                } catch (\Exception $e) {
                    $this->error("Sentiment gagal ID {$post->id}: {$e->getMessage()}");
                }

                $image = $post->images->first();

                if ($image) {

                    $fullPath = storage_path('app/' . $image->local_image_path);

                    if (file_exists($fullPath)) {

                        try {
                            $clip = $ai->analyzeClip(
                                $fullPath,
                                $post->caption ?? ''
                            );

                            ImageCaptionAnalysis::updateOrCreate(
                                ['post_id' => $post->id],
                                [
                                    'relevance_score' => $clip['similarity_score'] ?? 0,
                                    'model_name' => 'clip-vit-base-patch32',
                                    'model_version' => '1.0',
                                    'analyzed_at' => now(),
                                ]
                            );

                        } catch (\Exception $e) {
                            $this->warn("CLIP gagal ID {$post->id}: {$e->getMessage()}");
                        }
                    }
                }

                $total++;
            }
        });

        $this->newLine();
        $this->info("Analisis selesai. Total diproses: {$total}");

        return Command::SUCCESS;
    }
}