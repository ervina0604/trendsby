<?php

namespace App\Http\Controllers;

use App\Models\RiverLocation;

class PetaController extends Controller
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

                'location' =>
                    $river->district . ', ' .
                    $river->city,

                'status' =>
                    $highestScore->priority_level
                    ?? 'Belum Dianalisis',

                'score' =>
                    $highestScore
                    ? round(
                        $highestScore->priority_value * 100,
                        2
                    )
                    : 0,

                'desc' =>
                    $river->district . ', ' .
                    $river->city,

                'image' =>
                    $river->main_image_path
                    ? asset('storage/' . $river->main_image_path)
                    : asset('storage/home-sungai.png'),

                'gallery_count' =>
                    $river->galleries->count(),

            ];
        });

        return view(
            'peta',
            compact('rivers')
        );
    }
}