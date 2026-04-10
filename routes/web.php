<?php

use Illuminate\Support\Facades\Route;

// PUBLIC
Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('public.dashboard');
})->name('dashboard');

Route::get('/hashtag', function () {
    return view('public.hashtag');
})->name('hashtag');

Route::get('/detail-hashtag', function () {
    return view('public.detail_hashtag');
})->name('detail_hashtag');

Route::get('/keyword', function () {
    return view('public.keyword');
})->name('keyword');

Route::get('/detail-hashtag', function () {
    return view('public.detail_keyword');
})->name('detail_keyword');

Route::get('/tentang', function () {
    return view('public.tentang');
})->name('tentang');

Route::get('/tnc', function () {
    return view('public.terms');
})->name('terms');

Route::get('/export/hashtag/csv', function () {
    return 'Export CSV hashtag';
});
Route::get('/export/hashtag/excel', function () {
    return 'Export Excel hashtag';
});
Route::get('/export/hashtag/pdf', function () {
    return 'Export PDF hashtag';
});

Route::get('/export/keyword/csv', function () {
    return 'Export CSV keyword';
});
Route::get('/export/keyword/excel', function () {
    return 'Export Excel keyword';
});
Route::get('/export/keyword/pdf', function () {
    return 'Export PDF keyword';
});

// ADMIN
Route::prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/hashtag', function () {
        return view('admin.hashtag');
    })->name('admin.hashtag');

    Route::get('/keyword', function () {
        return view('admin.keyword');
    })->name('admin.keyword');

    Route::get('/posts', function () {
        return view('admin.posts');
    })->name('admin.posts');

});