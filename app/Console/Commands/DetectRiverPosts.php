<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Services\RiverDetector;
use Illuminate\Console\Command;

class DetectRiverPosts extends Command
{
    protected $signature = 'river:detect';

    protected $description = 'Deteksi sungai pada caption Instagram';

    public function handle()
    {
        $posts = Post::all();

        foreach ($posts as $post) {

            $river = RiverDetector::detect($post->caption);

            if ($river) {

                $post->update([
                    'is_river_related' => true,
                    'detected_river' => $river->river_name,
                    'location_id' => $river->id,
                ]);
            }
        }

        $this->info('Deteksi sungai selesai');
    }
}