<?php

namespace App\Http\Controllers;

use App\Models\RiverLocation;

class RiverController extends Controller
{
    public function show($id)
    {
        $river = RiverLocation::with([
            'posts.priorityScore',
            'galleries'
        ])->findOrFail($id);

        $posts = $river->posts;

        $scores = $posts
            ->pluck('priorityScore')
            ->filter();

        $avgScore = $scores->avg('priority_value') ?? 0;

        $status = match (true) {
            ($avgScore * 100) >= 80 => 'Prioritas Tinggi',
            ($avgScore * 100) >= 60 => 'Perlu Perhatian',
            default => 'Baik',
        };

        $latestPost = $posts
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

                'foto' =>
                    asset(
                        'storage/' .
                        $river->main_image_path
                    ),

                'lat' => $river->latitude,

                'lng' => $river->longitude,

                'status' => $status,

                'score' =>
                    round(
                        $avgScore * 100,
                        2
                    ),

                'deskripsi' =>
                    $latestPost->caption ?? '-',
            ]
        ]);
    }
}