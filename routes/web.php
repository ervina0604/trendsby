<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('public.dashboard');
});
Route::get('/admin/login', function () {
    return view('auth.login');
})->name('admin.login');
