@extends('layouts.app')

@section('title','Ranking Keyword')

@section('content')

<!-- HEADER -->
<section class="mb-8">
    <h1 class="text-[32px] font-extrabold text-[#083B6E]">
        Ranking Keyword Dominan
    </h1>
    <p class="text-gray-500">
        Analytics Overview
    </p>
</section>


<!-- SUMMARY -->
<div class="grid md:grid-cols-3 gap-6 mb-10">

    <!-- TOTAL -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border">
        <p class="text-gray-400 text-sm mb-2">Total keyword</p>
        <h2 class="text-3xl font-extrabold text-[#083B6E]">1,284</h2>
        <div class="flex items-center gap-2 mt-2 text-green-600 text-sm">
            <img src="{{ asset('storage/naik.png') }}" class="w-4">
            +12% from last month
        </div>
    </div>

    <!-- AVG -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border">
        <p class="text-gray-400 text-sm mb-2">Avg Position</p>
        <h2 class="text-3xl font-extrabold text-[#083B6E]">4.2</h2>
        <div class="flex items-center gap-2 mt-2 text-green-600 text-sm">
            <img src="{{ asset('storage/naik.png') }}" class="w-4">
            +0.8 points growth
        </div>
    </div>

    <!-- TOP -->
    <div class="bg-[#1F4F46] text-white p-6 rounded-2xl shadow-md relative overflow-hidden">
        <p class="text-sm opacity-80 mb-2">Top Performer</p>
        <h2 class="text-2xl font-extrabold">sampah plastik</h2>
        <p class="text-sm opacity-80 mt-2">
            Keyword ini memiliki engagement tinggi dan konsisten trending.
        </p>

        <img src="{{ asset('storage/bintang.png') }}"
             class="absolute right-4 top-4 w-10 opacity-20">
    </div>

</div>


<!-- TABLE -->
<div class="bg-white rounded-[28px] p-6 shadow-sm border">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h3 class="font-bold text-[#083B6E]">
            Keyword Performance
        </h3>

        <div class="flex gap-3">
            <button class="flex items-center gap-2 px-4 py-2 bg-gray-100 rounded-full text-sm">
                <img src="{{ asset('storage/filter.png') }}" class="w-4">
                Filter periode
            </button>

            <button class="flex items-center gap-2 px-4 py-2 bg-[#2E9F43] text-white rounded-full text-sm">
                <img src="{{ asset('storage/export.png') }}" class="w-4">
                Export Data
            </button>
        </div>
    </div>

    <table class="w-full text-sm">

        <thead class="text-gray-400 text-xs uppercase">
            <tr>
                <th class="text-left py-3">Rank</th>
                <th class="text-left py-3">Keyword</th>
                <th class="text-left py-3">Category</th>
                <th class="text-left py-3">Kemunculan</th>
                <th class="text-left py-3">Trend</th>
            </tr>
        </thead>

        <tbody class="divide-y">

        @php
        $data = [
            ['sampah','environment',154,'turun'],
            ['plastik','environment',120,'turun'],
            ['pencemaran','news',98,'stabil'],
            ['banjir','environment',87,'naik'],
            ['limbah','environment',82,'naik'],
            ['aksi bersih','social',74,'naik'],
            ['kalimas','news',65,'stabil'],
            ['mikroplastik','environment',59,'naik'],
            ['ekosistem','environment',51,'turun'],
            ['surabaya','news',48,'naik'],
        ];
        @endphp

        @foreach($data as $i => $row)
        <tr class="hover:bg-gray-50">

            <td class="py-4 text-gray-500 font-semibold">
                {{ str_pad($i+1,2,'0',STR_PAD_LEFT) }}
            </td>

            <td class="py-4 font-bold text-[#083B6E]">
                {{ $row[0] }}
            </td>

            <td class="py-4">
                <span class="px-3 py-1 rounded-full text-xs bg-gray-100">
                    {{ $row[1] }}
                </span>
            </td>

            <td class="py-4 font-semibold text-gray-600">
                {{ $row[2] }}
            </td>

            <td class="py-4 flex items-center gap-2">

                @if($row[3] == 'naik')
                    <img src="{{ asset('storage/naik.png') }}" class="w-4">
                    <span class="text-green-600 text-sm">Naik</span>

                @elseif($row[3] == 'turun')
                    <img src="{{ asset('storage/turun.png') }}" class="w-4">
                    <span class="text-red-500 text-sm">Turun</span>

                @else
                    <img src="{{ asset('storage/stabil.png') }}" class="w-4">
                    <span class="text-gray-400 text-sm">Stabil</span>
                @endif

            </td>

        </tr>
        @endforeach

        </tbody>

    </table>


    <!-- PAGINATION -->
    <div class="flex justify-between items-center mt-6 text-sm text-gray-400">

        <span>Showing 1 to 10 of 50 results</span>

        <div class="flex gap-2 items-center">
            <span class="w-8 h-8 flex items-center justify-center rounded-full bg-[#083B6E] text-white">1</span>
            <span class="w-8 h-8 flex items-center justify-center">2</span>
            <span class="w-8 h-8 flex items-center justify-center">3</span>
        </div>

    </div>

</div>


<!-- INSIGHT -->
<div class="grid md:grid-cols-2 gap-6 mt-10">

    <div class="bg-white p-6 rounded-2xl border shadow-sm flex gap-4">
        <img src="{{ asset('storage/analisis.png') }}" class="w-10 h-10">
        <div>
            <h3 class="font-bold text-[#083B6E] mb-1">
                Content Opportunity
            </h3>
            <p class="text-sm text-gray-500">
                Keyword "pencemaran" mengalami kenaikan signifikan dan berpotensi menjadi tren utama.
            </p>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl border shadow-sm flex gap-4">
        <img src="{{ asset('storage/system.png') }}" class="w-10 h-10">
        <div>
            <h3 class="font-bold text-[#083B6E] mb-1">
                Top Region Note
            </h3>
            <p class="text-sm text-gray-500">
                Aktivitas keyword tertinggi berasal dari wilayah Surabaya Timur dan daerah hilir sungai.
            </p>
        </div>
    </div>

</div>

@endsection