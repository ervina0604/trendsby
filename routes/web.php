<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/peta-sungai', function () {
    return view('peta');
})->name('peta');

Route::get('/prioritas-sungai', function () {
    return view('prioritas');
})->name('prioritas');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');