@extends('layouts.app')

@section('title','Hashtag Populer')

@section('content')

<div class="space-y-8">

    <section class="grid lg:grid-cols-[1.4fr_.5fr] gap-6 items-start">

        <div>

            <div class="inline-flex items-center gap-2 bg-[#A6F18F] text-[#103A14] text-xs font-bold px-4 py-2 rounded-full uppercase tracking-[.18em] mb-6">
                <span class="w-2 h-2 rounded-full bg-[#103A14]"></span>
                Data Unggulan
            </div>

            <h1 class="text-[42px] font-extrabold text-[#083B6E] leading-tight mb-4">
                Hashtag Populer
            </h1>

            <p class="text-slate-500 text-lg leading-8 max-w-3xl">
                Analisis hashtag terkait isu Sungai Surabaya berdasarkan dataset postingan Instagram.
            </p>

        </div>

        <div class="glass-card p-6 h-[140px] flex flex-col justify-center items-end">

            <div class="text-xs uppercase tracking-[.2em] text-slate-400 font-bold mb-3">
                Total Hashtag
            </div>

            <div class="text-[48px] font-extrabold text-[#083B6E] leading-none">
                {{ isset($topHashtags) ? count($topHashtags) : 0 }}
            </div>

        </div>

    </section>


    <section class="grid lg:grid-cols-[1.4fr_.65fr] gap-6">

        <div class="glass-card p-7">

            <div class="flex items-center justify-between mb-8">

                <h2 class="font-bold text-[#083B6E] text-lg">
                    Visualisasi Hashtag
                </h2>

                <span class="text-slate-400 text-sm">
                    ⓘ
                </span>

            </div>

            <div class="h-[220px] flex flex-wrap items-center justify-center gap-4 text-center overflow-hidden">

                @if(isset($topHashtags) && count($topHashtags) > 0)

                    @php
                        $maxCount = max($topHashtags);
                    @endphp

                    @foreach(array_slice($topHashtags, 0, 10, true) as $tag => $count)

                        @php
                            $size = 16 + (($count / $maxCount) * 18);
                        @endphp

                        <span
                            class="font-extrabold text-[#083B6E]"
                            style="font-size: {{ $size }}px"
                        >
                            #{{ $tag }}
                        </span>

                    @endforeach

                @else

                    <p class="text-slate-400">
                        Data hashtag tidak tersedia
                    </p>

                @endif

            </div>

        </div>


        <div class="rounded-[28px] bg-[#063A67] text-white p-7 flex flex-col justify-between h-[220px]">

            <div>

                <div class="uppercase tracking-[.2em] text-xs font-bold text-[#8FB9DB] mb-5">
                    Insight
                </div>

                <p class="leading-7 text-slate-200 text-sm">
                    Hashtag populer didominasi isu pencemaran sungai, sampah plastik, kampanye bersih sungai, dan edukasi lingkungan masyarakat Surabaya.
                </p>

            </div>

            <button class="bg-[#0B5B94] px-5 py-3 rounded-full text-sm font-bold w-fit">
                ↗ Tren Aktif
            </button>

        </div>

    </section>


    <section class="glass-card p-7">

        <div class="mb-6">

            <h2 class="text-[28px] font-extrabold text-[#083B6E]">
                Ranking Hashtag
            </h2>

            <p class="text-slate-400 text-sm mt-2">
                Berdasarkan jumlah kemunculan pada dataset Instagram
            </p>

        </div>


        <div class="overflow-hidden rounded-2xl border border-slate-100">

            <table class="w-full">

                <thead class="bg-slate-50 text-slate-400 text-xs uppercase tracking-[.2em]">

                    <tr>
                        <th class="px-6 py-5 text-left">Rank</th>
                        <th class="px-6 py-5 text-left">Hashtag</th>
                        <th class="px-6 py-5 text-right">Jumlah</th>
                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100 text-sm">

                    @if(isset($topHashtags) && count($topHashtags) > 0)

                        @foreach(array_slice($topHashtags, 0, 10, true) as $tag => $count)

                            <tr class="hover:bg-slate-50 transition">

                                <td class="px-6 py-5">

                                    <div class="w-7 h-7 rounded-full bg-[#083B6E] text-white text-xs font-bold flex items-center justify-center">
                                        {{ $loop->iteration }}
                                    </div>

                                </td>

                                <td class="px-6 py-5 font-bold text-[#083B6E]">
                                    #{{ $tag }}
                                </td>

                                <td class="px-6 py-5 text-right font-extrabold text-[#083B6E]">
                                    {{ $count }}
                                </td>

                            </tr>

                        @endforeach

                    @else

                        <tr>

                            <td colspan="3" class="px-6 py-10 text-center text-slate-400">
                                Tidak ada data hashtag
                            </td>

                        </tr>

                    @endif

                </tbody>

            </table>

        </div>


        <div class="mt-6">

            <a
                href="{{ route('detail.hashtag') }}"
                class="w-full block text-center border border-slate-200 rounded-full py-3 text-sm font-semibold text-slate-500 hover:bg-slate-50 transition"
            >
                Lihat Dataset Lengkap
            </a>

        </div>

    </section>


    <section class="grid md:grid-cols-2 gap-6">

        <div class="glass-card p-7">

            <div class="text-[#2E9F43] text-2xl mb-4">
                ⊕
            </div>

            <h3 class="font-bold text-[#083B6E] text-lg mb-3">
                Insight Lingkungan
            </h3>

            <p class="text-slate-500 leading-7">
                Percakapan publik paling banyak membahas pencemaran, sampah sungai, limbah plastik, dan aksi bersih lingkungan.
            </p>

        </div>


        <div class="glass-card p-7">

            <div class="text-[#2E9F43] text-2xl mb-4">
                ↗
            </div>

            <h3 class="font-bold text-[#083B6E] text-lg mb-3">
                Aktivitas Kampanye
            </h3>

            <p class="text-slate-500 leading-7">
                Hashtag bertema lingkungan meningkat ketika terjadi isu banjir, pencemaran air, dan edukasi sungai.
            </p>

        </div>

    </section>

</div>

@endsection