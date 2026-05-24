@extends('layouts.app')

@section('title', 'Dashboard')

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
            Dashboard analisis hashtag, keyword, engagement, dan insight lingkungan dari postingan Instagram terkait isu Sungai Surabaya.
        </p>

    </div>

</section>



{{-- SUMMARY CARD --}}
<section class="grid xl:grid-cols-4 gap-6 mb-10">

    {{-- TOTAL POST --}}
    <div class="glass-card min-h-[180px] p-7 sm:p-8 relative overflow-hidden">

        <div class="text-[11px] sm:text-sm uppercase tracking-[.22em] font-black text-slate-500 mb-4">
            Total Postingan
        </div>

        <div class="text-[42px] sm:text-[52px] font-extrabold text-[#083B6E]">

            {{ $totalPosts ?? 0 }}

        </div>

        <div class="text-[#2E9F43] font-bold text-sm mt-3">
            Dataset Instagram Aktif
        </div>

    </div>



    {{-- HASHTAG --}}
    <div class="glass-card min-h-[180px] p-7 sm:p-8 relative overflow-hidden border-l-4 border-[#2E9F43]">

        <div class="text-[11px] sm:text-sm uppercase tracking-[.22em] font-black text-slate-500 mb-4">
            Hashtag Terpopuler
        </div>

        <div class="text-[28px] sm:text-[42px] leading-none font-extrabold text-[#083B6E] break-words">

            #{{ $popularHashtag ?? 'sungaisurabaya' }}

        </div>

        <div class="text-[#2E9F43] font-bold text-sm mt-3">
            Dominasi Konten Tertinggi
        </div>

        <div class="absolute right-5 bottom-[-16px] text-[120px] font-black text-slate-100">
            #
        </div>

    </div>



    {{-- KEYWORD --}}
    <div class="glass-card min-h-[180px] p-7 sm:p-8 relative overflow-hidden">

        <div class="text-[11px] sm:text-sm uppercase tracking-[.22em] font-black text-slate-500 mb-4">
            Keyword Dominan
        </div>

        <div class="text-[28px] sm:text-[42px] leading-none font-extrabold text-[#083B6E] break-words">

            "{{ $dominantKeyword ?? 'sampah' }}"

        </div>

        <div class="text-[#2E9F43] font-bold text-sm mt-3">
            Topik Lingkungan Populer
        </div>

    </div>



    {{-- ENGAGEMENT --}}
    <div class="rounded-[30px] bg-[#063A67] text-white min-h-[180px] p-8 relative overflow-hidden flex flex-col justify-between">

        <div>

            <div class="text-[11px] sm:text-sm uppercase tracking-[.22em] font-black text-[#79A9D1] mb-4">
                Total Engagement
            </div>

            <h2 class="text-[28px] sm:text-[38px] leading-tight font-extrabold max-w-sm">

                {{ number_format(($totalLikes ?? 0) + ($totalComments ?? 0)) }}

            </h2>

        </div>

        <div class="text-[#9CE38C] font-bold text-sm sm:text-base">
            ▣ Like & Komentar
        </div>

        <div class="absolute right-5 bottom-2 text-[100px] opacity-10">
            ⌁
        </div>

    </div>

</section>



