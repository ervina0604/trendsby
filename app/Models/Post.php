<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'location_id',
        'instagram_post_id',
        'caption',
        'post_url',
        'username',
        'likes_count',
        'comments_count',
        'upload_date',
        'scraped_at',
        'is_river_related',
        'detected_river',
    ];

    protected $casts = [
        'upload_date' => 'datetime',
        'scraped_at' => 'datetime',
        'is_river_related' => 'boolean',
    ];

    public function location()
    {
        return $this->belongsTo(RiverLocation::class, 'location_id');
    }

    public function sentimentAnalysis()
    {
        return $this->hasOne(SentimentAnalysis::class);
    }

    public function imageCaptionAnalysis()
    {
        return $this->hasOne(ImageCaptionAnalysis::class);
    }

    public function images()
    {
        return $this->hasMany(PostImage::class);
    }
}