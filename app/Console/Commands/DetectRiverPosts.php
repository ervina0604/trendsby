<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\RiverLocation;
use App\Services\RiverDetector;
use Illuminate\Console\Command;

class DetectRiverPosts extends Command
{
    protected $signature = 'river:detect';

    protected $description = 'Deteksi sungai pada caption Instagram';

    public function handle()
    {
        $total = 0;

        Post::with('location')
            ->chunkById(200, function ($posts) use (&$total) {

                foreach ($posts as $post) {

                    $result = RiverDetector::detect($post->caption ?? '');

                    $river = $result['river'] ?? null;
                    $isRiverRelated = (bool) ($result['is_river_related'] ?? false);

                    $locationId = null;
                    $riverName = null;

                    if ($river instanceof RiverLocation) {
                        $locationId = $river->id;
                        $riverName = $river->river_name;
                    }

                    $post->update([
                        'is_river_related' => $isRiverRelated,
                        'detected_river'   => $riverName,
                        'location_id'      => $locationId,
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