{{-- HASHTAG ANALYSIS --}}
<section class="grid xl:grid-cols-[1.8fr_.9fr] gap-6 mb-12 items-stretch">

    {{-- TRENDING HASHTAG --}}
    <div class="glass-card p-5 sm:p-7 min-h-[640px] flex flex-col">

        <div class="mb-8">

            <h2 class="text-[30px] font-extrabold text-[#083B6E]">
                Trending Hashtag
            </h2>

            <p class="text-slate-500 mt-2">
                Analisis hashtag dominan dari postingan Instagram.
            </p>

        </div>



        {{-- BAR VISUAL --}}
        <div class="bg-slate-50 rounded-[28px] h-[320px] px-5 sm:px-8 pb-6 flex items-end gap-3 relative overflow-hidden mb-8">

            @if(isset($topHashtags) && count($topHashtags) > 0)

                @foreach(array_slice($topHashtags, 0, 7) as $tag => $count)

                    @php
                        $maxValue = max($topHashtags);
                        $height = ($count / $maxValue) * 100;
                    @endphp

                    <div
                        class="bg-[#0B5B94] w-full rounded-t-[24px]"
                        style="height: {{ $height }}%"
                    ></div>

                @endforeach

            @endif

            <div class="absolute inset-0 flex items-center justify-center text-[#5F8AAE] text-2xl font-extrabold opacity-20 pointer-events-none">
                HASHTAG ANALYSIS
            </div>

        </div>



        {{-- LIST HASHTAG --}}
        <div class="grid md:grid-cols-2 gap-5 mt-auto">

            @if(isset($topHashtags))

                @foreach($topHashtags as $tag => $count)

                    <div class="rounded-2xl p-4 bg-white border border-slate-200 text-[#083B6E] hover:shadow-md transition">

                        <div class="font-extrabold text-base break-words">
                            #{{ $tag }}
                        </div>

                        <div class="text-sm mt-1 text-slate-400">
                            {{ $count }} posts
                        </div>

                    </div>

                @endforeach

            @endif

        </div>

    </div>



    {{-- KEYWORD --}}
    <div class="glass-card min-h-[640px] p-7 sm:p-8 flex flex-col justify-center">

        <h2 class="text-[30px] sm:text-[38px] font-extrabold text-[#083B6E] mb-10 leading-tight">
            Dominant Keywords
        </h2>

        <div class="flex flex-wrap gap-4 justify-center">

            @if(isset($topKeywords))

                @foreach($topKeywords as $word => $count)

                    <span class="bg-[#D8F4D1] text-[#2E7D32] px-5 py-3 rounded-full text-lg font-bold shadow-sm">

                        {{ $word }}

                    </span>

                @endforeach

            @endif

        </div>

    </div>

</section>



{{-- INSIGHT --}}
<section class="grid xl:grid-cols-[1.15fr_.95fr] gap-8 items-center">

    {{-- IMAGE --}}
    <div class="relative min-h-[420px] rounded-[34px] overflow-hidden">

        @if(isset($posts[0]['displayUrl']))

            <img
                src="{{ $posts[0]['displayUrl'] }}"
                alt="Instagram Post"
                class="absolute inset-0 w-full h-full object-cover object-center"
            >

        @else

            <img
                src="{{ asset('storage/visual.png') }}"
                alt="Visual"
                class="absolute inset-0 w-full h-full object-cover object-center"
            >

        @endif

        <div class="absolute inset-0 bg-gradient-to-r from-[#063A67]/95 via-[#063A67]/70 to-[#063A67]/20"></div>

        <div class="absolute left-6 sm:left-8 bottom-6 sm:bottom-8 z-10 max-w-[520px] text-white pr-6">

            <div class="inline-flex bg-[#7A4B15] px-4 py-2 rounded-full text-xs sm:text-sm uppercase tracking-[.22em] font-black mb-5">
                AI Insight
            </div>

            <h2 class="text-[24px] sm:text-[36px] leading-tight font-extrabold">

                Analisis otomatis percakapan publik terkait pencemaran Sungai Surabaya.

            </h2>

        </div>

    </div>



    {{-- INSIGHT TEXT --}}
    <div class="space-y-6">

        <div class="text-[#2E7D32] uppercase tracking-[.35em] text-xs sm:text-sm font-black">
            DSS Insight
        </div>

        <h2 class="text-[32px] sm:text-[46px] leading-tight font-extrabold text-[#083B6E] max-w-xl">

            {{ $insight ?? 'Belum ada insight tersedia.' }}

        </h2>

        <div class="bg-slate-100 rounded-[28px] p-6 sm:p-8 border-l-4 border-[#083B6E] text-slate-600 text-lg sm:text-2xl leading-8 sm:leading-10 shadow-sm">

            “Sistem mendeteksi dominasi percakapan mengenai pencemaran, limbah plastik, dan sampah sungai berdasarkan caption Instagram.”

        </div>

    </div>

</section>

@endsection