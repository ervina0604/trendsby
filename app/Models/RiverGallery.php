<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiverGallery extends Model
{
    protected $fillable = [
        'location_id',
        'image_path',
        'caption',
        'display_order',
    ];

    public function location()
    {
        return $this->belongsTo(
            RiverLocation::class,
            'location_id'
        );
    }
}