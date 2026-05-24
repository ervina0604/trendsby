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

        <div class="glass-card p-6">
            <div class="text-slate-400 text-sm mb-3">
                Total Keywords
            </div>

            <div class="text-[42px] font-extrabold text-[#083B6E] leading-none">
                1,284
            </div>

            <div class="text-[#2E9F43] text-sm font-bold mt-4">
                ↗ +12% from last month
            </div>
        </div>

        <div class="glass-card p-6">
            <div class="text-slate-400 text-sm mb-3">
                Avg. Position
            </div>

            <div class="text-[42px] font-extrabold text-[#083B6E] leading-none">
                4.2
            </div>

            <div class="text-[#2E9F43] text-sm font-bold mt-4">
                ↗ +0.8 points growth
            </div>
        </div>

        <div class="rounded-[28px] bg-[#1F6B57] text-white p-7 flex flex-col justify-between">

            <div class="text-xs uppercase tracking-[.2em] text-[#BFE3D7] font-bold mb-5">
                Top Keyword
            </div>

            <div>
                <h2 class="text-[38px] font-extrabold leading-none mb-3">
                    sampah plastik
                </h2>

                <p class="text-slate-200 leading-7">
                    This keyword currently leads engagement and ranking consistency across all major ecosystems.
                </p>
            </div>

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

        <div class="overflow-hidden rounded-2xl border border-slate-100">

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

                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-5 font-semibold text-[#083B6E]">01</td>
                        <td class="px-6 py-5 font-bold text-[#083B6E]">sampah</td>
                        <td class="px-6 py-5">
                            <span class="bg-[#DDF7E3] text-[#2E9F43] px-3 py-1 rounded-full text-xs font-bold">
                                ENVIRONMENT
                            </span>
                        </td>
                        <td class="px-6 py-5">154</td>
                        <td class="px-6 py-5 text-right text-red-400 font-bold">↘ -12%</td>
                    </tr>

                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-5 font-semibold text-[#083B6E]">02</td>
                        <td class="px-6 py-5 font-bold text-[#083B6E]">plastik</td>
                        <td class="px-6 py-5">
                            <span class="bg-[#DDF7E3] text-[#2E9F43] px-3 py-1 rounded-full text-xs font-bold">
                                ENVIRONMENT
                            </span>
                        </td>
                        <td class="px-6 py-5">120</td>
                        <td class="px-6 py-5 text-right text-slate-400 font-bold">↘ -1%</td>
                    </tr>

                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-5 font-semibold text-[#083B6E]">03</td>
                        <td class="px-6 py-5 font-bold text-[#083B6E]">pencemaran</td>
                        <td class="px-6 py-5">
                            <span class="bg-[#FFE7E7] text-[#D46A6A] px-3 py-1 rounded-full text-xs font-bold">
                                NEWS
                            </span>
                        </td>
                        <td class="px-6 py-5">98</td>
                        <td class="px-6 py-5 text-right text-slate-400 font-bold">stabil</td>
                    </tr>

                </tbody>

            </table>

        </div>

    </section>

</div>

@endsection