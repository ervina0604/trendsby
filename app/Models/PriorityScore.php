<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriorityScore extends Model
{
    protected $fillable = [
        'post_id',
        'priority_value',
        'priority_level',
        'method',
        'sentiment_weight',
        'relevance_weight',
        'engagement_weight',
        'period_start',
        'period_end',
        'calculated_at',
    ];

    protected $casts = [
        'priority_value' => 'float',
        'sentiment_weight' => 'float',
        'relevance_weight' => 'float',
        'engagement_weight' => 'float',
        'period_start' => 'date',
        'period_end' => 'date',
        'calculated_at' => 'datetime',
    ];

    public function post()
    {
        return $this->belongsTo(
            Post::class,
            'post_id'
        );
    }
}