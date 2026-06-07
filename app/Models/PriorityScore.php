<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriorityScore extends Model
{
    protected $fillable = [
        'location_id',
        'priority_value',
        'priority_level',
        'method',
        'post_count',
        'sentiment_weight',
        'relevance_weight',
        'period_start',
        'period_end',
        'calculated_at',
    ];

    protected $casts = [
        'priority_value' => 'float',
        'sentiment_weight' => 'float',
        'relevance_weight' => 'float',
        'period_start' => 'date',
        'period_end' => 'date',
        'calculated_at' => 'datetime',
    ];

    public function location()
    {
        return $this->belongsTo(RiverLocation::class, 'location_id');
    }
}