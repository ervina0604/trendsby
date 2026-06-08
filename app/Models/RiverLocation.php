<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiverLocation extends Model
{
    protected $fillable = [
        'river_name',
        'latitude',
        'longitude',
        'district',
        'city',
        'main_image_path',
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    public function posts()
    {
        return $this->hasMany(
            Post::class,
            'location_id'
        );
    }

    public function galleries()
    {
        return $this->hasMany(
            RiverGallery::class,
            'location_id'
        );
    }
}