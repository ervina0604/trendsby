<?php

namespace App\Http\Controllers;

use App\Models\RiverLocation;

class HomeController extends Controller
{
    public function index()
    {
        $rivers = RiverLocation::with([
            'posts.priorityScore',
            'galleries'
        ])->get();

        $rivers = $rivers->map(function ($river) {

            $highestScore = $river->posts
                ->pluck('priorityScore')
                ->filter()
                ->sortByDesc('priority_value')
                ->first();

            return [

                'id' => $river->id,

                'name' => $river->river_name,

                'lat' => $river->latitude,

                'lng' => $river->longitude,

                'status' => $this->normalizePriorityLevel(
                    $highestScore->priority_level ?? null
                ),

                'score' => $highestScore
                    ? round($highestScore->priority_value * 100, 2)
                    : 0,

                'desc' => $river->district . ', ' . $river->city,

                'image' => $river->main_image_path
                    ? asset('storage/' . $river->main_image_path)
                    : asset('storage/home-sungai.png'),

                'slug' => strtolower(
                    str_replace(' ', '-', $river->river_name)
                ),
            ];
        });

        return view('home', compact('rivers'));
    }
}