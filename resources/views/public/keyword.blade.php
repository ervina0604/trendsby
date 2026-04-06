@extends('layouts.app')

@section('title','Keyword Dominan')

@section('content')

<section class="mb-12">

    <!-- Label -->
    <div class="inline-block bg-[#F4D7C1] text-[#7A4B15] text-xs font-bold px-4 py-2 rounded-full uppercase tracking-widest mb-6">
        Analytics Report
    </div>

    <!-- Heading -->
    <h1 class="text-[42px] font-extrabold text-[#0A3A67] leading-tight mb-4">
        Keyword Dominan dari Caption Instagram
    </h1>

    <p class="text-lg text-gray-500 max-w-2xl leading-8">
        Kata-kata yang paling sering muncul dalam konten 
        <span class="text-green-600 font-semibold">@pedulisungaisurabaya</span> dan 
        <span class="text-green-600 font-semibold">@ecoton</span>. 
        Analisis narasi lingkungan di media sosial Surabaya.
    </p>

</section>

<section class="grid lg:grid-cols-[1.6fr_1fr] gap-8 mb-12">

    <!-- LEFT: WORD CLOUD -->
    <div class="bg-white rounded-[30px] p-8 shadow-sm border border-gray-100">

        <div class="flex justify-between items-center mb-6">
            <div>
                <h3 class="text-lg font-bold text-[#0A3A67]">
                    Visualisasi Narasi
                </h3>
                <p class="text-sm text-gray-400">
                    Kepadatan terminologi per periode 2024
                </p>
            </div>
        </div>

        <!-- Word Cloud -->
        <div class="text-center mt-10 space-y-6">

            <div class="flex justify-center gap-10 flex-wrap">
                <span class="text-[56px] font-extrabold text-[#0A3A67]">SAMPAH</span>
                <span class="text-[48px] font-extrabold text-green-700">PLASTIK</span>
            </div>

            <div class="flex justify-center gap-8 flex-wrap text-[#0A3A67]">
                <span class="text-2xl">PENCEMARAN</span>
                <span class="text-3xl text-green-700 font-bold">BANJIR</span>
                <span class="text-xl text-gray-500">LIMBAH</span>
            </div>

            <div class="flex justify-center gap-6 flex-wrap text-gray-500">
                <span class="text-green-700 font-bold">AKSI BERSIH</span>
                <span>KALIMAS</span>
                <span class="text-[#0A3A67] font-semibold">MIKROPLASTIK</span>
                <span>EDUKASI</span>
            </div>

            <div class="flex justify-center gap-6 flex-wrap">
                <span class="text-[#0A3A67] font-bold">EKOSISTEM</span>
                <span class="text-gray-400">SURABAYA</span>
                <span class="text-green-700 font-bold">SUNGAI</span>
            </div>

        </div>

        <!-- Legend -->
        <div class="flex gap-6 mt-10 text-sm text-gray-500">
            <div class="flex items-center gap-2">
                <span class="w-3 h-3 bg-[#0A3A67] rounded-full"></span>
                Isu Utama
            </div>
            <div class="flex items-center gap-2">
                <span class="w-3 h-3 bg-green-600 rounded-full"></span>
                Aksi Positif
            </div>
        </div>

    </div>

    <!-- RIGHT SIDE -->
    <div class="space-y-6">

        <!-- TOP KEYWORD CARD -->
        <div class="bg-[#0A3A67] text-white rounded-[24px] p-6">
            <div class="text-sm text-gray-300 mb-2 uppercase">
                Top Keyword
            </div>

            <div class="flex items-end gap-2">
                <span class="text-[48px] font-extrabold">154</span>
                <span class="text-gray-300 mb-2">sebutan "sampah"</span>
            </div>
        </div>

        <!-- RANKING -->
        <div class="bg-white rounded-[24px] p-6 shadow-sm border border-gray-100">

            <h3 class="font-bold text-[#0A3A67] mb-4">
                Ranking Keyword
            </h3>

            <div class="space-y-4 text-sm">

                @php
                    $keywords = [
                        ['rank'=>1,'name'=>'sampah','count'=>154],
                        ['rank'=>2,'name'=>'plastik','count'=>120],
                        ['rank'=>3,'name'=>'pencemaran','count'=>98],
                        ['rank'=>4,'name'=>'banjir','count'=>76],
                        ['rank'=>5,'name'=>'limbah','count'=>65],
                    ];
                @endphp

                @foreach($keywords as $item)
                    <div class="flex justify-between items-center">

                        <div class="flex gap-4 items-center">
                            <span class="font-bold text-green-600">
                                {{ str_pad($item['rank'],2,'0',STR_PAD_LEFT) }}
                            </span>

                            <span class="text-[#0A3A67] font-semibold">
                                {{ $item['name'] }}
                            </span>
                        </div>

                        <span class="bg-gray-100 px-3 py-1 rounded-full text-gray-600 text-xs">
                            {{ $item['count'] }}
                        </span>

                    </div>
                @endforeach

            </div>

            <div class="mt-6 text-center">
                <button class="border border-dashed border-gray-300 px-4 py-2 rounded-full text-sm text-gray-500 hover:bg-gray-50">
                    Lihat Dataset Lengkap
                </button>
            </div>

        </div>

    </div>

</section>

<!-- BOTTOM SECTION -->
<section class="grid lg:grid-cols-2 gap-10 items-center">

    <!-- IMAGE -->
    <div class="relative rounded-[28px] overflow-hidden shadow-md">

        <img src="{{ asset('storage/kalimas.png') }}" 
             alt="Sungai Kalimas"
             class="w-full h-full object-cover">

        <div class="absolute inset-0 bg-gradient-to-t from-[#0A3A67]/90 to-transparent"></div>

        <div class="absolute bottom-6 left-6 text-white">
            <div class="text-xs uppercase tracking-widest text-gray-300">
                Focus Area
            </div>
            <div class="text-xl font-bold">
                Sungai Surabaya & Kalimas
            </div>
        </div>

    </div>

    <!-- TEXT -->
    <div>

        <h2 class="text-[30px] font-extrabold text-[#0A3A67] mb-4">
            Membaca Krisis dari Balik Caption Media Sosial.
        </h2>

        <p class="text-gray-500 leading-8">
            Data menunjukkan dominasi narasi "Sampah" dan "Plastik" yang konsisten. 
            Hal ini mencerminkan urgensi isu polusi yang menjadi perhatian utama bagi komunitas 
            <span class="text-green-600">@pedulisungaisurabaya</span> dan 
            <span class="text-green-600">@ecoton</span> dalam setahun terakhir.
        </p>

    </div>

</section>

@endsection