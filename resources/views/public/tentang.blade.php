@extends('layouts.app')

@section('title','Tentang SuraTrend')

@php
    $missions = [
        [
            'icon' => 'isu.png',
            'title' => 'Dokumentasi Isu',
            'desc' => 'Mengarsipkan setiap pergerakan isu lingkungan secara sistematis.'
        ],
        [
            'icon' => 'analisis.png',
            'title' => 'Analisis Tren',
            'desc' => 'Menemukan pola dari ribuan interaksi digital untuk strategi advokasi.'
        ],
    ];

    $methods = [
        [
            'title' => 'Frekuensi Hashtag',
            'desc' => 'Melacak penggunaan hashtag populer untuk mengukur volume percakapan publik.',
            'type' => 'progress',
            'value' => 75
        ],
        [
            'title' => 'Keyword Caption',
            'desc' => 'Mengekstrak kata kunci dominan dalam setiap caption postingan.',
            'type' => 'tags',
            'tags' => ['Limbah','Konservasi','Pencemaran']
        ],
        [
            'title' => 'Tren Waktu',
            'desc' => 'Menganalisis periode puncak aktivitas postingan.',
            'type' => 'bars'
        ],
    ];
@endphp

@section('content')

<!-- HERO -->
<section class="relative w-full h-[520px] rounded-[28px] overflow-hidden mb-16">
    <img src="{{ asset('storage/hero.png') }}"
         class="absolute inset-0 w-full h-full object-cover">

    <div class="absolute inset-0 bg-[#063A67]/90"></div>

    <div class="relative z-10 h-full flex items-center px-8">
        <div class="max-w-3xl text-white">
            <div class="uppercase text-xs tracking-[.3em] text-[#9CE38C] font-bold mb-4">
                The Living Archive
            </div>

            <h1 class="text-[48px] font-extrabold mb-4">
                Tentang SuraTrend
            </h1>

            <p class="text-lg text-slate-200 leading-8">
                Mendokumentasikan narasi digital untuk penyelamatan ekosistem Sungai Surabaya melalui analisis data media sosial.
            </p>
        </div>
    </div>
</section>


<!-- MISI -->
<section class="grid lg:grid-cols-2 gap-12 items-center mb-20">

    <!-- LEFT -->
    <div>
        <h2 class="text-[32px] font-extrabold text-[#083B6E] mb-6">
            Misi Kami
        </h2>

        <p class="text-gray-600 leading-8 mb-8">
            SuraTrend hadir sebagai jembatan antara aktivitas digital dan kesadaran lingkungan.
        </p>

        <div class="grid sm:grid-cols-2 gap-6">
            @foreach($missions as $item)
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <img src="{{ asset('storage/'.$item['icon']) }}" class="w-6 h-6 mb-3">
                    
                    <h3 class="font-bold text-[#083B6E] mb-2">
                        {{ $item['title'] }}
                    </h3>

                    <p class="text-sm text-gray-500">
                        {{ $item['desc'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- RIGHT -->
    <div class="relative flex justify-center">
        <img src="{{ asset('storage/safe.png') }}"
             class="rounded-[28px] shadow-xl w-[340px]">

        <div class="absolute bottom-[-20px] left-10 bg-[#F4D7C1] p-4 rounded-xl shadow-md text-sm">
            <div class="font-bold">Rising Awareness</div>
            <div class="text-lg font-extrabold">+24%</div>
            <div class="text-xs text-gray-600">Peningkatan keterlibatan publik</div>
        </div>
    </div>

</section>


<!-- METODOLOGI -->
<section class="text-center mb-16">

    <h2 class="text-[32px] font-extrabold text-[#083B6E] mb-12">
        Metodologi Analisis
    </h2>

    <div class="grid md:grid-cols-3 gap-10 text-left">

        @foreach($methods as $index => $item)
        <div>
            <div class="text-[60px] text-slate-200 font-black mb-2">
                {{ str_pad($index+1,2,'0',STR_PAD_LEFT) }}
            </div>

            <div class="flex items-center gap-2 mb-2">
                <h3 class="font-bold text-[#083B6E]">
                    {{ $item['title'] }}
                </h3>
            </div>

            <p class="text-gray-500 text-sm leading-7 mb-4">
                {{ $item['desc'] }}
            </p>

            {{-- TYPE RENDER --}}
            @if($item['type'] === 'progress')
                <div class="h-2 bg-gray-200 rounded-full">
                    <div class="h-full bg-green-600 rounded-full" style="width: {{ $item['value'] }}%"></div>
                </div>

            @elseif($item['type'] === 'tags')
                <div class="flex gap-2 flex-wrap">
                    @foreach($item['tags'] as $tag)
                        <span class="bg-gray-200 px-3 py-1 rounded-full text-xs">
                            {{ $tag }}
                        </span>
                    @endforeach
                </div>

            @elseif($item['type'] === 'bars')
                <div class="flex items-end gap-2 h-12">
                    <div class="w-6 h-4 bg-gray-300"></div>
                    <div class="w-6 h-6 bg-gray-400"></div>
                    <div class="w-6 h-10 bg-[#083B6E]"></div>
                    <div class="w-6 h-5 bg-gray-400"></div>
                </div>
            @endif

        </div>
        @endforeach

    </div>

</section>


<!-- CTA -->
<section class="bg-[#063A67] text-white rounded-[28px] p-10 flex flex-col md:flex-row items-center justify-between gap-6">

    <div>
        <h3 class="text-[26px] font-bold mb-2">
            Mulai Eksplorasi Data Sekarang
        </h3>
        <p class="text-slate-300">
            Dapatkan wawasan mendalam melalui dashboard interaktif kami.
        </p>
    </div>

    <a href="/dashboard" class="bg-green-500 hover:bg-green-600 px-6 py-3 rounded-full font-bold flex items-center gap-2">
        Buka Dashboard
    </a>

</section>

@endsection