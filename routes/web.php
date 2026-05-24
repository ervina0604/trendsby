<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EngagementController;
use App\Http\Controllers\Filter;
use App\Http\Controllers\PostController;
use App\Http\Controllers\InstagramController;

Route::get('/', [InstagramController::class, 'index'])
    ->name('dashboard');

Route::get('/hashtag', [InstagramController::class, 'hashtag'])
    ->name('hashtag');

Route::get('/detail-hashtag', function () {
    return view('public.detail_hashtag');
})->name('detail.hashtag');

Route::get('/keyword', [InstagramController::class, 'keyword'])
    ->name('keyword');

Route::get('/detail-keyword', function () {

    $json = file_get_contents(public_path('data/pedulisungaisurabaya_data.json'));

    $posts = json_decode($json, true);

    $keywords = [];

    $stopwords = [
        'dan','yang','untuk','dari','dengan','atau','karena',
        'pada','dalam','adalah','ini','itu','agar','juga',
        'lebih','akan','kami','kita','mereka','bagi','jadi',
        'telah','sudah','belum','bisa','dapat','terhadap',
        'oleh','ke','di','sebagai','saat','para','tentang',
        'sebuah','hingga','namun','tetapi','masih','supaya',
        'guna','menuju','setelah','sebelum','terjadi',
        'the','and','for','from','with','instagram',
        'post','repost','video','foto','link','https',
        'com','www'
    ];

    foreach ($posts as $post) {

        $caption = strtolower($post['caption'] ?? '');

        $caption = preg_replace('/http\S+/', '', $caption);

        $caption = preg_replace('/[^\p{L}\p{N}\s]/u', '', $caption);

        $words = preg_split('/\s+/', $caption);

        foreach ($words as $word) {

            $word = trim($word);

            if (empty($word)) continue;

            if (strlen($word) < 4) continue;

            if (is_numeric($word)) continue;

            if (in_array($word, $stopwords)) continue;

            if (isset($keywords[$word])) {
                $keywords[$word]++;
            } else {
                $keywords[$word] = 1;
            }
        }
    }

    arsort($keywords);

    $topKeywords = array_slice($keywords, 0, 100, true);

    return view('public.detail_keyword', compact('topKeywords'));

})->name('detail.keyword');

Route::get('/tentang', function () {
    return view('public.tentang');
})->name('tentang');

Route::get('/engagement', [EngagementController::class, 'show'])
    ->name('engagement.show');

Route::get('/filter', [Filter::class, 'show'])
    ->name('filter.show');