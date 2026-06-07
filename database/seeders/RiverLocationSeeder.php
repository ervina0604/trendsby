<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RiverLocation;

class RiverLocationSeeder extends Seeder
{
    public function run(): void
    {
        $rivers = [

            [
                'river_name' => 'Sungai Kebon Agung',
                'latitude' => -7.342167,
                'longitude' => 112.824000,
                'district' => 'Rungkut',
                'city' => 'Surabaya',
            ],

            [
                'river_name' => 'Sungai Gunung Anyar',
                'latitude' => -7.334639,
                'longitude' => 112.829972,
                'district' => 'Gunung Anyar',
                'city' => 'Surabaya',
            ],

            [
                'river_name' => 'Sungai Dadapan',
                'latitude' => -7.321694,
                'longitude' => 112.837667,
                'district' => 'Rungkut',
                'city' => 'Surabaya',
            ],

            [
                'river_name' => 'Sungai Jagir',
                'latitude' => -7.304694,
                'longitude' => 112.844556,
                'district' => 'Wonokromo',
                'city' => 'Surabaya',
            ],

            [
                'river_name' => 'Sungai Keputih',
                'latitude' => -7.299056,
                'longitude' => 112.845972,
                'district' => 'Sukolilo',
                'city' => 'Surabaya',
            ],

            [
                'river_name' => 'Sungai Damean',
                'latitude' => -7.274306,
                'longitude' => 112.839889,
                'district' => 'Mulyorejo',
                'city' => 'Surabaya',
            ],

            [
                'river_name' => 'Sungai Kalisari',
                'latitude' => -7.257278,
                'longitude' => 112.810972,
                'district' => 'Mulyorejo',
                'city' => 'Surabaya',
            ],

            [
                'river_name' => 'Sungai Kedung Cowek',
                'latitude' => -7.208989,
                'longitude' => 112.780000,
                'district' => 'Bulak',
                'city' => 'Surabaya',
            ],

            [
                'river_name' => 'Sungai Tambak Wedi',
                'latitude' => -7.203139,
                'longitude' => 112.772611,
                'district' => 'Kenjeran',
                'city' => 'Surabaya',
            ],

            [
                'river_name' => 'Sungai Mas',
                'latitude' => -7.204056,
                'longitude' => 112.736528,
                'district' => 'Pabean Cantikan',
                'city' => 'Surabaya',
            ],

            [
                'river_name' => 'Sungai Bosem Kalianak',
                'latitude' => -7.235694,
                'longitude' => 112.715361,
                'district' => 'Asemrowo',
                'city' => 'Surabaya',
            ],

            [
                'river_name' => 'Sungai Kalianak',
                'latitude' => -7.222750,
                'longitude' => 112.706250,
                'district' => 'Asemrowo',
                'city' => 'Surabaya',
            ],

            [
                'river_name' => 'Sungai Greges',
                'latitude' => -7.225667,
                'longitude' => 112.685917,
                'district' => 'Asemrowo',
                'city' => 'Surabaya',
            ],

            [
                'river_name' => 'Sungai Manukan',
                'latitude' => -7.224194,
                'longitude' => 112.677250,
                'district' => 'Tandes',
                'city' => 'Surabaya',
            ],

            [
                'river_name' => 'Sungai Tambak Langon',
                'latitude' => -7.220194,
                'longitude' => 112.668389,
                'district' => 'Asemrowo',
                'city' => 'Surabaya',
            ],

            [
                'river_name' => 'Sungai Sememi',
                'latitude' => -7.207250,
                'longitude' => 112.660417,
                'district' => 'Benowo',
                'city' => 'Surabaya',
            ],

            [
                'river_name' => 'Sungai Kalilamong',
                'latitude' => -7.193222,
                'longitude' => 112.662722,
                'district' => 'Benowo',
                'city' => 'Surabaya',
            ],

        ];

        foreach ($rivers as $river) {
            RiverLocation::create($river);
        }
    }
}