<?php

namespace App\Services;

use App\Models\RiverLocation;

class RiverDetector
{
    public static function detect(?string $caption): array
    {
        if (!$caption) {

            return [
                'is_river_related' => false,
                'river' => null
            ];
        }

        $text = strtolower($caption);

        $aliases = [

            'kali surabaya' => 'Kalimas',
            'sungai surabaya' => 'Kalimas',

            'kalimas' => 'Kalimas',
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

            if (str_contains($text, $keyword)) {

                $river = RiverLocation::where(
                    'river_name',
                    $riverName
                )->first();

                if ($river) {

                    return [
                        'is_river_related' => true,
                        'river' => $river
                    ];
                }
            }
        }

        $riverKeywords = [
            'sungai',
            'kali',
            'bantaran',
            'das'
        ];

        $problemKeywords = [
            'banjir',
            'limbah',
            'sampah',
            'plastik',
            'tercemar',
            'pencemaran',
            'bau',
            'keruh',
            'pendangkalan',
            'sedimentasi',
            'ekosistem'
        ];

        $hasRiverContext = false;
        $hasProblem = false;

        foreach ($riverKeywords as $word) {

            if (str_contains($text, $word)) {
                $hasRiverContext = true;
                break;
            }
        }

        foreach ($problemKeywords as $word) {

            if (str_contains($text, $word)) {
                $hasProblem = true;
                break;
            }
        }

        if ($hasRiverContext && $hasProblem) {

            return [
                'is_river_related' => true,
                'river' => null
            ];
        }

        return [
            'is_river_related' => false,
            'river' => null
        ];
    }
}