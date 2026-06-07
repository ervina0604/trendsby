<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $fillable = [
    'post_id',
    'local_image_path',
    'image_order',
];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}