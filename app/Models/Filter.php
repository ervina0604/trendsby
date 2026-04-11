<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'account',
        'hashtag_category',
    ];

    // Kamu bisa menambahkan metode untuk filter data
    public function applyFilters($query, $filters)
    {
        if ($filters['start_date'] && $filters['end_date']) {
            $query->whereBetween('date', [$filters['start_date'], $filters['end_date']]);
        }

        if ($filters['account']) {
            $query->where('account', $filters['account']);
        }

        if ($filters['hashtag_category']) {
            $query->where('category', $filters['hashtag_category']);
        }

        return $query;
    }
}