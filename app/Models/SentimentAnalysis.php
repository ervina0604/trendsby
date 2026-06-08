<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SentimentAnalysis extends Model
{
    protected $fillable = [
        'post_id',
        'sentiment_label',
        'sentiment_score',
        'model_name',
        'model_version',
        'analyzed_at',
    ];

    protected $casts = [
        'sentiment_score' => 'float',
        'analyzed_at' => 'datetime',
    ];

    public function post()
    {
        return $this->belongsTo(
            Post::class,
            'post_id'
        );
    }
}