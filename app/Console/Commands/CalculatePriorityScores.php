<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\PriorityScore;
use App\Models\RiverLocation;
use Illuminate\Console\Command;

class CalculatePriorityScores extends Command
{
    protected $signature = 'saw:calculate';

    protected $description =
        'Menghitung skor prioritas sungai menggunakan metode SAW';

    public function handle()
    {
        $locations = RiverLocation::all();

        $rows = [];


        foreach ($locations as $location) {

            $posts = Post::with([
                    'sentimentAnalysis',
                    'imageCaptionAnalysis'
                ])
                ->where('location_id', $location->id)
                ->where('is_river_related', true)
                ->get();

            $postCount = $posts->count();

            if ($postCount === 0) {

                $rows[$location->id] = [
                    'post_count' => 0,
                    'negative_ratio' => 0,
                    'clip_avg' => 0,
                ];

                continue;
            }

            $negativeCount = $posts
                ->filter(function ($post) {

                    return optional(
                        $post->sentimentAnalysis
                    )->sentiment_label === 'negative';
                })
                ->count();

            $negativeRatio =
                $negativeCount / $postCount;

            $clipAvg = $posts
                ->filter(function ($post) {

                    return $post->imageCaptionAnalysis;
                })
                ->avg(function ($post) {

                    return $post
                        ->imageCaptionAnalysis
                        ->relevance_score;
                });

            $rows[$location->id] = [

                'post_count' =>
                    $postCount,

                'negative_ratio' =>
                    round(
                        $negativeRatio,
                        4
                    ),

                'clip_avg' =>
                    round(
                        $clipAvg ?? 0,
                        4
                    ),
            ];
        }

        $maxPost = collect($rows)
            ->max('post_count');

        $maxNegative = collect($rows)
            ->max('negative_ratio');

        $maxClip = collect($rows)
            ->max('clip_avg');


        $w1 = 0.30; 
        $w2 = 0.50; 
        $w3 = 0.20; 



        foreach ($rows as $locationId => $row) {

            $r1 = $maxPost > 0
                ? $row['post_count'] / $maxPost
                : 0;

            $r2 = $maxNegative > 0
                ? $row['negative_ratio'] / $maxNegative
                : 0;

            $r3 = $maxClip > 0
                ? $row['clip_avg'] / $maxClip
                : 0;

            $priorityValue = round(
                ($r1 * $w1) +
                ($r2 * $w2) +
                ($r3 * $w3),
                4
            );

            $displayScore =
                $priorityValue * 100;

            if ($displayScore >= 80) {

                $status =
                    'Prioritas Tinggi';

            } elseif ($displayScore >= 60) {

                $status =
                    'Perlu Perhatian';

            } else {

                $status =
                    'Baik';
            }

            PriorityScore::updateOrCreate(
                [
                    'location_id' =>
                        $locationId
                ],
                [
                    'priority_value' =>
                        $priorityValue,

                    'priority_level' =>
                        $status,

                    'method' =>
                        'SAW',

                    'post_count' =>
                        $row['post_count'],

                    'sentiment_weight' =>
                        $w2,

                    'relevance_weight' =>
                        $w3,

                    'period_start' =>
                        now()->subMonth(),

                    'period_end' =>
                        now(),

                    'calculated_at' =>
                        now(),
                ]
            );
        }

        $this->info(
            'Perhitungan SAW selesai'
        );

        return Command::SUCCESS;
    }
}