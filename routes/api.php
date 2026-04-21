<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::post('/admin/posts', [PostController::class, 'store']);
Route::get('/trend', [PostController::class, 'trend']);