<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\PostImage;
use App\Models\RiverLocation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class ImportInstagramPosts extends Command
{
    protected $signature = 'instagram:import {file}';

    protected $description = 'Import Instagram JSON';

    public function handle()
    {
        $filePath = $this->argument('file');

        if (!File::exists($filePath)) {
            $this->error("File tidak ditemukan");
            return Command::FAILURE;
        }

        $data = json_decode(File::get($filePath), true);

        if (!$data) {
            $this->error("JSON invalid");
            return Command::FAILURE;
        }

        $source = str_contains(strtolower($filePath), 'pedulisungaisurabaya')
            ? 'pedulisungaisurabaya'
            : 'ecoton';

        $count = 0;

        foreach ($data as $item) {

            $river = $this->detectRiver($item['caption'] ?? '');

            $post = Post::updateOrCreate(
                ['instagram_post_id' => $item['id']],
                [
                    'location_id' => $river['location_id'],
                    'caption' => $item['caption'] ?? null,
                    'post_url' => $item['url'] ?? null,
                    'username' => $source,
                    'likes_count' => $item['likesCount'] ?? 0,
                    'comments_count' => $item['commentsCount'] ?? 0,
                    'upload_date' => isset($item['timestamp'])
                        ? Carbon::parse($item['timestamp'])
                        : null,
                    'scraped_at' => now(),
                    'is_river_related' => $river['is_river_related'],
                    'detected_river' => $river['detected_river'],
                ]
            );

            PostImage::where('post_id', $post->id)->delete();

            $images = $this->findImages($item, $source);

            foreach ($images as $img) {

                PostImage::create([
                'post_id' => $post->id,
                'local_image_path' => $img['path'],
                'image_order' => $img['order'],
            ]);
            }

            $count++;
        }

        $this->info("Imported: {$count}");
        return Command::SUCCESS;
    }

    private function findImages($item, $source): array
    {
        $images = [];

        if ($source === 'pedulisungaisurabaya') {

            $shortCode = $item['shortCode'] ?? null;
            if (!$shortCode) return [];

            $folder = storage_path("app/raw_images/pedulisungaisurabaya/{$shortCode}");

            if (!is_dir($folder)) return [];

            $files = glob($folder . '/*.{jpg,jpeg,png,webp}', GLOB_BRACE);

            sort($files);

            foreach ($files as $i => $file) {
                $images[] = [
                    'path' => "raw_images/pedulisungaisurabaya/{$shortCode}/" . basename($file),
                    'order' => $i + 1,
                ];
            }

            return $images;
        }

        $instagramId = $item['id'] ?? null;
        if (!$instagramId) return [];

        $folder = storage_path("app/raw_images/ecoton");

        $files = glob($folder . "/{$instagramId}*");

        sort($files);

        foreach ($files as $i => $file) {
            $images[] = [
                'path' => "raw_images/ecoton/" . basename($file),
                'order' => $i + 1,
            ];
        }

        return $images;
    }

   private function detectRiver(?string $caption): array
{
    if (!$caption) {
        return [
            'location_id' => null,
            'is_river_related' => false,
            'detected_river' => null,
        ];
    }

    $caption = strtolower($caption);

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

    foreach ($aliases as $keyword => $riverName) {

        if (str_contains($caption, $keyword)) {

            $river = RiverLocation::where(
                'river_name',
                $riverName
            )->first();

            if ($river) {

                return [
                    'location_id' => $river->id,
                    'is_river_related' => true,
                    'detected_river' => $river->river_name,
                ];
            }
        }
    }

    $keywords = [
        'sungai',
        'kali',
        'limbah',
        'sampah',
        'tercemar',
        'banjir',
        'air sungai',
    ];

    foreach ($keywords as $keyword) {

        if (str_contains($caption, $keyword)) {

            return [
                'location_id' => null,
                'is_river_related' => true,
                'detected_river' => null,
            ];
        }
    }

    return [
        'location_id' => null,
        'is_river_related' => false,
        'detected_river' => null,
    ];
}
}