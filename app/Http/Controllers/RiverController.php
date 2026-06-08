<?php

namespace App\Http\Controllers;

use App\Models\RiverLocation;
use Illuminate\Support\Str;

class RiverController extends Controller
{
    public function show($slug)
    {
        $river = RiverLocation::with([
            'posts.priorityScore',
            'posts.sentimentAnalysis',
            'posts.imageCaptionAnalyses',
            'galleries'
        ])
        ->get()
        ->first(function ($item) use ($slug) {

            return Str::slug($item->river_name) === $slug;
        });

        abort_if(!$river, 404);

        $highestScore = $river->posts
            ->pluck('priorityScore')
            ->filter()
            ->sortByDesc('priority_value')
            ->first();

        $latestPost = $river->posts
            ->sortByDesc('upload_date')
            ->first();

        $sentimentSummary = $this->buildSentimentSummary($river->posts);

        return view('detail-sungai', [

            'sungai' => [

                'id' => $river->id,

                'nama' => $river->river_name,

                'lokasi' =>
                    $river->district .
                    ', ' .
                    $river->city,

                'foto' => $river->main_image_path
                    ? asset('storage/' . $river->main_image_path)
                    : asset('storage/home-sungai.png'),

                'lat' => $river->latitude,

                'lng' => $river->longitude,

                'status' =>
                    $this->normalizePriorityLevel(
                        $highestScore->priority_level ?? null
                    ),

                'score' =>
                    $highestScore
                    ? round(
                        $highestScore->priority_value * 100,
                        2
                    )
                    : 0,

                'deskripsi' => $this->buildRiverDescription($river, $sentimentSummary),
                'insight' => $sentimentSummary['text'],
                'sentiment_summary' => $sentimentSummary,
                'jumlah_galeri' => $river->galleries->count(),
                'jumlah_post' => $river->posts->count(),
                'galleries' => $river->galleries
                    ->map(function ($gallery) {
                        return [
                            'image' => asset(
                                'storage/' .
                                $gallery->image_path
                            ),
                            'caption' => $gallery->caption,
                        ];
                    })
                    ->values(),
            ],
        ]);
    }

    private function buildSentimentSummary($posts): array
    {
        $analyses = collect($posts)
            ->pluck('sentimentAnalysis')
            ->filter();

        if ($analyses->isEmpty()) {
            return [
                'text' => 'Belum ada cukup data analisis sentimen untuk memberikan ringkasan otomatis. Informasi ini akan berkembang seiring bertambahnya monitoring.',
                'positif' => 0,
                'netral' => 0,
                'negatif' => 0,
                'dominant' => 'netral',
            ];
        }

        $counts = [
            'positif' => 0,
            'netral' => 0,
            'negatif' => 0,
        ];

        foreach ($analyses as $analysis) {
            $label = strtolower((string) ($analysis->sentiment_label ?? 'netral'));

            if (str_contains($label, 'neg')) {
                $counts['negatif']++;
            } elseif (str_contains($label, 'pos')) {
                $counts['positif']++;
            } else {
                $counts['netral']++;
            }
        }

        $dominant = collect($counts)
            ->sortDesc()
            ->keys()
            ->first();

        $tone = match ($dominant) {
            'negatif' => 'lebih banyak menyoroti kekhawatiran terhadap kondisi sungai',
            'positif' => 'lebih banyak menampilkan nuansa optimis terhadap upaya pemulihan',
            default => 'cenderung bersifat netral dengan fokus pada informasi monitoring',
        };

        $total = array_sum($counts);

        return [
            'text' => 'Analisis sentimen dari '.$total.' unggahan menunjukkan '.($counts['negatif'] ?? 0).' komentar negatif, '.($counts['netral'] ?? 0).' netral, dan '.($counts['positif'] ?? 0).' positif. Secara umum, suasana pembahasan '.$tone.'.',
            'positif' => $counts['positif'],
            'netral' => $counts['netral'],
            'negatif' => $counts['negatif'],
            'dominant' => $dominant,
        ];
    }

    private function buildRiverDescription($river, array $sentimentSummary): string
    {
        $locationText = 'Sungai ini berada di wilayah '.$river->district.', '.$river->city.'.';
        $statusText = $sentimentSummary['text'];

        return $locationText.' '.$statusText;
    }
}