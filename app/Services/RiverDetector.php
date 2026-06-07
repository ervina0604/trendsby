<?php

namespace App\Services;

use App\Models\RiverLocation;

class RiverDetector
{
    public static function detect(?string $caption): ?RiverLocation
    {
        if (!$caption) {
            return null;
        }

        $caption = strtolower($caption);

        foreach (RiverLocation::all() as $river) {

            $name = strtolower(
                str_replace('Sungai ', '', $river->river_name)
            );

            $keywords = [
                $name,
                'sungai ' . $name,
                'kali ' . $name,
            ];

            foreach ($keywords as $keyword) {

                $pattern = '/\b' .
                    preg_quote($keyword, '/') .
                    '\b/i';

                if (preg_match($pattern, $caption)) {
                    return $river;
                }
            }
        }

        return null;
    }
}