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

    protected $description =
        'Analisis Sentiment IndoBERT dan CLIP';

    public function handle(
        AIService $ai
    ) {

        $posts = Post::with('images')
            ->where('is_river_related', true)
            ->get();

        $total = 0;

        $this->info(
            "Total post yang akan dianalisis: {$posts->count()}"
        );

        $bar = $this->output->createProgressBar(
            $posts->count()
        );

        $bar->start();

        foreach ($posts as $post) {

            try {

                $sentiment = $ai->analyzeSentiment(
                    $post->caption ?? ''
                );

                SentimentAnalysis::updateOrCreate(
                    [
                        'post_id' => $post->id
                    ],
                    [
                        'sentiment_label' =>
                            $sentiment['sentiment']
                            ?? 'neutral',

                        'sentiment_score' =>
                            $sentiment['score']
                            ?? 0,

                        'model_name' =>
                            'w11wo/indonesian-roberta-base-sentiment-classifier',

                        'model_version' =>
                            '1.0',

                        'analyzed_at' =>
                            now(),
                    ]
                );

            } catch (\Exception $e) {

                $this->newLine();

                $this->error(
                    "Gagal sentiment Post ID {$post->id}: "
                    . $e->getMessage()
                );

                continue;
            }

            $image = $post->images->first();

            if ($image) {

                $fullPath = storage_path(
                    'app/' .
                    $image->local_image_path
                );

                if (file_exists($fullPath)) {

                    try {

                        $clip = $ai->analyzeClip(
                            $fullPath,
                            $post->caption ?? ''
                        );

                        ImageCaptionAnalysis::updateOrCreate(
                            [
                                'post_id' => $post->id
                            ],
                            [
                                'relevance_score' =>
                                    $clip['similarity_score']
                                    ?? 0,

                                'model_name' =>
                                    'openai/clip-vit-base-patch32',

                                'model_version' =>
                                    '1.0',

                                'analyzed_at' =>
                                    now(),
                            ]
                        );

                    } catch (\Exception $e) {

                        $this->newLine();

                        $this->warn(
                            "Gagal CLIP Post ID {$post->id}: "
                            . $e->getMessage()
                        );
                    }
                }
            }

            $total++;

            $bar->advance();
        }

        $bar->finish();

        $this->newLine(2);

        $this->info(
            "Analisis selesai. {$total} post diproses."
        );

        return Command::SUCCESS;
    }
}