@extends('layouts.app')

@section('title','Dashboard')

@php
    $summaryCards = [
        [
            'label' => 'Hashtag Terpopuler',
            'value' => '#sungaisurabaya',
            'desc'  => '↗ Dominasi 42% Konten',
            'style' => 'border-l-4 border-[#2E9F43]',
        ],
        [
            'label' => 'Keyword Dominan',
            'value' => '"sampah"',
            'desc'  => '✱ Urgensi Lingkungan Tinggi',
            'style' => '',
        ],
    ];

    $timeline = [
        '2 Hari Lalu' => [
            ['tag' => '#surabaya', 'count' => '420 posts', 'active' => true],
            ['tag' => '#kuliner', 'count' => '315 posts', 'active' => false],
        ],
        '1 Hari Lalu' => [
            ['tag' => '#eventsurabaya', 'count' => '580 posts', 'active' => true],
            ['tag' => '#sungaisurabaya', 'count' => '510 posts', 'active' => true],
        ],
        'Hari Ini' => [
            ['tag' => '#limbahplastik', 'count' => '720 posts', 'primary' => true],
            ['tag' => '#pencemaran', 'count' => '440 posts', 'active' => true],
        ],
    ];
@endphp

@section('content')

<section class="mb-14">
    <div class="inline-flex items-center gap-2 bg-[#A6F18F] text-[#103A14] text-xs sm:text-sm font-extrabold px-4 py-2 rounded-full mb-8 uppercase tracking-[.18em]">
        <span class="w-2.5 h-2.5 rounded-full bg-[#103A14]"></span>
        Live Analytics
    </div>

    <div class="max-w-5xl">
        <h1 class="text-[40px] sm:text-[52px] xl:text-[64px] leading-[1.05] font-extrabold text-[#083B6E] mb-5">
            Tren Konten Instagram Sungai Surabaya
        </h1>

        <p class="text-lg sm:text-2xl leading-8 sm:leading-10 text-slate-600 max-w-3xl">
            Ringkasan analisis hashtag, keyword, dan tren posting dari akun Peduli Sungai Surabaya dan Ecoton.
        </p>
    </div>
</section>

<section class="grid xl:grid-cols-[1fr_1fr_1.05fr] gap-6 mb-8">

    @foreach($summaryCards as $card)
        <div class="glass-card min-h-[180px] p-7 sm:p-8 relative overflow-hidden {{ $card['style'] }}">
            <div class="text-[11px] sm:text-sm uppercase tracking-[.22em] font-black text-slate-500 mb-4">
                {{ $card['label'] }}
            </div>

            <div class="text-[34px] sm:text-[46px] xl:text-[52px] leading-none font-extrabold text-[#083B6E] mb-3 break-words">
                {{ $card['value'] }}
            </div>

            <div class="text-[#2E9F43] font-bold text-sm sm:text-base">
                {{ $card['desc'] }}
            </div>

            @if($loop->first)
                <div class="absolute right-5 bottom-[-16px] text-[120px] sm:text-[150px] font-black text-slate-100">#</div>
            @else
                <div class="absolute right-6 bottom-6 grid grid-cols-3 gap-2 opacity-10">
                    @for($i = 0; $i < 12; $i++)
                        <div class="w-4 h-4 sm:w-5 sm:h-5 bg-slate-500 rounded-sm"></div>
                    @endfor
                </div>
            @endif
        </div>
    @endforeach

    <div class="rounded-[30px] bg-[#063A67] text-white min-h-[180px] p-8 relative overflow-hidden flex flex-col justify-between">
        <div>
            <div class="text-[11px] sm:text-sm uppercase tracking-[.22em] font-black text-[#79A9D1] mb-4">
                Periode Tertinggi
            </div>

            <h2 class="text-[32px] sm:text-[38px] xl:text-[42px] leading-tight font-extrabold max-w-sm">
                Minggu ke-2 Maret 2026
            </h2>
        </div>

        <div class="text-[#9CE38C] font-bold text-sm sm:text-base">
            ▣ Puncak Kampanye Clean-up
        </div>

        <div class="absolute right-5 bottom-2 text-[100px] opacity-10">⌁</div>
    </div>

</section>

