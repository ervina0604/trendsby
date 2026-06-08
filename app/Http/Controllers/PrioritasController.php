<?php

namespace App\Http\Controllers;

use App\Models\RiverLocation;
use Illuminate\Support\Str;

class PrioritasController extends Controller
{
    public function index()
    {
        $rivers = RiverLocation::with([
            'posts.priorityScore',
            'galleries'
        ])->get();

        $sungai = $rivers->map(function ($river) {
            $highestScore = $river->posts
                ->pluck('priorityScore')
                ->filter()
                ->sortByDesc('priority_value')
                ->first();

            return [
                'slug' => Str::slug($river->river_name),
                'nama' => $river->river_name,
                'score' => $highestScore
                    ? round($highestScore->priority_value * 100, 2)
                    : 0,
                'status' => $this->normalizePriorityLevel(
                    $highestScore->priority_level ?? null
                ),
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
        ];

        return view('prioritas', compact('sungai', 'top'));
    }
}
