<?php

use Illuminate\Support\Facades\Route;
// ADMIN
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    })->name('admin.login');

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/import', function () {
        return view('admin.import');
    })->name('admin.import');

    Route::get('/import/log', function () {
        return view('admin.detail_log');
    })->name('admin.detail_log');

    Route::get('/input', function () {
        return view('admin.input');
    })->name('admin.input');

    Route::get('/kelola', function () {
        return view('admin.kelola');
    })->name('admin.kelola');

    Route::get('/hashtag', function () {
        return view('admin.hashtag');
    })->name('admin.hashtag');

    Route::get('/detail-hashtag', function () {
        return view('admin.detail_hashtag');
    })->name('admin.detail_hashtag');

    Route::get('/keyword', function () {
        return view('admin.keyword');
    })->name('admin.keyword');

    Route::get('/detail-keyword', function () {
        return view('admin.detail_keyword');
    })->name('admin.detail_keyword');

    Route::get('/filter', function () {
        return view('admin.filter');
    })->name('admin.filter');

    Route::get('/engagement', function () {
        return view('admin.engagement');
    })->name('admin.engagement');
});