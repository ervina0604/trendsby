<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\PriorityScore;
use Illuminate\Console\Command;

class CalculatePriorityScores extends Command
{
    protected $signature = 'saw:calculate';

    protected $description = 'Menghitung prioritas temuan lingkungan sungai menggunakan SAW';

    public function handle()
    {
        $posts = Post::with([
            'sentimentAnalysis',
            'imageCaptionAnalysis'
        ])
        ->where('is_river_related', true)
        ->get();

        if ($posts->isEmpty()) {
            $this->warn('Tidak ada data post untuk dihitung.');
            return Command::SUCCESS;
        }

        $rows = [];

        foreach ($posts as $post) {

            $sentimentLabel = optional($post->sentimentAnalysis)->sentiment_label;

            $sentimentValue = match ($sentimentLabel) {
                'negative' => 1,
                'neutral'  => 0.5,
                'positive' => 0,
                default    => 0,
            };

            $clipValue = optional($post->imageCaptionAnalysis)->relevance_score ?? 0;

            $engagementRaw =
                ($post->likes_count ?? 0) +
                ($post->comments_count ?? 0);

            $engagement = log(1 + $engagementRaw);

            $rows[$post->id] = [
                'sentiment'  => $sentimentValue,
                'clip'       => $clipValue,
                'engagement' => $engagement,
            ];
        }

        $maxSentiment  = collect($rows)->max('sentiment');
        $maxClip       = collect($rows)->max('clip');
        $maxEngagement = collect($rows)->max('engagement');


        $w1 = 0.50;
        $w2 = 0.30;
        $w3 = 0.20;

        foreach ($rows as $postId => $row) {

            $r1 = $maxSentiment > 0 ? $row['sentiment'] / $maxSentiment : 0;
            $r2 = $maxClip > 0 ? $row['clip'] / $maxClip : 0;
            $r3 = $maxEngagement > 0 ? $row['engagement'] / $maxEngagement : 0;

            $priorityValue = round(
                ($r1 * $w1) +
                ($r2 * $w2) +
                ($r3 * $w3),
                4
            );

            $score100 = $priorityValue * 100;

            $status = match (true) {
                $score100 >= 80 => 'Prioritas Tinggi',
                $score100 >= 60 => 'Perlu Perhatian',
                default => 'Baik',
            };

            PriorityScore::updateOrCreate(
                ['post_id' => $postId],
                [
                    'priority_value'   => $priorityValue,
                    'priority_level'   => $status,
                    'method'           => 'SAW',

                    'sentiment_weight' => $w1,
                    'relevance_weight' => $w2,
                    'engagement_weight'=> $w3,

                    'period_start'     => now()->subMonth(),
                    'period_end'       => now(),
                    'calculated_at'    => now(),
                ]
            );
        }

        $this->info('Perhitungan SAW selesai');
        return Command::SUCCESS;
    }
}