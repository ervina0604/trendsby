@extends('layouts.app')

@section('title','Keyword Dominan')

@php
    $rankingKeyword = [
        ['rank' => '01', 'keyword' => 'sampah', 'count' => 154],
        ['rank' => '02', 'keyword' => 'plastik', 'count' => 120],
        ['rank' => '03', 'keyword' => 'pencemaran', 'count' => 98],
        ['rank' => '04', 'keyword' => 'banjir', 'count' => 76],
        ['rank' => '05', 'keyword' => 'limbah', 'count' => 65],
    ];

    $words = [
        ['text' => 'SAMPAH', 'class' => 'text-[58px] xl:text-[68px] font-extrabold text-[#083B6E] tracking-[-0.05em]'],
        ['text' => 'PLASTIK', 'class' => 'text-[44px] xl:text-[50px] font-extrabold text-[#1F7A32]'],
        ['text' => 'PENCEMARAN', 'class' => 'text-[30px] xl:text-[34px] text-[#325E86] font-semibold'],
        ['text' => 'BANJIR', 'class' => 'text-[34px] xl:text-[38px] font-extrabold text-[#2E7D32]'],
        ['text' => 'LIMBAH', 'class' => 'text-[28px] xl:text-[32px] text-[#4D6D8A] font-medium'],
        ['text' => 'AKSI BERSIH', 'class' => 'text-[20px] xl:text-[22px] font-extrabold text-[#5A9A5C]'],
        ['text' => 'KALIMAS', 'class' => 'text-[18px] xl:text-[20px] text-[#94A3B8]'],
        ['text' => 'MIKROPLASTIK', 'class' => 'text-[20px] xl:text-[24px] font-extrabold text-[#6786A3]'],
        ['text' => 'EDUKASI', 'class' => 'text-[18px] xl:text-[20px] text-[#6AA36B]'],
        ['text' => 'EKOSISTEM', 'class' => 'text-[26px] xl:text-[30px] font-extrabold text-[#083B6E]'],
        ['text' => 'SURABAYA', 'class' => 'text-[18px] xl:text-[20px] text-[#94A3B8]'],
        ['text' => 'SUNGAI', 'class' => 'text-[24px] xl:text-[28px] font-extrabold text-[#1F7A32]'],
    ];
@endphp

@section('content')

<section class="mb-12">
    <div class="inline-flex items-center gap-2 bg-[#F4D8C1] text-[#5E432E] text-[12px] font-extrabold px-4 h-[32px] rounded-full uppercase tracking-[.08em] mb-8">
        ANALYTICS REPORT
    </div>

    <div class="max-w-[900px]">
        <h1 class="text-[58px] leading-[1.04] font-extrabold text-[#083B6E] tracking-[-0.045em] mb-5">
            Keyword Dominan dari Caption Instagram
        </h1>

        <p class="text-[18px] leading-[1.7] text-slate-600 max-w-[760px]">
            Kata-kata yang paling sering muncul dalam konten
            <span class="text-[#2E7D32] font-semibold">@pedulisungaisurabaya</span> dan
            <span class="text-[#2E7D32] font-semibold">@ecoton</span>.
            Analisis narasi lingkungan di media sosial Surabaya.
        </p>
    </div>
</section>

