<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RiverController;
use App\Http\Controllers\PrioritasController;
use App\Http\Controllers\PetaController;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get(
    '/peta',
    [PetaController::class, 'index']
)->name('peta');


Route::get('/prioritas-sungai', [PrioritasController::class, 'index'])
    ->name('prioritas');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/sungai/{slug}', [RiverController::class, 'show'])
    ->name('detail.sungai');