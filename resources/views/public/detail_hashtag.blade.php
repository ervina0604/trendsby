@extends('layouts.app')

@section('title','Dataset Hashtag Lengkap')

@section('content')

<div class="space-y-8">

    <section class="mb-8">

        <div class="inline-flex items-center gap-2 bg-[#A6F18F] text-[#103A14] text-xs font-bold px-4 py-2 rounded-full uppercase tracking-[.18em] mb-5">
            <span class="w-2 h-2 rounded-full bg-[#103A14]"></span>
            Dataset Analytics
        </div>

        <h1 class="text-[42px] font-extrabold text-[#083B6E] leading-tight mb-3">
            Dataset Hashtag Lengkap
        </h1>

        <p class="text-slate-500 text-lg max-w-3xl leading-8">
            Dataset hashtag Instagram yang paling sering muncul pada postingan terkait Sungai Surabaya, pencemaran lingkungan, sampah plastik, dan edukasi masyarakat.
        </p>

    </section>



    <section class="glass-card p-5">

        <div class="flex flex-col lg:flex-row gap-4 items-center justify-between">

            <div class="relative w-full">

                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm">
                    #
                </span>

                <input
                    type="text"
                    placeholder="Cari hashtag..."
                    class="w-full h-12 rounded-full bg-slate-100 border-0 pl-12 pr-5 text-sm focus:outline-none focus:ring-2 focus:ring-[#083B6E]/20"
                >

            </div>

            <button class="flex items-center gap-3 bg-[#083B6E] text-white px-5 py-3 rounded-full text-sm font-semibold hover:bg-[#0F4C88] transition">

                Dataset Mei 2026

                <span>
                    ☰
                </span>

            </button>

        </div>

    </section>



    <section class="glass-card overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50 border-b border-slate-100">

                    <tr class="text-left text-xs uppercase tracking-[.2em] text-slate-400">

                        <th class="px-6 py-5">Rank</th>
                        <th class="px-6 py-5">Hashtag</th>
                        <th class="px-6 py-5">Jumlah</th>
                        <th class="px-6 py-5">Status</th>
                        <th class="px-6 py-5">Kategori</th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100 text-sm">

                    @if(isset($topHashtags) && count($topHashtags) > 0)

                        @foreach($topHashtags as $tag => $count)

                            <tr class="hover:bg-slate-50 transition">

                                <td class="px-6 py-5 font-semibold text-[#083B6E]">
                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </td>

                                <td class="px-6 py-5 font-bold text-[#083B6E]">
                                    #{{ $tag }}
                                </td>

                                <td class="px-6 py-5">

                                    <span class="bg-[#DDF7E3] text-[#2E9F43] px-3 py-1 rounded-full text-xs font-bold">
                                        {{ $count }}
                                    </span>

                                </td>

                                <td class="px-6 py-5">

                                    @if($loop->iteration <= 3)

                                        <span class="text-[#2E9F43] font-bold">
                                            ↗ Trending
                                        </span>

                                    @else

                                        <span class="text-slate-400 font-bold">
                                            → Stabil
                                        </span>

                                    @endif

                                </td>

                                <td class="px-6 py-5 text-slate-500">

                                    @if(str_contains($tag, 'sungai'))
                                        Sungai
                                    @elseif(str_contains($tag, 'plastik'))
                                        Plastik
                                    @elseif(str_contains($tag, 'limbah'))
                                        Limbah
                                    @elseif(str_contains($tag, 'banjir'))
                                        Banjir
                                    @else
                                        Lingkungan
                                    @endif

                                </td>

                            </tr>

                        @endforeach

                    @else

                        <tr>

                            <td colspan="5" class="px-6 py-10 text-center text-slate-400">
                                Data hashtag tidak tersedia
                            </td>

                        </tr>

                    @endif

                </tbody>

            </table>

        </div>



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

            </div>

            <button class="hover:text-[#083B6E] transition">
                Selanjutnya ›
            </button>

        </div>

    </section>



    <section class="grid md:grid-cols-3 gap-6">

        <div class="glass-card p-6">

            <div class="w-10 h-10 rounded-full bg-[#083B6E] text-white flex items-center justify-center mb-5">
                ✓
            </div>

            <h3 class="font-bold text-[#083B6E] mb-3">
                Insight Utama
            </h3>

            <p class="text-slate-500 leading-7 text-sm">
                Hashtag bertema pencemaran sungai dan sampah plastik mendominasi percakapan publik pada dataset Instagram terbaru.
            </p>

        </div>



        <div class="glass-card p-6">

            <div class="w-10 h-10 rounded-full bg-slate-200 text-slate-600 flex items-center justify-center mb-5">
                ⌘
            </div>

            <h3 class="font-bold text-[#083B6E] mb-3">
                Aktivitas Kampanye
            </h3>

            <p class="text-slate-500 leading-7 text-sm">
                Kampanye lingkungan dan edukasi sungai meningkat ketika terjadi isu banjir, limbah, dan pencemaran air.
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
                Unduh CSV / Excel
            </button>

        </div>

    </section>

</div>

@endsection