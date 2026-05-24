@extends('layouts.app')

@section('title','Hashtag Populer')

@section('content')

<div class="space-y-8">

    <!-- Header -->
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
                Analisis frekuensi tag terkait Sungai Surabaya berdasarkan pemantauan media sosial dan komunikasi publik.
            </p>
        </div>

        <!-- Total Mention -->
        <div class="glass-card p-6 min-h-[140px] flex flex-col justify-center items-end">
            <div class="text-xs uppercase tracking-[.2em] text-slate-400 font-bold mb-3">
                Total Mentions
            </div>

            <div class="text-[48px] font-extrabold text-[#083B6E] leading-none">
                1,284
            </div>
        </div>

    </section>

    <!-- Content -->
    <section class="grid lg:grid-cols-[1.4fr_.65fr] gap-6">

        <!-- Word Cloud -->
        <div class="glass-card p-7">

            <div class="flex items-center justify-between mb-8">
                <h2 class="font-bold text-[#083B6E] text-lg">
                    Visualisasi Awan Kata
                </h2>

                <span class="text-slate-400 text-sm">ⓘ</span>
            </div>

            <div class="min-h-[280px] flex flex-col items-center justify-center text-center space-y-6">

                <div class="text-[56px] font-extrabold text-[#083B6E]">
                    #sungaisurabaya
                </div>

                <div class="flex flex-wrap justify-center gap-4 text-[18px] font-bold">

                    <span class="text-[#2E9F43]">
                        #pedulisungai
                    </span>

                    <span class="text-[#0B5B94]">
                        #ecoton
                    </span>

                    <span class="text-[#A16207]">
                        #pencemaran
                    </span>

                </div>

                <div class="flex flex-wrap justify-center gap-4 text-[20px] font-extrabold">

                    <span class="text-[#2E9F43]">
                        #plastik
                    </span>

                    <span class="text-[#083B6E]">
                        #aksibersih
                    </span>

                    <span class="text-slate-400 text-sm">
                        #surabayasehat
                    </span>

                </div>

                <div class="flex flex-wrap justify-center gap-4 items-end">

                    <span class="text-slate-300 text-sm">
                        #kurangiplastik
                    </span>

                    <span class="text-[#7AD66A] text-[34px] font-extrabold">
                        #sungailestari
                    </span>

                </div>

            </div>

        </div>

        <!-- Highlight -->
        <div class="rounded-[28px] bg-[#063A67] text-white p-7 flex flex-col justify-between min-h-[280px]">

            <div>
                <div class="uppercase tracking-[.2em] text-xs font-bold text-[#8FB9DB] mb-5">
                    Sorotan Mingguan
                </div>

                <p class="leading-8 text-slate-200">
                    Tagar #sungaisurabaya mengalami peningkatan sebesar 18% dalam 7 hari terakhir didorong oleh kampanye pemerhati lingkungan.
                </p>
            </div>

            <button class="bg-[#0B5B94] hover:bg-[#0F6CAD] transition px-5 py-3 rounded-full text-sm font-bold w-fit">
                ↗ Trend Meningkat
            </button>

        </div>

    </section>

    <!-- Ranking -->
    <section class="glass-card p-7">

        <div class="mb-6">
            <h2 class="text-[28px] font-extrabold text-[#083B6E]">
                Tabel Ranking Hashtag
            </h2>

            <p class="text-slate-400 text-sm mt-2">
                Data populer per tanggal 24 Mei 2026
            </p>
        </div>

        <div class="overflow-hidden rounded-2xl border border-slate-100">

            <table class="w-full">

                <thead class="bg-slate-50 text-slate-400 text-xs uppercase tracking-[.2em]">
                    <tr>
                        <th class="px-6 py-5 text-left">Rank</th>
                        <th class="px-6 py-5 text-left">Hashtag</th>
                        <th class="px-6 py-5 text-left">Trend</th>
                        <th class="px-6 py-5 text-right">Jumlah Kemunculan</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100 text-sm">

                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-5">
                            <div class="w-7 h-7 rounded-full bg-[#083B6E] text-white text-xs font-bold flex items-center justify-center">
                                1
                            </div>
                        </td>

                        <td class="px-6 py-5 font-bold text-[#083B6E]">
                            #sungaisurabaya
                        </td>

                        <td class="px-6 py-5 text-[#2E9F43] font-bold">
                            ↗ +12%
                        </td>

                        <td class="px-6 py-5 text-right font-extrabold text-[#083B6E]">
                            38
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-5">
                            <div class="w-7 h-7 rounded-full bg-[#2E9F43] text-white text-xs font-bold flex items-center justify-center">
                                2
                            </div>
                        </td>

                        <td class="px-6 py-5 font-bold text-[#083B6E]">
                            #pedulisungai
                        </td>

                        <td class="px-6 py-5 text-slate-400 font-bold">
                            → Stabil
                        </td>

                        <td class="px-6 py-5 text-right font-extrabold text-[#083B6E]">
                            25
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-5">
                            <div class="w-7 h-7 rounded-full bg-[#65A765] text-white text-xs font-bold flex items-center justify-center">
                                3
                            </div>
                        </td>

                        <td class="px-6 py-5 font-bold text-[#083B6E]">
                            #ecoton
                        </td>

                        <td class="px-6 py-5 text-[#2E9F43] font-bold">
                            ↗ +4%
                        </td>

                        <td class="px-6 py-5 text-right font-extrabold text-[#083B6E]">
                            20
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-5">
                            <div class="w-7 h-7 rounded-full bg-slate-200 text-slate-500 text-xs font-bold flex items-center justify-center">
                                4
                            </div>
                        </td>

                        <td class="px-6 py-5 font-bold text-[#083B6E]">
                            #plastik
                        </td>

                        <td class="px-6 py-5 text-red-400 font-bold">
                            ↘ -2%
                        </td>

                        <td class="px-6 py-5 text-right font-extrabold text-[#083B6E]">
                            18
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

        <div class="mt-6">
            <a href="{{ route('detail.hashtag') }}"
            class="w-full block text-center border border-slate-200 rounded-full py-3 text-sm font-semibold text-slate-500 hover:bg-slate-50 transition">
            Lihat Dataset Lengkap
            </a>
        </div>

    </section>

    <!-- Bottom Cards -->
    <section class="grid md:grid-cols-2 gap-6">

        <div class="glass-card p-7">
            <div class="text-[#2E9F43] text-2xl mb-4">
                ⊕
            </div>

            <h3 class="font-bold text-[#083B6E] text-lg mb-3">
                Analisis Sentimen
            </h3>

            <p class="text-slate-500 leading-7">
                Tagar yang paling sering muncul berkorelasi erat dengan isu pencemaran sungai lokal.
            </p>
        </div>

        <div class="glass-card p-7">
            <div class="text-[#2E9F43] text-2xl mb-4">
                ↗
            </div>

            <h3 class="font-bold text-[#083B6E] text-lg mb-3">
                Jangkauan Publik
            </h3>

            <p class="text-slate-500 leading-7">
                Distribusi mention mencapai lebih dari 58.000 impresi melalui kolaborasi komunitas lokal.
            </p>
        </div>

    </section>

</div>

@endsection