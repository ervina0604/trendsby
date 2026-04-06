<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public.dashboard');
})->name('dashboard');

Route::get('/hashtag', function () {
    return view('public.hashtag');
})->name('hashtag');

Route::get('/keyword', function () {
    return view('public.keyword');
})->name('keyword');

Route::get('/tentang', function () {
    return view('public.tentang');
})->name('tentang');

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