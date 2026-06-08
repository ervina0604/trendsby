<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function normalizePriorityLevel(?string $level): string
    {
        if ($level === 'Prioritas Tinggi') {
            return 'Kritis';
        }

        if ($level === 'Perlu Perhatian') {
            return 'Perlu Perhatian';
        }

        if ($level === 'Baik') {
            return 'Baik';
        }

        return 'Belum Dianalisis';
    }
}
