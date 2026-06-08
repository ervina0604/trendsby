<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\RiverLocation;
use Illuminate\Console\Command;

class DetectRiverPosts extends Command
{
    protected $signature = 'river:detect';

    protected $description = 'Deteksi sungai pada caption Instagram';

    public function handle()
    {
        $total = 0;

        $aliases = [

            'kalimas' => 'Kalimas',
            'kali surabaya' => 'Kalimas',
            'sungai surabaya' => 'Kalimas',

            'jagir' => 'Jagir',

            'gunung anyar' => 'Gunung Anyar',

            'dadapan' => 'Dadapan',

            'keputih' => 'Keputih',

            'damean' => 'Damean',

            'kalisari' => 'Kalisari',

            'kedung cowek' => 'Kedung Cowek',

            'tambak wedi' => 'Tambak Wedi',

            'bosem kalianak' => 'Bosem Kalianak',

            'kalianak' => 'Kalianak',

            'greges' => 'Greges',

            'manukan' => 'Manukan',

            'tambak langon' => 'Tambak Langon',

            'sememi' => 'Sememi',

            'kali lamong' => 'Kali Lamong',

            'kebon agung' => 'Kebon Agung',
        ];

        Post::chunkById(200, function ($posts) use (&$total, $aliases) {

            foreach ($posts as $post) {

                $caption = strtolower($post->caption ?? '');

                $locationId = null;
                $riverName = null;
                $isRiverRelated = false;

                foreach ($aliases as $keyword => $name) {

                    if (str_contains($caption, $keyword)) {

                        $river = RiverLocation::where(
                            'river_name',
                            $name
                        )->first();

                        if ($river) {

                            $locationId = $river->id;
                            $riverName = $river->river_name;
                            $isRiverRelated = true;

                            break;
                        }
                    }
                }

                if (!$isRiverRelated) {

                    $genericKeywords = [
                        'sungai',
                        'kali',
                        'limbah',
                        'sampah',
                        'tercemar',
                        'banjir',
                        'air sungai',
                    ];

                    foreach ($genericKeywords as $keyword) {

                        if (str_contains($caption, $keyword)) {

                            $isRiverRelated = true;
                            break;
                        }
                    }
                }

                $post->update([
                    'is_river_related' => $isRiverRelated,
                    'detected_river' => $riverName,
                    'location_id' => $locationId,
                ]);

                if ($isRiverRelated) {
                    $total++;
                }
            }
        });

        $this->info(
            "Deteksi selesai. {$total} post terkait sungai."
        );

        return Command::SUCCESS;
    }
}