<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'location_id',
        'instagram_post_id',
        'caption',
        'image_url',
        'local_image_path',
        'post_url',
        'username',
        'likes_count',
        'comments_count',
        'upload_date',
        'scraped_at',
    ];

    protected $casts = [
        'upload_date' => 'datetime',
        'scraped_at' => 'datetime',
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
}