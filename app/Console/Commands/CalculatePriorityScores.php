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

    
        $sentimentLabel = $post->sentimentAnalysis->sentiment ?? 'neutral';
        $sentimentScore = $post->sentimentAnalysis->score ?? 0;

        $sentimentMap = [
            'negative' => 1,
            'neutral'  => 0.5,
            'positive' => 0
        ];

        $sentimentValue = ($sentimentMap[$sentimentLabel] ?? 0.5) * $sentimentScore;


        $clipValue = $post->imageCaptionAnalyses->avg('relevance_score') ?? 0;

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

    $maxSentiment  = max(array_column($rows, 'sentiment')) ?: 1;
    $maxClip       = max(array_column($rows, 'clip')) ?: 1;
    $maxEngagement = max(array_column($rows, 'engagement')) ?: 1;

    $w1 = 0.5;
    $w2 = 0.3;
    $w3 = 0.2;

    foreach ($rows as $postId => $row) {

        $r1 = $row['sentiment'] / $maxSentiment;
        $r2 = $row['clip'] / $maxClip;
        $r3 = $row['engagement'] / $maxEngagement;

        $priorityValue = ($r1 * $w1) + ($r2 * $w2) + ($r3 * $w3);

        if (!is_finite($priorityValue)) {
            $priorityValue = 0;
        }

        $score100 = $priorityValue * 100;

        $priorityLevel = match (true) {
            $score100 >= 80 => 'Prioritas Tinggi',
            $score100 >= 60 => 'Perlu Perhatian',
            default => 'Baik',
        };

        PriorityScore::updateOrCreate(
            ['post_id' => $postId],
            [
                'priority_value'   => round($priorityValue, 4),
                'priority_level'   => $priorityLevel,
                'method'           => 'SAW-AI',

                'sentiment_weight' => $w1,
                'relevance_weight' => $w2,
                'engagement_weight'=> $w3,

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