<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AIService
{
    protected string $baseUrl = 'http://127.0.0.1:8000';

    public function analyzeSentiment(string $caption): array
    {
        if (trim($caption) === '') {
            return [
                'sentiment' => 'neutral',
                'score' => 0
            ];
        }

        try {
            $response = Http::timeout(120)->post(
                $this->baseUrl . '/sentiment',
                [
                    'caption' => $caption
                ]
            );

            if (!$response->successful()) {
                return [
                    'sentiment' => 'neutral',
                    'score' => 0
                ];
            }

            return [
                'sentiment' => $response->json('sentiment', 'neutral'),
                'score' => (float) $response->json('score', 0)
            ];

        } catch (\Throwable $e) {

            Log::error('Sentiment Error: ' . $e->getMessage());

            return [
                'sentiment' => 'neutral',
                'score' => 0
            ];
        }
    }

    public function analyzeClip(string $imagePath, string $caption): array
    {
        if (!file_exists($imagePath)) {
            return [
                'similarity_score' => 0
            ];
        }

        try {
            $response = Http::timeout(120)->post(
                $this->baseUrl . '/clip',
                [
                    'image_path' => $imagePath,
                    'caption' => $caption
                ]
            );

            if (!$response->successful()) {
                return [
                    'similarity_score' => 0
                ];
            }

            return [
                'similarity_score' =>
                    (float) $response->json('similarity_score', 0)
            ];

        } catch (\Throwable $e) {

            Log::error('CLIP Error: ' . $e->getMessage());

            return [
                'similarity_score' => 0
            ];
        }
    }
}