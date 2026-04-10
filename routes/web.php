<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/login', function () {
    return view('auth.login');
})->name('admin.login');

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

    Route::get('/import', function () {
        return view('admin.import');
    })->name('admin.import');

    Route::get('/kelola', function () {
        return view('admin.kelola');
    })->name('admin.kelola');

    Route::get('/input', function () {
        return view('admin.input');
    })->name('admin.input');

    Route::get('/filter', function () {
        return view('admin.filter');
    })->name('admin.filter');

    Route::get('/engagement', function () {
        return view('admin.engagement');
    })->name('admin.engagement');

    // Additional Routes for viewing details
    Route::get('/detail_hashtag', function () {
        return view('admin.detail_hashtag');
    })->name('admin.detail_hashtag');

    Route::get('/detail_keyword', function () {
        return view('admin.detail_keyword');
    })->name('admin.detail_keyword');

    Route::get('/detail_log', function () {
        return view('admin.detail_log');
    })->name('admin.detail_log');
});