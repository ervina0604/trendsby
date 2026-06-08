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

                'deskripsi' =>
                    Str::limit(
                        $latestPost->caption ?? '-',
                        300
                    ),
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
}