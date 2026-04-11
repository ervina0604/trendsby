<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engagement extends Model
{
    use HasFactory;

    protected $table = 'engagements'; // Tentukan nama tabel yang digunakan

    protected $fillable = [
        'account',
        'caption',
        'likes',
        'comments',
        'engagement', // Misalnya total engagement yang dihitung
    ];

    // Definisikan relasi jika diperlukan
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}