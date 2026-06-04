<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public.home');
})->name('home');

Route::get('/peta-sungai', function () {
    return view('public.peta');
})->name('peta');

Route::get('/prioritas-sungai', function () {
    return view('public.prioritas');
})->name('prioritas');

Route::get('/tentang', function () {
    return view('public.tentang');
})->name('tentang');