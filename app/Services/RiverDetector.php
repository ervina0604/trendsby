<?php

namespace App\Services;

use App\Models\RiverLocation;

class RiverDetector
{
    public static function detect(?string $caption): array
    {
        if (empty($caption)) {
            return [
                'is_river_related' => false,
                'river' => null
            ];
        }

        $text = strtolower($caption);

        foreach (RiverLocation::all() as $river) {

            $riverName = strtolower($river->river_name);
            $shortName = strtolower(str_replace('sungai ', '', $riverName));

            if (
                str_contains($text, $riverName) ||
                str_contains($text, $shortName)
            ) {
                return [
                    'is_river_related' => true,
                    'river' => $river
                ];
            }
        }

        $riverKeywords = [
            'sungai', 'kali', 'bantaran', 'das'
        ];

        $problemKeywords = [
            'banjir', 'limbah', 'sampah', 'plastik',
            'tercemar', 'pencemaran', 'bau', 'keruh',
            'pendangkalan', 'sedimentasi', 'ekosistem'
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

        // hanya dianggap river-related kalau ADA konteks sungai + isu
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