<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    // Define the table for the model
    protected $table = 'contents';

    // Define the fillable properties (fields you want to mass-assign)
    protected $fillable = [
        'account',
        'caption',
        'hashtag',
        'likes',
        'comments',
        'date',
    ];

    // Additional scopes for filtering
    public function scopeFilterByDate($query, $startDate, $endDate)
    {
        return $query->whereBetween('date', [$startDate, $endDate]);
    }

    public function scopeFilterByAccount($query, $accounts)
    {
        return $query->whereIn('account', $accounts);
    }

    public function scopeFilterByHashtag($query, $hashtags)
    {
        return $query->whereIn('hashtag', $hashtags);
    }
}