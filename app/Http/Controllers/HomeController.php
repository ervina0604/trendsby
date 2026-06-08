<?php

namespace App\Http\Controllers;

use App\Models\RiverLocation;

class HomeController extends Controller
{
    public function index()
    {
        $rivers = RiverLocation::with([
            'posts.priorityScore'
        ])->get();

        $rivers = $rivers->map(function ($river) {

            $scores = $river->posts
                ->pluck('priorityScore')
                ->filter();

            $avgScore = $scores->avg('priority_value') ?? 0;

            $status = match (true) {
                ($avgScore * 100) >= 80 => 'Prioritas Tinggi',
                ($avgScore * 100) >= 60 => 'Perlu Perhatian',
                default => 'Baik',
            };

            return [

                'id' => $river->id,

                'name' => $river->river_name,

                'lat' => $river->latitude,

                'lng' => $river->longitude,

                'status' => $status,

                'score' => round($avgScore * 100),

                'desc' =>
                    $river->district .
                    ', ' .
                    $river->city,

                'image' => $river->main_image_path
                    ? asset('storage/' . $river->main_image_path)
                    : asset('storage/home-sungai.png'),

            ];
        });

        return view('home', compact('rivers'));
    }
}