<section class="grid grid-cols-1 xl:grid-cols-[1.45fr_1fr] gap-6 mb-12 items-stretch">
    <div class="glass-card p-0 overflow-hidden">
        <div class="h-[4px] w-full bg-gradient-to-r from-[#083B6E] via-[#083B6E] to-[#2E9F43]"></div>

        <div class="p-8 xl:p-9">
            <div class="flex items-end justify-between gap-4 mb-10">
                <div>
                    <h2 class="text-[24px] xl:text-[26px] font-extrabold text-[#083B6E] tracking-[-0.03em] mb-2">
                        Visualisasi Narasi
                    </h2>
                    <p class="text-[15px] text-[#8292A8]">
                        Kepadatan terminologi per periode 2024
                    </p>
                </div>

                <img src="{{ asset('storage/system.png') }}" alt="Visual" class="w-5 h-5 opacity-35 object-contain">
            </div>

            <div class="min-h-[470px] flex flex-col justify-center">
                <div class="flex flex-col items-center text-center gap-7">
                    <div class="flex flex-wrap justify-center items-end gap-7">
                        <div class="{{ $words[0]['class'] }}">{{ $words[0]['text'] }}</div>
                        <div class="{{ $words[1]['class'] }}">{{ $words[1]['text'] }}</div>
                    </div>

                    <div class="flex flex-wrap justify-center items-end gap-7">
                        <div class="{{ $words[2]['class'] }}">{{ $words[2]['text'] }}</div>
                        <div class="{{ $words[3]['class'] }}">{{ $words[3]['text'] }}</div>
                        <div class="{{ $words[4]['class'] }}">{{ $words[4]['text'] }}</div>
                    </div>

                    <div class="flex flex-wrap justify-center items-end gap-7">
                        <div class="{{ $words[5]['class'] }}">{{ $words[5]['text'] }}</div>
                        <div class="{{ $words[6]['class'] }}">{{ $words[6]['text'] }}</div>
                        <div class="{{ $words[7]['class'] }}">{{ $words[7]['text'] }}</div>
                        <div class="{{ $words[8]['class'] }}">{{ $words[8]['text'] }}</div>
                    </div>

                    <div class="flex flex-wrap justify-center items-end gap-7">
                        <div class="{{ $words[9]['class'] }}">{{ $words[9]['text'] }}</div>
                        <div class="{{ $words[10]['class'] }}">{{ $words[10]['text'] }}</div>
                        <div class="{{ $words[11]['class'] }}">{{ $words[11]['text'] }}</div>
                    </div>
                </div>

                <div class="mt-14 pt-6 border-t border-slate-200 flex flex-wrap items-center gap-6">
                    <div class="flex items-center gap-2 text-[13px] font-bold text-slate-500">
                        <span class="w-3 h-3 rounded-full bg-[#083B6E]"></span>
                        ISU UTAMA
                    </div>
                    <div class="flex items-center gap-2 text-[13px] font-bold text-slate-500">
                        <span class="w-3 h-3 rounded-full bg-[#1F7A32]"></span>
                        AKSI POSITIF
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="space-y-6">
        <div class="rounded-[28px] bg-[#063A67] text-white p-8 min-h-[150px] relative overflow-hidden flex items-center">
            <div>
                <div class="text-[14px] uppercase tracking-[.08em] text-[#A5C2DB] font-semibold mb-4">
                    TOP KEYWORD
                </div>
                <div class="flex items-end gap-3 flex-wrap">
                    <div class="text-[72px] leading-none font-extrabold tracking-[-0.05em]">154</div>
                    <div class="text-[18px] text-slate-300 pb-3">sebutan "sampah"</div>
                </div>
            </div>

            <div class="absolute right-[-24px] top-[-24px] w-[120px] h-[120px] rounded-full bg-[#0A4B7F] opacity-35"></div>
        </div>

        <div class="glass-card p-8 min-h-[500px]">
            <div class="flex items-center justify-between gap-4 mb-8">
                <h3 class="text-[28px] font-extrabold text-[#083B6E] tracking-[-0.03em]">
                    Ranking Keyword
                </h3>
                <img src="{{ asset('storage/filter.png') }}" alt="Filter" class="w-5 h-5 opacity-45 object-contain">
            </div>

            <div class="grid grid-cols-[70px_1fr_120px] text-[11px] uppercase tracking-[.14em] font-extrabold text-slate-400 pb-4 border-b border-slate-200">
                <div>Rank</div>
                <div>Keyword</div>
                <div class="text-right">Kemunculan</div>
            </div>

            <div class="divide-y divide-slate-200">
                @foreach($rankingKeyword as $item)
                    <div class="grid grid-cols-[70px_1fr_120px] items-center py-6">
                        <div class="text-[34px] leading-none font-extrabold text-[#1F7A32] tracking-[-0.04em]">
                            {{ $item['rank'] }}
                        </div>

                        <div class="text-[18px] font-extrabold text-[#083B6E]">
                            {{ $item['keyword'] }}
                        </div>

                        <div class="text-right">
                            <span class="inline-flex items-center justify-center min-w-[48px] h-[32px] px-4 rounded-full bg-[#DCE5EE] text-[#083B6E] font-extrabold text-[14px]">
                                {{ $item['count'] }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>

<<<<<<< HEAD
            <div class="pt-8">
                <a href="{{ route('detail_keyword') }}"
                   class="w-full h-[54px] rounded-full border border-dashed border-slate-300 text-[#6B8AA4] text-[15px] font-extrabold inline-flex items-center justify-center hover:bg-white transition">
=======
            <div class="mt-6 text-center">
                <a href="{{ route('detail.keyword') }}"
                class="inline-block border border-dashed border-gray-300 px-4 py-2 rounded-full text-sm text-gray-500 hover:bg-gray-50 transition">
>>>>>>> 0f4e1d45621335f5591d9ba88f95c19b1bf03003
                    Lihat Dataset Lengkap
                </a>
            </div>
        </div>
    </div>
</section>

<section class="glass-card p-10 xl:p-12 min-h-[430px]">
    <div class="grid grid-cols-1 xl:grid-cols-[500px_1fr] gap-10 items-center">
        <div class="relative min-h-[320px] rounded-[28px] overflow-hidden shadow-[0_10px_24px_rgba(8,59,110,0.12)]">
            <img src="{{ asset('storage/kalimas.png') }}" alt="Sungai Surabaya dan Kalimas" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-[#083B6E]/88 via-[#083B6E]/28 to-transparent"></div>

<<<<<<< HEAD
            <div class="absolute left-6 bottom-6 text-white">
                <div class="text-[12px] uppercase tracking-[.12em] font-semibold opacity-90 mb-3">
                    FOCUS AREA
                </div>
                <div class="text-[20px] font-extrabold tracking-[-0.02em]">
                    Sungai Surabaya & Kalimas
                </div>
=======
    <!-- IMAGE -->
    <div class="relative rounded-[28px] overflow-hidden shadow-md">

           <img src="{{ asset('storage/kalimas.png') }}" 
               alt="Sungai Kalimas"
               class="w-full h-full object-cover pointer-events-none">

           <div class="absolute inset-0 bg-gradient-to-t from-[#0A3A67]/90 to-transparent pointer-events-none"></div>

        <div class="absolute bottom-6 left-6 text-white">
            <div class="text-xs uppercase tracking-widest text-gray-300">
                Focus Area
            </div>
            <div class="text-xl font-bold">
                Sungai Surabaya & Kalimas
>>>>>>> 0f4e1d45621335f5591d9ba88f95c19b1bf03003
            </div>
        </div>

        <div>
            <h2 class="text-[44px] leading-[1.15] font-extrabold text-[#083B6E] tracking-[-0.04em] mb-7 max-w-[560px]">
                Membaca Krisis dari Balik Caption Media Sosial.
            </h2>

            <p class="text-[18px] leading-[1.85] text-slate-500 max-w-[620px]">
                Data menunjukkan dominasi narasi "Sampah" dan "Plastik" yang konsisten.
                Hal ini mencerminkan urgensi isu polusi yang menjadi perhatian utama bagi komunitas
                @pedulisungaisurabaya dan @ecoton dalam setahun terakhir.
            </p>
        </div>
    </div>
</section>

@endsection