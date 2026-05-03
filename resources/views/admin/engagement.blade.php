@extends('layouts.admin')

@section('title', 'Engagement Tertinggi')

@section('content')

<div class="p-8">

    <!-- Header dengan Title dan Filter -->
    <div class="flex items-start justify-between mb-8">
        <div>
            <p class="text-xs font-bold uppercase tracking-widest text-green-600 mb-2">Data Analytics Report</p>
            <h2 class="text-3xl font-bold text-[#083B6E] mb-2">Engagement Tertinggi</h2>
            <p class="text-gray-500 text-sm">
                Ranking postingan berdasarkan total interaksi (Like + Comment) untuk memantau performa konten lingkungan.
            </p>
        </div>

        <!-- Filter Box -->
        <div class="bg-white rounded-lg shadow p-4 space-y-4 min-w-max">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-gray-500">Filter Akun</p>
                <p class="text-sm font-bold text-[#083B6E]">Semua A</p>
            </div>
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-gray-500">Rentang Tanggal</p>
                <p class="text-sm font-bold text-[#083B6E] flex items-center gap-2">
                    01 Jan 2024 - 31 Jan 2024
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h18M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </p>
            </div>
        </div>
    </div>

    <!-- Grid Layout: Champion + Ranking | Insight -->
    <div class="grid grid-cols-3 gap-8">

        <!-- Kolom Kiri: Champion + Ranking Table -->
        <div class="col-span-2 bg-white rounded-xl shadow p-6">

            <!-- Champion Row -->
            <div class="flex items-center justify-between pb-6 border-b mb-6">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold uppercase text-gray-500">Juara Engagement Bulan Ini</p>
                        <p class="text-lg font-bold text-[#083B6E]">@pedulisungaisurabaya</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-3xl font-bold text-green-600">608</p>
                    <p class="text-xs font-bold uppercase text-gray-500">Total Interactions</p>
                </div>
            </div>

            <!-- Ranking Table -->
            <div>
                <div class="grid grid-cols-5 gap-4 pb-3 border-b mb-4 text-xs font-bold uppercase text-gray-500">
                    <div>Rank</div>
                    <div>Akun</div>
                    <div class="col-span-1">Caption</div>
                    <div class="text-right">Like</div>
                    <div class="text-right">Comment Eng</div>
                </div>

                <!-- Row 1 -->
                <div class="grid grid-cols-5 gap-4 py-3 border-b items-center">
                    <div class="w-7 h-7 bg-yellow-100 text-yellow-700 rounded-full flex items-center justify-center font-bold text-sm">1</div>
                    <div class="w-8 h-8 bg-gray-200 rounded-full flex-shrink-0"></div>
                    <div>
                        <p class="font-bold text-sm text-[#083B6E]">@pedulisungaisurabaya</p>
                        <p class="text-xs text-gray-500">"Aksi bersih Sungai Surabaya..."</p>
                    </div>
                    <div class="text-right font-bold text-gray-700">560</div>
                    <div class="text-right font-bold text-gray-700">48</div>
                </div>

                <!-- Row 2 -->
                <div class="grid grid-cols-5 gap-4 py-3 items-center">
                    <div class="w-7 h-7 bg-gray-200 text-gray-600 rounded-full flex items-center justify-center font-bold text-sm">2</div>
                    <div class="w-8 h-8 bg-gray-200 rounded-full flex-shrink-0"></div>
                    <div>
                        <p class="font-bold text-sm text-[#083B6E]">@ecoton</p>
                        <p class="text-xs text-gray-500">"Hasil audit sampah plastik..."</p>
                    </div>
                    <div class="text-right font-bold text-gray-700">430</div>
                    <div class="text-right font-bold text-gray-700">31</div>
                </div>
            </div>

        </div>

        <!-- Kolom Kanan: Insight Box -->
        <div class="bg-gradient-to-br from-[#083B6E] to-[#0d5a8f] rounded-xl shadow p-6 text-white h-fit">
            <div class="text-2xl mb-3">✦</div>
            <h4 class="text-xl font-bold mb-3">Insight Editorial</h4>
            <p class="text-sm leading-relaxed text-blue-100 mb-4">
                Konten edukasi berbasis visual (infografik) cenderung mendapatkan <strong class="text-green-400">2.4x engagement lebih tinggi</strong> dibanding konten dokumentasi kegiatan biasa.
            </p>
            <div class="pt-4 border-t border-blue-400">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-bold uppercase text-blue-200">Growth vs Prev Month</span>
                    <span class="text-green-400 font-bold">+18%</span>
                </div>
                <div class="w-full bg-blue-800 rounded-full h-2 overflow-hidden">
                    <div class="bg-green-400 h-full" style="width: 18%"></div>
                </div>
            </div>
        </div>

    </div>

    <!-- Leader Cards -->
    <div class="grid grid-cols-2 gap-8 mt-8">

        <div class="bg-white rounded-xl shadow p-6">
            <div class="flex items-center justify-between mb-4">
                <p class="text-xs font-bold uppercase tracking-wider text-gray-500">Like Leader</p>
                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14z"></path>
                </svg>
            </div>
            <p class="text-4xl font-bold text-blue-600">560</p>
            <p class="text-sm text-gray-500 mt-1">@pedulisungaisurabaya</p>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <div class="flex items-center justify-between mb-4">
                <p class="text-xs font-bold uppercase tracking-wider text-gray-500">Comment Leader</p>
                <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                </svg>
            </div>
            <p class="text-4xl font-bold text-purple-600">48</p>
            <p class="text-sm text-gray-500 mt-1">@pedulisungaisurabaya</p>
        </div>

    </div>

</div>

@endsection