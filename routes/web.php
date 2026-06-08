<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RiverController;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

use App\Http\Controllers\PetaController;

Route::get(
    '/peta',
    [PetaController::class, 'index']
)->name('peta');


Route::get('/prioritas-sungai', function () {
    return view('prioritas');
})->name('prioritas');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/sungai/{slug}', [RiverController::class, 'show'])
    ->name('detail.sungai');