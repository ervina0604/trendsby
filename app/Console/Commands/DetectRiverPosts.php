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

        Post::chunkById(200, function ($posts) use (&$total) {

            foreach ($posts as $post) {

                $result = RiverDetector::detect($post->caption ?? '');

                $river = $result['river'] ?? null;

                $isRiverRelated = $result['is_river_related'] ?? false;

                $post->update([
                    'is_river_related' => $isRiverRelated,
                    'detected_river'   => $river?->river_name,
                    'location_id'      => $river?->id,
                ]);

                if ($isRiverRelated) {
                    $total++;
                }
            }
        });

        $this->info("Deteksi sungai selesai. {$total} post terdeteksi terkait sungai.");

        return Command::SUCCESS;
    }
}