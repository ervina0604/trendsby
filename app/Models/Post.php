<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id_post';

    protected $fillable = [
        'id_user',
        'caption',
        'tanggal_post',
        'like_count',
        'comment_count',
    ];

    public function getEngagementAttribute()
    {
        return $this->like_count + $this->comment_count;
    }

    public $timestamps = false;
}