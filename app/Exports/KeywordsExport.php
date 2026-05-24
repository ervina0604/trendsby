<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KeywordsExport implements FromCollection, WithHeadings, WithMapping
{
    protected $keywords;
    private $rank = 0;

    public function __construct(array $keywords)
    {
        $this->keywords = $keywords;
    }

    public function collection()
    {
        $data = [];
        foreach ($this->keywords as $word => $count) {
            $data[] = (object) [
                'word' => $word,
                'count' => $count
            ];
        }
        return collect($data);
    }

    public function headings(): array
    {
        return ['Rank', 'Keyword', 'Category', 'Kemunculan', 'Trend'];
    }

    public function map($row): array
    {
        $this->rank++;
        
        $word = $row->word;
        $category = 'ENVIRONMENT';
        if (str_contains($word, 'sampah') || str_contains($word, 'plastik') || str_contains($word, 'limbah')) {
            $category = 'POLLUTION';
        } elseif (str_contains($word, 'banjir') || str_contains($word, 'hujan')) {
            $category = 'DISASTER';
        }

        $trend = 'Stabil';
        if ($this->rank <= 3) {
            $trend = 'Trending';
        } elseif ($row->count >= 10) {
            $trend = 'Active';
        }

        return [
            str_pad($this->rank, 2, '0', STR_PAD_LEFT),
            strtoupper($word),
            $category,
            $row->count,
            $trend
        ];
    }
}