<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    use HasFactory;

    protected $table = 'hashtags'; // Tentukan nama tabel sesuai dengan nama tabel yang digunakan

    protected $fillable = [
        'hashtag',
        'jumlah_kemunculan',
        'trend',
        'category', // Misalnya untuk kategori 'Lingkungan', 'Industri'
    ];

    // Jika ada relasi, seperti ke model lain
    // public function posts()
    // {
    //     return $this->hasMany(Post::class);
    // }
}