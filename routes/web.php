<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EngagementController;
use App\Http\Controllers\Filter;
use App\Http\Controllers\PostController;
use App\Http\Controllers\InstagramController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman Utama / Dashboard
Route::get('/', [InstagramController::class, 'index'])->name('dashboard');

// Route Kelompok Keyword (Dikelompokkan agar rapi)
Route::controller(InstagramController::class)->group(function () {
    // Pastikan route ini yang utama untuk tampilan tabel & filter
    Route::get('/keyword', 'keyword')->name('keyword');
    Route::get('/keyword/export', 'exportKeyword')->name('keyword.export');
    Route::get('/sentiment', 'sentiment')->name('sentiment');
    Route::get('/hashtag', 'hashtag')->name('hashtag');
    Route::get('/detail-hashtag', 'detailHashtag')->name('detail.hashtag');
});

Route::get('/detail-keyword', function (\Illuminate\Http\Request $request) {
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
            if (empty($word) || strlen($word) < 4 || is_numeric($word) || in_array($word, $stopwords)) continue;

            if (isset($keywords[$word])) {
                $keywords[$word]++;
            } else {
                $keywords[$word] = 1;
            }
        }
    }

    arsort($keywords);
    $topKeywords = array_slice($keywords, 0, 100, true);

    // --- LOGIKA FILTER DITAMBAHKAN DI SINI ---
    $filterCategory = $request->get('category');
    if ($filterCategory) {
        $topKeywords = array_filter($topKeywords, function($count, $word) use ($filterCategory) {
            $category = 'ENVIRONMENT';
            if (str_contains($word, 'sampah') || str_contains($word, 'plastik') || str_contains($word, 'limbah')) {
                $category = 'POLLUTION';
            } elseif (str_contains($word, 'banjir') || str_contains($word, 'hujan')) {
                $category = 'DISASTER';
            }
            return $category === $filterCategory;
        }, ARRAY_FILTER_USE_BOTH);
    }
    // -----------------------------------------

    return view('public.detail_keyword', compact('topKeywords'));

})->name('detail.keyword');

// Route Lainnya
Route::get('/tentang', function () {
    return view('public.tentang');
})->name('tentang');

Route::get('/engagement', [EngagementController::class, 'show'])->name('engagement.show');
Route::get('/filter', [Filter::class, 'show'])->name('filter.show');