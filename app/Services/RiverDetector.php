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

        foreach (RiverLocation::all() as $river) {

            $name = strtolower(
                str_replace('sungai ', '', $river->river_name)
            );

            if (str_contains($text, $name)) {

                return [
                    'is_river_related' => true,
                    'river' => $river
                ];
            }
        }

        $riverWords = [
            'sungai',
            'kali',
            'bantaran',
            'das',
            'daerah aliran sungai'
        ];

        $conditionWords = [
            'banjir',
            'limbah',
            'tercemar',
            'pencemaran',
            'sampah',
            'plastik',
            'mikroplastik',
            'sedimentasi',
            'pendangkalan',
            'normalisasi',
            'air keruh',
            'air hitam',
            'bau',
            'ekosistem'
        ];

        $hasRiverWord = false;

        foreach ($riverWords as $word) {
            if (str_contains($text, $word)) {
                $hasRiverWord = true;
                break;
            }
        }

        $hasConditionWord = false;

        foreach ($conditionWords as $word) {
            if (str_contains($text, $word)) {
                $hasConditionWord = true;
                break;
            }
        }

        if ($hasRiverWord && $hasConditionWord) {

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