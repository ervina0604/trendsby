<?php

namespace Database\Seeders;

use App\Models\RiverLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
     public function run(): void
    {
        $this->call([
            RiverLocationSeeder::class,
        ]);
    }
}
