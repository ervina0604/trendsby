@extends('layouts.app')

@section('title','Dataset Keyword Lengkap')

@section('content')

<div class="space-y-8">

    <!-- Header -->
    <section class="mb-8">

        <h1 class="text-[42px] font-extrabold text-[#083B6E] leading-tight mb-2">
            Ranking Keyword Dominan
        </h1>

        <p class="text-slate-500 text-lg">
            Analytics Overview
        </p>

    </section>

    <!-- Summary -->
    <section class="grid lg:grid-cols-[.7fr_.7fr_1.2fr] gap-6">

        <!-- Total Keywords -->
        <div class="glass-card p-6">
            <div class="text-slate-400 text-sm mb-3">
                Total Keywords
            </div>

            <div class="text-[42px] font-extrabold text-[#083B6E] leading-none">
                {{ count($topKeywords) }}
            </div>

            <div class="text-[#2E9F43] text-sm font-bold mt-4">
                Dataset keyword dari caption Instagram
            </div>
        </div>

        <!-- Avg Position -->
        <div class="glass-card p-6">
            <div class="text-slate-400 text-sm mb-3">
                Avg. Position
            </div>

            <div class="text-[42px] font-extrabold text-[#083B6E] leading-none">
                {{ number_format(count($topKeywords) > 0 ? array_sum($topKeywords) / count($topKeywords) : 0, 1) }}
            </div>

            <div class="text-[#2E9F43] text-sm font-bold mt-4">
                Rata-rata kemunculan keyword
            </div>
        </div>

        <!-- Top Keyword -->
        <div class="rounded-[28px] bg-[#1F6B57] text-white p-7 flex flex-col justify-between">

            <div class="text-xs uppercase tracking-[.2em] text-[#BFE3D7] font-bold mb-5">
                Top Keyword
            </div>

            @if(count($topKeywords) > 0)

                <div>

                    <h2 class="text-[38px] font-extrabold leading-none mb-3 uppercase">
                        {{ array_key_first($topKeywords) }}
                    </h2>

                    <p class="text-slate-200 leading-7">
                        Keyword ini muncul sebanyak
                        <span class="font-bold text-white">
                            {{ reset($topKeywords) }}
                        </span>
                        kali pada caption Instagram terkait Sungai Surabaya.
                    </p>

                </div>

            @else

                <div>
                    Tidak ada data keyword
                </div>

            @endif

        </div>

    </section>

    <!-- Table -->
    <section class="glass-card p-7">

        <div class="flex flex-col lg:flex-row gap-4 items-center justify-between mb-8">

            <h2 class="text-[28px] font-extrabold text-[#083B6E]">
                Keyword Performance
            </h2>

            <div class="flex items-center gap-3">

                <button class="border border-slate-200 rounded-full px-5 py-3 text-sm font-semibold text-slate-500 hover:bg-slate-50 transition">
                    Filter periode
                </button>

                <button class="bg-[#1F6B57] text-white rounded-full px-5 py-3 text-sm font-semibold hover:opacity-90 transition">
                    Export Data
                </button>

            </div>

        </div>

        <div class="overflow-hidden rounded-2xl border border-slate-100 overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50 text-slate-400 text-xs uppercase tracking-[.2em]">

                    <tr>
                        <th class="px-6 py-5 text-left">Rank</th>
                        <th class="px-6 py-5 text-left">Keyword</th>
                        <th class="px-6 py-5 text-left">Category</th>
                        <th class="px-6 py-5 text-left">Kemunculan</th>
                        <th class="px-6 py-5 text-right">Trend</th>
                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100 text-sm">

                    @forelse($topKeywords as $word => $count)

                        @php

                            $category = 'ENVIRONMENT';

                            if (
                                str_contains($word, 'sampah') ||
                                str_contains($word, 'plastik') ||
                                str_contains($word, 'limbah')
                            ) {

                                $category = 'POLLUTION';

                            } elseif (
                                str_contains($word, 'banjir') ||
                                str_contains($word, 'hujan')
                            ) {

                                $category = 'DISASTER';

                            }

                        @endphp

                        <tr class="hover:bg-slate-50 transition">

                            <!-- Rank -->
                            <td class="px-6 py-5 font-semibold text-[#083B6E]">
                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </td>

                            <!-- Keyword -->
                            <td class="px-6 py-5 font-bold text-[#083B6E] uppercase">
                                {{ $word }}
                            </td>

                            <!-- Category -->
                            <td class="px-6 py-5">

                                @if($category == 'POLLUTION')

                                    <span class="bg-[#FFE7E7] text-[#D46A6A] px-3 py-1 rounded-full text-xs font-bold">
                                        {{ $category }}
                                    </span>

                                @elseif($category == 'DISASTER')

                                    <span class="bg-[#FFF4D6] text-[#D89B00] px-3 py-1 rounded-full text-xs font-bold">
                                        {{ $category }}
                                    </span>

                                @else

                                    <span class="bg-[#DDF7E3] text-[#2E9F43] px-3 py-1 rounded-full text-xs font-bold">
                                        {{ $category }}
                                    </span>

                                @endif

                            </td>

                            <!-- Count -->
                            <td class="px-6 py-5">
                                {{ $count }}
                            </td>

                            <!-- Trend -->
                            <td class="px-6 py-5 text-right">

                                @if($loop->iteration <= 3)

                                    <span class="text-[#2E9F43] font-bold">
                                        ↗ Trending
                                    </span>

                                @elseif($count >= 10)

                                    <span class="text-blue-500 font-bold">
                                        ↗ Active
                                    </span>

                                @else

                                    <span class="text-slate-400 font-bold">
                                        Stabil
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="px-6 py-10 text-center text-slate-400">
                                Tidak ada data keyword tersedia
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </section>

</div>

@endsection