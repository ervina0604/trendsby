@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<h1 class="text-3xl font-bold text-blue-900 mb-6">
    Dashboard Ringkasan
</h1>

<!-- CARDS -->
<div class="grid grid-cols-4 gap-4 mb-6">

    <div class="bg-white p-5 rounded-xl shadow">
        <p class="text-sm text-gray-400">Total Postingan</p>
        <h2 class="text-2xl font-bold text-blue-900">245</h2>
    </div>

    <div class="bg-white p-5 rounded-xl shadow">
        <p class="text-sm text-gray-400">Total Hashtag</p>
        <h2 class="text-2xl font-bold text-blue-900">89</h2>
    </div>

    <div class="bg-white p-5 rounded-xl shadow">
        <p class="text-sm text-gray-400">Total Keyword</p>
        <h2 class="text-2xl font-bold text-blue-900">143</h2>
    </div>

    <div class="bg-blue-900 text-white p-5 rounded-xl shadow">
        <p class="text-sm">Engagement Tertinggi</p>
        <h2 class="text-2xl font-bold">8.4%</h2>
    </div>

</div>

<!-- TREND + HASHTAG -->
<div class="grid grid-cols-3 gap-6">

    <!-- TREND -->
    <div class="col-span-2 bg-white p-6 rounded-xl shadow">
        <h3 class="font-semibold text-gray-700 mb-4">Trend Posting Mingguan</h3>

        <div class="h-40 flex items-end gap-3">
            <div class="bg-gray-300 w-8 h-20 rounded"></div>
            <div class="bg-gray-400 w-8 h-28 rounded"></div>
            <div class="bg-gray-500 w-8 h-36 rounded"></div>
            <div class="bg-green-400 w-8 h-44 rounded"></div>
            <div class="bg-gray-400 w-8 h-30 rounded"></div>
            <div class="bg-gray-300 w-8 h-20 rounded"></div>
            <div class="bg-gray-200 w-8 h-16 rounded"></div>
        </div>
    </div>

    <!-- HASHTAG -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="font-semibold mb-4">Top Hashtags</h3>

        <div class="space-y-3 text-sm">
            <p>#sungaisurabaya</p>
            <p>#pedulisungai</p>
            <p>#ecoton</p>
            <p>#aksibersih</p>
            <p>#lingkungan</p>
        </div>
    </div>

</div>

<!-- KEYWORD -->
<div class="bg-white mt-6 p-6 rounded-xl shadow">
    <h3 class="font-semibold mb-4">Top Keywords</h3>

    <div class="flex flex-wrap gap-4 text-lg">
        <span class="text-blue-900 font-bold text-3xl">sampah</span>
        <span class="text-green-600 text-2xl">plastik</span>
        <span class="text-gray-500">banjir</span>
        <span class="text-gray-400">limbah</span>
    </div>
</div>

@endsection