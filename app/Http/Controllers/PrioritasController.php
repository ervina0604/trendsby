<?php

namespace App\Http\Controllers;

use App\Models\RiverLocation;
use Illuminate\Support\Str;

class PrioritasController extends Controller
{
    private function findIssueCategory(?string $caption): ?string
    {
        $text = mb_strtolower((string) $caption);

        if ($text === '') {
            return null;
        }

        if (preg_match('/\b(sampah|plastik|botol|kotor|sampah plastik|sampah rumah tangga|sampah sungai)\b/i', $caption)) {
            return 'Sampah';
        }

        if (preg_match('/\b(sedimen|endapan|lumpur|keruh|deposit|dangkal)\b/i', $caption)) {
            return 'Sedimen';
        }

        if (preg_match('/\b(limbah|buangan|cairan|air kotor|tumpahan|pencemaran)\b/i', $caption)) {
            return 'Limbah';
        }

        return null;
    }

    private function buildIssuePercentages($posts): array
    {
        $totals = [
            'Sampah' => 0,
            'Sedimen' => 0,
            'Limbah' => 0,
        ];

        $matchedPosts = 0;

        foreach ($posts as $post) {
            $category = $this->findIssueCategory($post->caption ?? null);

            if ($category) {
                $totals[$category]++;
                $matchedPosts++;
            }
        }

        if ($matchedPosts === 0) {
            return ['Sampah' => 0, 'Sedimen' => 0, 'Limbah' => 0];
        }

        $percentages = [];

        foreach ($totals as $label => $count) {
            $percentages[$label] = (int) round(($count / $matchedPosts) * 100);
        }

        $difference = 100 - array_sum($percentages);

        if ($difference !== 0) {
            $dominantLabel = array_keys($totals, max($totals))[0];
            $percentages[$dominantLabel] += $difference;
        }

        return $percentages;
    }

    public function index()
    {
        $rivers = RiverLocation::with([
            'posts.priorityScore',
            'posts.sentimentAnalysis',
            'galleries'
        ])->get();

        $sungai = $rivers->map(function ($river) {
            $highestScore = $river->posts
                ->pluck('priorityScore')
                ->filter()
                ->sortByDesc('priority_value')
                ->first();

            $issuePercentages = $this->buildIssuePercentages($river->posts);
            $dominantIssue = collect($issuePercentages)->sortDesc()->keys()->first();

            return [
                'slug' => Str::slug($river->river_name),
                'nama' => $river->river_name,
                'score' => $highestScore
                    ? round($highestScore->priority_value * 100, 2)
                    : 0,
                'status' => $this->normalizePriorityLevel(
                    $highestScore->priority_level ?? null
                ),
                'issue_percentages' => $issuePercentages,
                'dominant_issue' => $dominantIssue,
            ];
        })
        ->sortByDesc('score')
        ->values()
        ->toArray();

        $top = $sungai[0] ?? [
            'slug' => '#',
            'nama' => '-',
            'score' => 0,
            'status' => '-',
            'issue_percentages' => ['Sampah' => 0, 'Sedimen' => 0, 'Limbah' => 0],
            'dominant_issue' => null,
        ];

        $statusDistribution = [
            'Kritis' => collect($sungai)->where('status', 'Kritis')->count(),
            'Perlu Perhatian' => collect($sungai)->where('status', 'Perlu Perhatian')->count(),
            'Baik' => collect($sungai)->where('status', 'Baik')->count(),
        ];

        return view('prioritas', compact('sungai', 'top', 'statusDistribution'));
    }
}