<section class="grid xl:grid-cols-[1.8fr_.9fr] gap-6 mb-12 items-stretch">

    <div class="glass-card p-5 sm:p-7 min-h-[640px] flex flex-col">

        <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-5 mb-8">
            <div class="flex flex-wrap gap-3">
                <button class="bg-[#063A67] text-white px-6 py-3 rounded-full font-bold shadow-md text-sm sm:text-base">Timeline</button>
                <button class="text-[#083B6E] px-4 py-3 font-bold text-sm sm:text-base">Tag Cloud</button>
                <button class="text-[#083B6E] px-4 py-3 font-bold text-sm sm:text-base">Ranking Table</button>
            </div>

            <div class="bg-slate-100 rounded-full p-1 flex w-fit">
                <button class="bg-white px-5 py-2 rounded-full font-bold text-sm shadow">Mingguan</button>
                <button class="px-5 py-2 rounded-full text-sm font-bold text-slate-500">Bulanan</button>
            </div>
        </div>

        <div class="bg-slate-50 rounded-[28px] h-[300px] sm:h-[340px] px-5 sm:px-8 pb-6 flex items-end gap-2 sm:gap-3 relative overflow-hidden mb-8">
            <div class="bg-[#A6EA9D] h-[30%] w-full rounded-t-[24px]"></div>
            <div class="bg-[#A6EA9D] h-[52%] w-full rounded-t-[24px]"></div>
            <div class="bg-[#A6EA9D] h-[42%] w-full rounded-t-[24px]"></div>
            <div class="bg-[#0B5B94] h-[70%] w-full rounded-t-[24px]"></div>
            <div class="bg-[#A6EA9D] h-[48%] w-full rounded-t-[24px]"></div>
            <div class="bg-[#A6EA9D] h-[58%] w-full rounded-t-[24px]"></div>
            <div class="bg-[#A6EA9D] h-[72%] w-full rounded-t-[24px]"></div>

            <div class="absolute inset-0 flex items-center justify-center text-[#5F8AAE] text-lg sm:text-3xl font-extrabold opacity-70 pointer-events-none text-center px-4">
                POST TREND ANALYSIS
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-5 mt-auto">
            @foreach($timeline as $period => $items)
                <div>
                    <div class="text-xs uppercase tracking-[.22em] mb-3 font-black {{ $period === 'Hari Ini' ? 'text-[#2E9F43]' : 'text-slate-400' }}">
                        {{ $period }}
                    </div>

                    <div class="space-y-3">
                        @foreach($items as $item)
                            <div class="rounded-2xl p-4 transition hover:-translate-y-1 hover:shadow-md {{ !empty($item['primary']) ? 'bg-[#063A67] text-white' : 'bg-white border border-slate-200 text-[#083B6E]' }} {{ !empty($item['active']) ? 'border-l-4 border-[#2E9F43]' : '' }}">
                                <div class="font-extrabold text-sm sm:text-base break-words">{{ $item['tag'] }}</div>
                                <div class="text-sm mt-1 {{ !empty($item['primary']) ? 'text-slate-300' : 'text-slate-400' }}">
                                    {{ $item['count'] }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <div class="glass-card min-h-[640px] p-7 sm:p-8 flex flex-col justify-center">
        <h2 class="text-[30px] sm:text-[38px] font-extrabold text-[#083B6E] mb-10 leading-tight">
            Visual Keyword Cloud
        </h2>

        <div class="flex flex-col gap-7 items-center text-center">
            <div class="text-[36px] sm:text-[54px] font-extrabold text-[#083B6E] leading-none break-words">
                #sungaisurabaya
            </div>

            <div class="flex flex-wrap justify-center gap-3 sm:gap-5 items-end">
                <span class="bg-[#D8F4D1] text-[#2E7D32] px-4 py-2 rounded-full text-lg sm:text-2xl font-bold">sampah</span>
                <span class="text-[#8B4E0E] text-2xl sm:text-4xl font-extrabold">limbah</span>
            </div>

            <div class="flex flex-wrap justify-center gap-3 sm:gap-5 text-slate-500 font-semibold items-end">
                <span class="text-lg sm:text-3xl">pencemaran</span>
                <span class="text-[#083B6E] text-2xl sm:text-4xl font-extrabold">plastik</span>
                <span class="text-red-500 text-lg sm:text-2xl">banjir</span>
            </div>

            <div class="flex flex-wrap justify-center gap-3 sm:gap-5 items-end">
                <span class="text-[#2E7D32] text-2xl sm:text-4xl font-extrabold">Ecoton</span>
                <span class="text-[#0B5B94] text-xl sm:text-3xl font-extrabold">mikroplastik</span>
                <span class="text-slate-400 text-base sm:text-2xl">air bersih</span>
            </div>
        </div>
    </div>

</section>

<section class="grid xl:grid-cols-[1.15fr_.95fr] gap-8 items-center">

    <div class="relative min-h-[320px] rounded-[34px] overflow-hidden">
        <img src="{{ asset('storage/visual.png') }}" alt="visual report" class="absolute inset-0 w-full h-full object-cover object-center pointer-events-none">

        <div class="absolute inset-0 bg-gradient-to-r from-[#063A67]/95 via-[#063A67]/70 to-[#063A67]/20 pointer-events-none"></div>

        <div class="absolute left-6 sm:left-8 bottom-6 sm:bottom-8 z-10 max-w-[520px] text-white pr-6">
            <div class="inline-flex bg-[#7A4B15] px-4 py-2 rounded-full text-xs sm:text-sm uppercase tracking-[.22em] font-black mb-5">
                Laporan Terkini
            </div>

            <h2 class="text-[30px] sm:text-[42px] leading-tight font-extrabold">
                Analisis Visual Dampak Pencemaran terhadap Volume Konten Edukasi.
            </h2>
        </div>
    </div>

    <div class="space-y-6">
        <div class="text-[#2E7D32] uppercase tracking-[.35em] text-xs sm:text-sm font-black">
            Data Insight
        </div>

        <h2 class="text-[32px] sm:text-[46px] leading-tight font-extrabold text-[#083B6E] max-w-xl">
            Kampanye digital meningkat 3x lipat selama periode banjir di hulu sungai.
        </h2>

        <div class="bg-slate-100 rounded-[28px] p-6 sm:p-8 border-l-4 border-[#083B6E] text-slate-600 text-lg sm:text-2xl leading-8 sm:leading-10 shadow-sm">
            “Pola keyword 'plastik' dan 'limbah' memiliki korelasi 89% dengan laporan publik di akun Peduli Sungai Surabaya.”
        </div>
    </div>

</section>

@endsection
