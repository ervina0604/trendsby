<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public.home');
})->name('home');

Route::get('/peta', function () {
    return view('peta');
})->name('peta');

Route::get('/sungai/{slug}', function ($slug) {

    $sungai = [
        'kalimas' => [
            'nama' => 'Kalimas',
            'skor' => 72,
            'dokumentasi' => 147,
            'pembahasan' => 214,
            'prioritas' => 'Tinggi',
            'panjang' => '12.4 Km',
            'luas' => '45.2 Hektar',
            'lokasi' => 'Pusat Kota Surabaya',
            'foto' => 'images/kalimas.jpg',
        ],

        'jagir' => [
            'nama' => 'Jagir',
            'skor' => 65,
            'dokumentasi' => 98,
            'pembahasan' => 121,
            'prioritas' => 'Sedang',
            'panjang' => '9.7 Km',
            'luas' => '31.4 Hektar',
            'lokasi' => 'Surabaya Timur',
            'foto' => 'images/jagir.jpg',
        ],

        'greges' => [
            'nama' => 'Greges',
            'skor' => 80,
            'dokumentasi' => 175,
            'pembahasan' => 260,
            'prioritas' => 'Tinggi',
            'panjang' => '11.3 Km',
            'luas' => '39 Hektar',
            'lokasi' => 'Surabaya Barat',
            'foto' => 'images/greges.jpg',
        ]
    ];

    abort_if(!isset($sungai[$slug]),404);

    return view('detail-sungai',[
        'sungai'=>$sungai[$slug]
    ]);
})->name('detail.sungai');


Route::get('/prioritas-sungai', function () {
    return view('public.prioritas');
})->name('prioritas');

Route::get('/tentang', function () {
    return view('public.tentang');
})->name('tentang');