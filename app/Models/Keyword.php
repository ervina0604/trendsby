<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    use HasFactory;

    protected $table = 'keywords'; // Nama tabel yang digunakan

    protected $fillable = [
        'keyword',
        'jumlah_kemunculan',
        'trend',
        'category', // Kategori misalnya 'Lingkungan' atau 'Industri'
    ];
}