@extends('layouts.app')

@section('title','Keyword Dominan')

@section('content')

<section class="mb-12">

    <div class="inline-block bg-[#F4D7C1] text-[#7A4B15] text-xs font-bold px-4 py-2 rounded-full uppercase tracking-widest mb-6">
        Analytics Report
    </div>

    <h1 class="text-[42px] font-extrabold text-[#0A3A67] leading-tight mb-4">
        Keyword Dominan dari Caption Instagram
    </h1>

    <p class="text-lg text-gray-500 max-w-2xl leading-8">
        Analisis keyword dominan berdasarkan caption postingan Instagram terkait isu Sungai Surabaya, lingkungan, sampah, dan pencemaran.
    </p>

</section>



<section class="grid lg:grid-cols-[1.6fr_1fr] gap-8 mb-12">

    {{-- WORD CLOUD --}}
    <div class="bg-white rounded-[30px] p-8 shadow-sm border border-gray-100">

        <div class="flex justify-between items-center mb-6">

            <div>
                <h3 class="text-lg font-bold text-[#0A3A67]">
                    Visualisasi Keyword
                </h3>

                <p class="text-sm text-gray-400">
                    10 keyword paling dominan dari caption Instagram
                </p>
            </div>

        </div>


        <div class="min-h-[260px] flex flex-wrap items-center justify-center gap-4 overflow-hidden">

            @if(isset($topKeywords) && count($topKeywords) > 0)

                @php
                    $keywords = array_slice($topKeywords, 0, 10, true);

                    $maxCount = max($keywords);

                    $colors = [
                        'text-[#0A3A67]',
                        'text-green-600',
                        'text-slate-500',
                        'text-blue-600',
                        'text-emerald-700'
                    ];
                @endphp

                @foreach($keywords as $word => $count)

                    @php
                        $size = 18 + (($count / $maxCount) * 28);

                        $color = $colors[$loop->index % count($colors)];
                    @endphp

                    <span
                        class="font-extrabold uppercase leading-none {{ $color }}"
                        style="font-size: {{ $size }}px"
                    >
                        {{ $word }}
                    </span>

                @endforeach

            @else

                <p class="text-gray-400 text-center">
                    Data keyword tidak tersedia
                </p>

            @endif

        </div>


        <div class="flex gap-6 mt-8 text-sm text-gray-500 flex-wrap">

            <div class="flex items-center gap-2">
                <span class="w-3 h-3 bg-[#0A3A67] rounded-full"></span>
                Keyword Caption
            </div>

            <div class="flex items-center gap-2">
                <span class="w-3 h-3 bg-green-600 rounded-full"></span>
                Narasi Lingkungan
            </div>

        </div>

    </div>



    {{-- RIGHT PANEL --}}
    <div class="space-y-6">

        {{-- TOP KEYWORD --}}
        <div class="bg-[#0A3A67] text-white rounded-[24px] p-6">

            <div class="text-sm text-gray-300 mb-3 uppercase tracking-wider">
                Keyword Teratas
            </div>

            @if(isset($topKeywords) && count($topKeywords) > 0)

                @php
                    $topWord = array_key_first($topKeywords);

                    $topCount = reset($topKeywords);
                @endphp

                <div class="space-y-3">

                    <div class="text-[38px] font-extrabold uppercase break-words leading-none">
                        {{ $topWord }}
                    </div>

                    <div class="text-sm text-gray-300">
                        Muncul sebanyak
                        <span class="font-bold text-white">
                            {{ $topCount }}
                        </span>
                        kali pada caption.
                    </div>

                </div>

            @else

                <div class="text-gray-300">
                    Tidak ada data keyword
                </div>

            @endif

        </div>



        {{-- RANKING --}}
        <div class="bg-white rounded-[24px] p-6 shadow-sm border border-gray-100">

            <div class="flex items-center justify-between mb-5">

                <h3 class="font-bold text-[#0A3A67]">
                    Ranking Keyword
                </h3>

                {{-- BUTTON DETAIL --}}
                <a
                    href="{{ route('detail.keyword') }}"
                    class="inline-flex items-center gap-2 bg-[#0A3A67] hover:bg-[#0d4c88] text-white text-xs font-semibold px-4 py-2 rounded-full transition duration-300"
                >
                    Lihat Selengkapnya

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5l7 7-7 7" />

                    </svg>
                </a>

            </div>

            <div class="space-y-4 text-sm">

                @if(isset($topKeywords) && count($topKeywords) > 0)

                    @foreach(array_slice($topKeywords, 0, 10, true) as $word => $count)

                        <div class="flex items-center justify-between border-b border-gray-100 pb-3">

                            <div class="flex items-center gap-4">

                                <div class="w-8 h-8 rounded-full bg-[#EEF4FF] text-[#0A3A67] flex items-center justify-center font-bold text-xs">
                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </div>

                                <div>

                                    <div class="font-bold text-[#0A3A67] uppercase">
                                        {{ $word }}
                                    </div>

                                    <div class="text-xs text-gray-400">
                                        Keyword caption Instagram
                                    </div>

                                </div>

                            </div>

                            <div class="bg-[#F4F7FA] px-3 py-1 rounded-full text-xs font-bold text-[#0A3A67]">
                                {{ $count }}
                            </div>

                        </div>

                    @endforeach

                @else

                    <p class="text-gray-400">
                        Tidak ada data keyword
                    </p>

                @endif

            </div>

        </div>

    </div>

</section>



<section class="grid lg:grid-cols-2 gap-10 items-center">

    <div class="relative rounded-[28px] overflow-hidden shadow-md">

        <img
            src="{{ asset('storage/kalimas.png') }}"
            alt="Sungai Surabaya"
            class="w-full h-[360px] object-cover"
        >

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


    <div>

        <h2 class="text-[30px] font-extrabold text-[#0A3A67] mb-4">
            Membaca Isu Lingkungan dari Caption Media Sosial
        </h2>

        <p class="text-gray-500 leading-8">

            Keyword dominan diperoleh langsung dari caption postingan Instagram setelah proses filtering stopwords.
            Hasil analisis menunjukkan masyarakat banyak membahas isu sungai, sampah, pencemaran, limbah, banjir, dan lingkungan.

        </p>

    </div>

</section>

@endsection