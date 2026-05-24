@extends('layouts.app')

@section('title','Dataset Hashtag Lengkap')

@section('content')

<div class="space-y-8">

    <!-- Header -->
    <section class="mb-8">

        <h1 class="text-[42px] font-extrabold text-[#083B6E] leading-tight mb-3">
            Dataset Hashtag Lengkap
        </h1>

        <p class="text-slate-500 text-lg">
            Data frekuensi hashtag terkait Sungai Surabaya
        </p>

    </section>

    <!-- Search & Filter -->
    <section class="glass-card p-5">

        <div class="flex flex-col lg:flex-row gap-4 items-center justify-between">

            <!-- Search -->
            <div class="relative w-full">

                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm">
                    #
                </span>

                <input
                    type="text"
                    placeholder="Cari hashtag spesifik..."
                    class="w-full h-12 rounded-full bg-slate-100 border-0 pl-12 pr-5 text-sm focus:outline-none focus:ring-2 focus:ring-[#083B6E]/20"
                >

            </div>

            <!-- Filter -->
            <button class="flex items-center gap-3 bg-[#083B6E] text-white px-5 py-3 rounded-full text-sm font-semibold hover:bg-[#0F4C88] transition">

                Pilih Periode

                <span>
                    ☰
                </span>

            </button>

        </div>

    </section>

    <!-- Table -->
    <section class="glass-card overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50 border-b border-slate-100">

                    <tr class="text-left text-xs uppercase tracking-[.2em] text-slate-400">

                        <th class="px-6 py-5">Rank</th>
                        <th class="px-6 py-5">Hashtag</th>
                        <th class="px-6 py-5">Jumlah</th>
                        <th class="px-6 py-5">Trend</th>
                        <th class="px-6 py-5">Periode</th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100 text-sm">

                    <!-- Row -->
                    <tr class="hover:bg-slate-50 transition">

                        <td class="px-6 py-5 font-semibold text-[#083B6E]">
                            01
                        </td>

                        <td class="px-6 py-5 font-bold text-[#083B6E]">
                            #sungaisurabaya
                        </td>

                        <td class="px-6 py-5">
                            <span class="bg-[#DDF7E3] text-[#2E9F43] px-3 py-1 rounded-full text-xs font-bold">
                                50
                            </span>
                        </td>

                        <td class="px-6 py-5 text-[#2E9F43] font-bold">
                            ↗ 12%
                        </td>

                        <td class="px-6 py-5 text-slate-500">
                            Mei
                        </td>

                    </tr>

                    <tr class="hover:bg-slate-50 transition">

                        <td class="px-6 py-5 font-semibold text-[#083B6E]">
                            02
                        </td>

                        <td class="px-6 py-5 font-bold text-[#083B6E]">
                            #pedulisungai
                        </td>

                        <td class="px-6 py-5">
                            <span class="bg-[#DDF7E3] text-[#2E9F43] px-3 py-1 rounded-full text-xs font-bold">
                                25
                            </span>
                        </td>

                        <td class="px-6 py-5 text-slate-400 font-bold">
                            → stabil
                        </td>

                        <td class="px-6 py-5 text-slate-500">
                            Mei
                        </td>

                    </tr>

                    <tr class="hover:bg-slate-50 transition">

                        <td class="px-6 py-5 font-semibold text-[#083B6E]">
                            03
                        </td>

                        <td class="px-6 py-5 font-bold text-[#083B6E]">
                            #ecoton
                        </td>

                        <td class="px-6 py-5">
                            <span class="bg-[#DDF7E3] text-[#2E9F43] px-3 py-1 rounded-full text-xs font-bold">
                                19
                            </span>
                        </td>

                        <td class="px-6 py-5 text-[#2E9F43] font-bold">
                            ↗ 4%
                        </td>

                        <td class="px-6 py-5 text-slate-500">
                            Mei
                        </td>

                    </tr>

                    <tr class="hover:bg-slate-50 transition">

                        <td class="px-6 py-5 font-semibold text-[#083B6E]">
                            04
                        </td>

                        <td class="px-6 py-5 font-bold text-[#083B6E]">
                            #pencemaran
                        </td>

                        <td class="px-6 py-5">
                            <span class="bg-[#DDF7E3] text-[#2E9F43] px-3 py-1 rounded-full text-xs font-bold">
                                18
                            </span>
                        </td>

                        <td class="px-6 py-5 text-red-400 font-bold">
                            ↘ 2%
                        </td>

                        <td class="px-6 py-5 text-slate-500">
                            Mei
                        </td>

                    </tr>

                    <tr class="hover:bg-slate-50 transition">

                        <td class="px-6 py-5 font-semibold text-[#083B6E]">
                            05
                        </td>

                        <td class="px-6 py-5 font-bold text-[#083B6E]">
                            #plastik
                        </td>

                        <td class="px-6 py-5">
                            <span class="bg-[#DDF7E3] text-[#2E9F43] px-3 py-1 rounded-full text-xs font-bold">
                                25
                            </span>
                        </td>

                        <td class="px-6 py-5 text-red-400 font-bold">
                            ↘ 2%
                        </td>

                        <td class="px-6 py-5 text-slate-500">
                            Juni
                        </td>

                    </tr>

                    <tr class="hover:bg-slate-50 transition">

                        <td class="px-6 py-5 font-semibold text-[#083B6E]">
                            06
                        </td>

                        <td class="px-6 py-5 font-bold text-[#083B6E]">
                            #aksibersih
                        </td>

                        <td class="px-6 py-5">
                            <span class="bg-[#DDF7E3] text-[#2E9F43] px-3 py-1 rounded-full text-xs font-bold">
                                20
                            </span>
                        </td>

                        <td class="px-6 py-5 text-[#2E9F43] font-bold">
                            ↗ 5%
                        </td>

                        <td class="px-6 py-5 text-slate-500">
                            Mei
                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between px-6 py-5 border-t border-slate-100 text-sm text-slate-400">

            <button class="hover:text-[#083B6E] transition">
                ‹ Sebelumnya
            </button>

            <div class="flex items-center gap-3">

                <button class="w-8 h-8 rounded bg-slate-100 text-[#083B6E] font-bold">
                    1
                </button>

                <button>2</button>
                <button>3</button>
                <button>4</button>
                <button>5</button>

            </div>

            <button class="hover:text-[#083B6E] transition">
                Selanjutnya ›
            </button>

        </div>

    </section>

    <!-- Bottom Cards -->
    <section class="grid md:grid-cols-3 gap-6">

        <!-- Card -->
        <div class="glass-card p-6">

            <div class="w-10 h-10 rounded-full bg-[#083B6E] text-white flex items-center justify-center mb-5">
                ✓
            </div>

            <h3 class="font-bold text-[#083B6E] mb-3">
                Insight Utama
            </h3>

            <p class="text-slate-500 leading-7 text-sm">
                Peningkatan hashtag #sungaisurabaya berkorelasi langsung dengan pemberitaan sungai minggu lalu.
            </p>

        </div>

        <div class="glass-card p-6">

            <div class="w-10 h-10 rounded-full bg-slate-200 text-slate-600 flex items-center justify-center mb-5">
                ⌘
            </div>

            <h3 class="font-bold text-[#083B6E] mb-3">
                Aktivitas Komunitas
            </h3>

            <p class="text-slate-500 leading-7 text-sm">
                Lebih dari 2.600 user aktif menggunakan hashtag terkait lingkungan di wilayah Surabaya Timur.
            </p>

        </div>

        <div class="glass-card p-6">

            <div class="w-10 h-10 rounded-full bg-slate-600 text-white flex items-center justify-center mb-5">
                ↓
            </div>

            <h3 class="font-bold text-[#083B6E] mb-3">
                Ekspor Dataset
            </h3>

            <button class="mt-4 w-full bg-slate-100 hover:bg-slate-200 transition rounded-full py-3 text-sm font-semibold text-[#083B6E]">
                Unduh CSV/Excel
            </button>

        </div>

    </section>

</div>

@endsection