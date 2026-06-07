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
        $total = 0;

        foreach (Post::all() as $post) {

            $result = RiverDetector::detect($post->caption);

            $post->update([
                'is_river_related' => $result['is_river_related'],

                'detected_river' => $result['river']
                    ? $result['river']->river_name
                    : null,

                'location_id' => $result['river']
                    ? $result['river']->id
                    : null,
            ]);

            if ($result['is_river_related']) {
                $total++;
            }
        }

        $this->info(
            "Deteksi sungai selesai. {$total} post terdeteksi terkait sungai."
        );
    }
}