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

    protected $description = 'Import hasil scraping Instagram JSON ke database';

    public function handle()
    {
        $filePath = $this->argument('file');

        if (!File::exists($filePath)) {
            $this->error("File tidak ditemukan: {$filePath}");
            return Command::FAILURE;
        }

        $json = File::get($filePath);

        $data = json_decode($json, true);

        if (!$data) {
            $this->error('Format JSON tidak valid.');
            return Command::FAILURE;
        }

        $source = str_contains(
            strtolower($filePath),
            'pedulisungaisurabaya'
        )
            ? 'pedulisungaisurabaya'
            : 'ecoton';

        $imported = 0;

        foreach ($data as $item) {

            $river = $this->detectRiver(
                $item['caption'] ?? ''
            );

            $post = Post::updateOrCreate(
                [
                    'instagram_post_id' => $item['id']
                ],
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

            $localImages = $this->findLocalImages(
                $item,
                $source
            );

            foreach ($localImages as $image) {

                PostImage::create([
                    'post_id' => $post->id,

                    'image_url' => null,

                    'local_image_path' => $image['path'],

                    'image_order' => $image['order'],
                ]);
            }

            $imported++;
        }

        $this->info("{$imported} post berhasil diimport.");

        return Command::SUCCESS;
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

        $rivers = RiverLocation::all();

        foreach ($rivers as $river) {

            $riverName = strtolower($river->river_name);

            if (str_contains($caption, $riverName)) {

                return [
                    'location_id' => $river->id,
                    'is_river_related' => true,
                    'detected_river' => $river->river_name,
                ];
            }

            $shortName = strtolower(
                str_replace('sungai ', '', $river->river_name)
            );

            if (str_contains($caption, $shortName)) {

                return [
                    'location_id' => $river->id,
                    'is_river_related' => true,
                    'detected_river' => $river->river_name,
                ];
            }
        }

        return [
            'location_id' => null,
            'is_river_related' => false,
            'detected_river' => null,
        ];
    }

    /**
     * Cari gambar lokal
     */
    private function findLocalImages(
        array $item,
        string $source
    ): array {

        $images = [];



        if ($source === 'pedulisungaisurabaya') {

            $shortCode = $item['shortCode'] ?? null;

            if (!$shortCode) {
                return [];
            }

            $folder = storage_path(
                'app/raw_images/pedulisungaisurabaya/' .
                $shortCode
            );

            if (!is_dir($folder)) {
                return [];
            }

            $files = glob(
                $folder . '/*.{jpg,jpeg,png,webp}',
                GLOB_BRACE
            );

            sort($files);

            foreach ($files as $index => $file) {

                $images[] = [
                    'path' =>
                        'raw_images/pedulisungaisurabaya/' .
                        $shortCode .
                        '/' .
                        basename($file),

                    'order' => $index + 1,
                ];
            }

            return $images;
        }


        $instagramId = $item['id'] ?? null;

        if (!$instagramId) {
            return [];
        }

        $folder = storage_path(
            'app/raw_images/ecoton'
        );

        if (!is_dir($folder)) {
            return [];
        }

        $files = glob(
            $folder . '/' . $instagramId . '*'
        );

        sort($files);

        foreach ($files as $index => $file) {

            $images[] = [
                'path' =>
                    'raw_images/ecoton/' .
                    basename($file),

                'order' => $index + 1,
            ];
        }

        return $images;
    }
}