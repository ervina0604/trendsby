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

    Post::with(['sentimentAnalysis', 'imageCaptionAnalyses', 'images'])
        ->where('is_river_related', true)
        ->chunk(100, function ($posts) use ($ai) {

            foreach ($posts as $post) {

                $sentiment = $ai->analyzeSentiment($post->caption ?? '');

                SentimentAnalysis::updateOrCreate(
                    ['post_id' => $post->id],
                    [
                        'sentiment_label' => $sentiment['sentiment'] ?? 'neutral',
                        'sentiment_score' => $sentiment['score'] ?? 0,
                        'model_name' => 'w11wo/indonesian-roberta-base-sentiment-classifier',
                        'model_version' => '1.0',
                        'analyzed_at' => now(),
                    ]
                );

                if ($post->images->isEmpty()) {
                    $this->line("Skip (no images) Post ID: {$post->id}");
                    continue;
                }

                foreach ($post->images as $image) {

                    $fullPath = storage_path('app/' . $image->local_image_path);

                    if (!file_exists($fullPath)) {
                        $this->warn("Image missing: Post ID {$post->id}");
                        continue;
                    }


                    $exists = ImageCaptionAnalysis::where('post_id', $post->id)
                        ->where('image_id', $image->id)
                        ->exists();

                    if ($exists) continue;


                    $clip = $ai->analyzeClip($fullPath, $post->caption ?? '');

                    ImageCaptionAnalysis::updateOrCreate(
                        [
                            'post_id' => $post->id,
                            'image_id' => $image->id,
                        ],
                        [
                            'relevance_score' => $clip['similarity_score'] ?? 0,
                            'model_name' => 'openai/clip-vit-base-patch32',
                            'model_version' => '1.0',
                            'analyzed_at' => now(),
                        ]
                    );
                }

                $this->line("Processed Post ID: {$post->id}");
            }
        });

    $this->info("Analisis selesai.");
}
}