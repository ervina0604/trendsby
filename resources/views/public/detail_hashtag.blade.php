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
            Dataset hashtag Instagram yang paling sering muncul pada postingan terkait Sungai Surabaya.
        </p>
    </section>

    {{-- SEARCH --}}
    <section class="glass-card p-5">
        <form method="GET" action="{{ route('detail.hashtag') }}">
            <div class="flex flex-col lg:flex-row gap-4 items-center justify-between">
                <div class="relative w-full">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm">#</span>
                    <input
                        type="text"
                        name="search"
                        value="{{ $search ?? '' }}"
                        placeholder="Cari hashtag..."
                        class="w-full h-12 rounded-full bg-slate-100 border-0 pl-12 pr-5 text-sm focus:outline-none focus:ring-2 focus:ring-[#083B6E]/20"
                    >
                </div>
                <button type="submit"
                    class="flex items-center gap-3 bg-[#083B6E] text-white px-5 py-3 rounded-full text-sm font-semibold hover:bg-[#0F4C88] transition shrink-0">
                    Cari
                </button>
            </div>
        </form>
    </section>

    {{-- TABLE --}}
    <section class="glass-card overflow-hidden">

        <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
            <p class="text-sm text-slate-400">
                Menampilkan <span class="font-bold text-[#083B6E]">{{ count($allHashtags) }}</span>
                dari <span class="font-bold text-[#083B6E]">{{ $total }}</span> hashtag
            </p>
            <span class="text-sm text-slate-400">Halaman {{ $page }} / {{ $totalPages }}</span>
        </div>

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
                    @if(count($allHashtags) > 0)
                        @foreach($allHashtags as $tag => $count)
                            @php $rank = ($page - 1) * $perPage + $loop->iteration; @endphp
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-6 py-5 font-semibold text-[#083B6E]">
                                    {{ str_pad($rank, 2, '0', STR_PAD_LEFT) }}
                                </td>
                                <td class="px-6 py-5 font-bold text-[#083B6E]">#{{ $tag }}</td>
                                <td class="px-6 py-5">
                                    <span class="bg-[#DDF7E3] text-[#2E9F43] px-3 py-1 rounded-full text-xs font-bold">
                                        {{ $count }}
                                    </span>
                                </td>
                                <td class="px-6 py-5">
                                    @if($rank <= 3)
                                        <span class="text-[#2E9F43] font-bold">↗ Trending</span>
                                    @else
                                        <span class="text-slate-400 font-bold">→ Stabil</span>
                                    @endif
                                </td>
                                <td class="px-6 py-5 text-slate-500">
                                    @if(str_contains($tag, 'sungai'))      Sungai
                                    @elseif(str_contains($tag, 'plastik')) Plastik
                                    @elseif(str_contains($tag, 'limbah'))  Limbah
                                    @elseif(str_contains($tag, 'banjir'))  Banjir
                                    @else                                  Lingkungan
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-slate-400">
                                Tidak ada data hashtag ditemukan
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        {{-- PAGINASI --}}
        <div class="flex items-center justify-between px-6 py-5 border-t border-slate-100 text-sm text-slate-400">

            {{-- Sebelumnya --}}
            @if($page > 1)
                <a href="{{ route('detail.hashtag', ['page' => $page - 1, 'search' => $search]) }}"
                   class="flex items-center gap-2 hover:text-[#083B6E] font-semibold transition">
                    ‹ Sebelumnya
                </a>
            @else
                <span class="opacity-30 cursor-not-allowed">‹ Sebelumnya</span>
            @endif

            {{-- Nomor halaman --}}
            <div class="flex items-center gap-2">
                @for($i = 1; $i <= $totalPages; $i++)
                    @if($i == $page)
                        <span class="w-8 h-8 rounded bg-[#083B6E] text-white font-bold flex items-center justify-center text-xs">
                            {{ $i }}
                        </span>
                    @elseif(abs($i - $page) <= 2)
                        <a href="{{ route('detail.hashtag', ['page' => $i, 'search' => $search]) }}"
                           class="w-8 h-8 rounded bg-slate-100 hover:bg-slate-200 text-[#083B6E] font-bold flex items-center justify-center text-xs transition">
                            {{ $i }}
                        </a>
                    @endif
                @endfor
            </div>

            {{-- Selanjutnya --}}
            @if($page < $totalPages)
                <a href="{{ route('detail.hashtag', ['page' => $page + 1, 'search' => $search]) }}"
                   class="flex items-center gap-2 hover:text-[#083B6E] font-semibold transition">
                    Selanjutnya ›
                </a>
            @else
                <span class="opacity-30 cursor-not-allowed">Selanjutnya ›</span>
            @endif

        </div>

    </section>

    {{-- BOTTOM CARDS --}}
    <section class="grid md:grid-cols-3 gap-6">
        <div class="glass-card p-6">
            <div class="w-10 h-10 rounded-full bg-[#083B6E] text-white flex items-center justify-center mb-5">✓</div>
            <h3 class="font-bold text-[#083B6E] mb-3">Insight Utama</h3>
            <p class="text-slate-500 leading-7 text-sm">
                Hashtag bertema pencemaran sungai dan sampah plastik mendominasi percakapan publik.
            </p>
        </div>
        <div class="glass-card p-6">
            <div class="w-10 h-10 rounded-full bg-slate-200 text-slate-600 flex items-center justify-center mb-5">⌘</div>
            <h3 class="font-bold text-[#083B6E] mb-3">Aktivitas Kampanye</h3>
            <p class="text-slate-500 leading-7 text-sm">
                Kampanye lingkungan meningkat ketika terjadi isu banjir, limbah, dan pencemaran air.
            </p>
        </div>
        <div class="glass-card p-6">
            <div class="w-10 h-10 rounded-full bg-slate-600 text-white flex items-center justify-center mb-5">↓</div>
            <h3 class="font-bold text-[#083B6E] mb-3">Total Dataset</h3>
            <p class="text-slate-500 leading-7 text-sm">
                Total <span class="font-bold text-[#083B6E]">{{ $total }}</span> hashtag unik ditemukan dari seluruh postingan Instagram.
            </p>
        </div>
    </section>

</div>

@endsection