<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public.home');
})->name('home');

Route::get('/peta', function () {
    return view('public.peta');
})->name('peta');

Route::get('/prioritas-sungai', function () {
    return view('public.prioritas');
})->name('prioritas');

Route::get('/tentang', function () {
    return view('public.tentang');
})->name('tentang');

Route::get('/sungai/{slug}', function ($slug) {

    $sungai = [

        'kalimas' => [
            'nama' => 'Kalimas',
            'lokasi' => 'Surabaya Pusat',
            'foto' => 'images/home sungai.png',
            'lat' => -7.204056,
            'lng' => 112.736528,
            'status' => 'Belum Dianalisis',
            'deskripsi' => 'Sungai Kalimas merupakan anak Sungai Brantas yang membelah Kota Surabaya dan bermuara ke Selat Madura. Sungai ini memiliki nilai sejarah tinggi sebagai jalur perdagangan sejak masa Kerajaan Majapahit.'
        ],

        'jagir' => [
            'nama' => 'Jagir',
            'lokasi' => 'Surabaya Timur',
            'foto' => 'images/home sungai.png',
            'lat' => -7.304694,
            'lng' => 112.844556,
            'status' => 'Belum Dianalisis',
            'deskripsi' => 'Sungai Jagir merupakan salah satu sungai utama di Surabaya Timur yang berfungsi sebagai saluran pengendali banjir dan bagian dari sistem drainase kota.'
        ],

        'gunung-anyar' => [
            'nama' => 'Gunung Anyar',
            'lokasi' => 'Surabaya Timur',
            'foto' => 'images/home sungai.png',
            'lat' => -7.334639,
            'lng' => 112.829972,
            'status' => 'Belum Dianalisis',
            'deskripsi' => 'Sungai Gunung Anyar mengalir menuju kawasan pesisir timur Surabaya dan berhubungan dengan ekosistem mangrove.'
        ],

        'dadapan' => [
            'nama' => 'Dadapan',
            'lokasi' => 'Surabaya Timur',
            'foto' => 'images/home sungai.png',
            'lat' => -7.321694,
            'lng' => 112.837667,
            'status' => 'Belum Dianalisis',
            'deskripsi' => 'Sungai Dadapan merupakan salah satu aliran sungai yang bermuara di pesisir timur Surabaya.'
        ],

        'keputih' => [
            'nama' => 'Keputih',
            'lokasi' => 'Keputih',
            'foto' => 'images/home sungai.png',
            'lat' => -7.299056,
            'lng' => 112.845972,
            'status' => 'Belum Dianalisis',
            'deskripsi' => 'Sungai Keputih berada dekat kawasan konservasi mangrove Surabaya.'
        ],

        'damean' => [
            'nama' => 'Damean',
            'lokasi' => 'Surabaya Timur',
            'foto' => 'images/home sungai.png',
            'lat' => -7.274306,
            'lng' => 112.839889,
            'status' => 'Belum Dianalisis',
            'deskripsi' => 'Sungai Damean bermuara di kawasan pesisir timur Surabaya.'
        ],

        'kalisari' => [
            'nama' => 'Kalisari',
            'lokasi' => 'Kalisari',
            'foto' => 'images/home sungai.png',
            'lat' => -7.257278,
            'lng' => 112.810972,
            'status' => 'Belum Dianalisis',
            'deskripsi' => 'Sungai Kalisari mengalir melewati kawasan permukiman Surabaya.'
        ],

        'kedung-cowek' => [
            'nama' => 'Kedung Cowek',
            'lokasi' => 'Kenjeran',
            'foto' => 'images/home sungai.png',
            'lat' => -7.208989,
            'lng' => 112.780000,
            'status' => 'Belum Dianalisis',
            'deskripsi' => 'Sungai Kedung Cowek berada di sekitar kawasan Jembatan Suramadu.'
        ],

        'tambak-wedi' => [
            'nama' => 'Tambak Wedi',
            'lokasi' => 'Kenjeran',
            'foto' => 'images/home sungai.png',
            'lat' => -7.203139,
            'lng' => 112.772611,
            'status' => 'Belum Dianalisis',
            'deskripsi' => 'Sungai Tambak Wedi bermuara di kawasan pesisir Kenjeran.'
        ],

        'bosem-kalianak' => [
            'nama' => 'Bosem Kalianak',
            'lokasi' => 'Kalianak',
            'foto' => 'images/home sungai.png',
            'lat' => -7.235694,
            'lng' => 112.715361,
            'status' => 'Belum Dianalisis',
            'deskripsi' => 'Bosem Kalianak berada dekat kawasan industri Surabaya Barat.'
        ],

        'kalianak' => [
            'nama' => 'Kalianak',
            'lokasi' => 'Kalianak',
            'foto' => 'images/home sungai.png',
            'lat' => -7.222750,
            'lng' => 112.706250,
            'status' => 'Belum Dianalisis',
            'deskripsi' => 'Sungai Kalianak mengalir melewati kawasan industri Surabaya.'
        ],

        'greges' => [
            'nama' => 'Greges',
            'lokasi' => 'Surabaya Barat',
            'foto' => 'images/home sungai.png',
            'lat' => -7.225667,
            'lng' => 112.685917,
            'status' => 'Belum Dianalisis',
            'deskripsi' => 'Sungai Greges merupakan bagian penting sistem drainase Surabaya Barat.'
        ],

        'manukan' => [
            'nama' => 'Manukan',
            'lokasi' => 'Manukan',
            'foto' => 'images/home sungai.png',
            'lat' => -7.224194,
            'lng' => 112.677250,
            'status' => 'Belum Dianalisis',
            'deskripsi' => 'Sungai Manukan bermuara di wilayah Surabaya Barat.'
        ],

        'tambak-langon' => [
            'nama' => 'Tambak Langon',
            'lokasi' => 'Tambak Langon',
            'foto' => 'images/home sungai.png',
            'lat' => -7.220194,
            'lng' => 112.668389,
            'status' => 'Belum Dianalisis',
            'deskripsi' => 'Sungai Tambak Langon berada di kawasan pesisir dan pelabuhan.'
        ],

        'sememi' => [
            'nama' => 'Sememi',
            'lokasi' => 'Sememi',
            'foto' => 'images/home sungai.png',
            'lat' => -7.207250,
            'lng' => 112.660417,
            'status' => 'Belum Dianalisis',
            'deskripsi' => 'Sungai Sememi berada di wilayah barat laut Surabaya.'
        ],

        'kali-lamong' => [
            'nama' => 'Kali Lamong',
            'lokasi' => 'Perbatasan Surabaya - Gresik',
            'foto' => 'images/home sungai.png',
            'lat' => -7.193222,
            'lng' => 112.662500,
            'status' => 'Belum Dianalisis',
            'deskripsi' => 'Kali Lamong merupakan sungai besar yang berada di perbatasan Surabaya dan Gresik.'
        ],

        'kebon-agung' => [
            'nama' => 'Kebon Agung',
            'lokasi' => 'Surabaya Timur',
            'foto' => 'images/home sungai.png',
            'lat' => -7.342167,
            'lng' => 112.824000,
            'status' => 'Belum Dianalisis',
            'deskripsi' => 'Sungai Kebon Agung merupakan salah satu muara sungai di wilayah timur Surabaya.'
        ],

    ];

    abort_unless(isset($sungai[$slug]), 404);

    return view('public.detail-sungai', [
        'sungai' => $sungai[$slug]
    ]);

})->name('detail.sungai');