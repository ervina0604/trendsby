<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engagement extends Model
{
    use HasFactory;

    // Define the table if it's not the plural form of the model name (laravel by default assumes plural names for tables)
    protected $table = 'engagements';

    // Define the fillable properties (fields you want to mass-assign)
    protected $fillable = [
        'account',
        'caption',
        'likes',
        'comments',
        'date',
    ];

}