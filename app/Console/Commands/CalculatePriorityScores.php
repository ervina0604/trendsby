<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\PriorityScore;
use Illuminate\Console\Command;

class CalculatePriorityScores extends Command
{
    protected $signature = 'saw:calculate';
    protected $description = 'SAW Ranking AI (Sentiment + CLIP + Engagement)';

    private function safe($value): float
    {
        if (is_nan($value) || is_infinite($value)) {
            return 0;
        }
        return (float) $value;
    }

    public function handle()
    {
        $posts = Post::with([
            'sentimentAnalysis',
            'imageCaptionAnalyses'
        ])
        ->where('is_river_related', true)
        ->get();

        if ($posts->isEmpty()) {
            $this->warn('Tidak ada data post.');
            return Command::SUCCESS;
        }

        $rows = [];

        foreach ($posts as $post) {

            $sentimentLabel = $post->sentimentAnalysis->sentiment_label ?? 'neutral';
            $sentimentScore = $post->sentimentAnalysis->sentiment_score ?? 0;

            $sentimentValue = match ($sentimentLabel) {
                'negative' => 1,
                'neutral'  => 0.5,
                'positive' => 0,
                default    => 0.5,
            };

            $sentimentFinal = $sentimentValue * $sentimentScore;

            $clipFinal = $post->imageCaptionAnalyses->avg('relevance_score') ?? 0;

            $engagementRaw =
                ($post->likes_count ?? 0) +
                ($post->comments_count ?? 0);

            $engagementFinal = log(1 + max(0, $engagementRaw));

            $rows[$post->id] = [
                'sentiment'  => $this->safe($sentimentFinal),
                'clip'       => $this->safe($clipFinal),
                'engagement' => $this->safe($engagementFinal),
            ];
        }

        $maxSentiment  = max(0, collect($rows)->max('sentiment'));
        $maxClip       = max(0, collect($rows)->max('clip'));
        $maxEngagement = max(0, collect($rows)->max('engagement'));

        $w1 = 0.5;
        $w2 = 0.3;
        $w3 = 0.2;

        foreach ($rows as $postId => $row) {

            $r1 = $maxSentiment > 0 ? $row['sentiment'] / $maxSentiment : 0;
            $r2 = $maxClip > 0 ? $row['clip'] / $maxClip : 0;
            $r3 = $maxEngagement > 0 ? $row['engagement'] / $maxEngagement : 0;

            $priorityValue = ($r1 * $w1) + ($r2 * $w2) + ($r3 * $w3);

            $priorityValue = $this->safe($priorityValue);

            $score100 = $priorityValue * 100;

            $priorityLevel = match (true) {
                $score100 >= 80 => 'Prioritas Tinggi',
                $score100 >= 60 => 'Perlu Perhatian',
                default => 'Baik',
            };

            PriorityScore::updateOrCreate(
                ['post_id' => $postId],
                [
                    'priority_value'   => $priorityValue,
                    'priority_level'   => $priorityLevel,
                    'method'           => 'SAW-AI',

                    'sentiment_weight' => $r1,
                    'relevance_weight' => $r2,
                    'engagement_weight'=> $r3,

                    'period_start'     => now()->subMonth(),
                    'period_end'       => now(),
                    'calculated_at'    => now(),
                ]
            );
        }

        $this->info('SAW + AI selesai tanpa error');
        return Command::SUCCESS;
    }
}