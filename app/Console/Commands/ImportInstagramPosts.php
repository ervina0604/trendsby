<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\RiverLocation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class ImportInstagramPosts extends Command
{
    /**
     * Nama command
     */
    protected $signature = 'instagram:import {file}';

    /**
     * Deskripsi command
     */
    protected $description = 'Import hasil scraping Instagram JSON ke database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filePath = $this->argument('file');

        if (!File::exists($filePath)) {
            $this->error("File tidak ditemukan: {$filePath}");
            return Command::FAILURE;
        }

        $json = File::get($filePath);
        $posts = json_decode($json, true);

        if (!$posts) {
            $this->error('Format JSON tidak valid.');
            return Command::FAILURE;
        }

        $defaultLocation = RiverLocation::first();

        foreach ($posts as $item) {

            Post::updateOrCreate(
                [
                    'instagram_post_id' => $item['id']
                ],
                [
                    'location_id' => $defaultLocation?->id,

                    'caption' => $item['caption'] ?? null,

                    'image_url' => $item['displayUrl'] ?? null,

                    'post_url' => $item['url'] ?? null,

                    'username' => 'ecoton',

                    'likes_count' => $item['likesCount'] ?? 0,

                    'comments_count' => $item['commentsCount'] ?? 0,

                    'upload_date' => isset($item['timestamp'])
                        ? Carbon::parse($item['timestamp'])
                        : null,

                    'scraped_at' => now(),
                ]
            );
        }

        $this->info(count($posts) . ' post berhasil diimport.');

        return Command::SUCCESS;
    }
}