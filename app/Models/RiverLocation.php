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
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'location_id');
    }

    public function priorityScores()
    {
        return $this->hasMany(PriorityScore::class, 'location_id');
    }
}