<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageCaptionAnalysis extends Model
{
    protected $fillable = [
        'post_id',
        'image_id',
        'relevance_score',
        'model_name',
        'model_version',
        'analyzed_at',
    ];

    protected $casts = [
        'relevance_score' => 'float',
        'analyzed_at' => 'datetime',
    ];

    public function post()
{
    return $this->belongsTo(
        Post::class,
        'post_id'
    );
}

public function image()
{
    return $this->belongsTo(
        PostImage::class,
        'image_id'
    );
}
}