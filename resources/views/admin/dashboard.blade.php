@extends('layouts.admin')

@section('title','Dashboard Admin')

@section('content')

<section class="mb-8">
    <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-5">
        <div>
            <div class="text-[18px] uppercase tracking-[.16em] font-extrabold text-[#2E7D32] mb-4">
                MARCH 2026 OVERVIEW
            </div>

            <h2 class="text-[64px] leading-[1.02] font-extrabold text-[#083B6E] tracking-[-0.05em]">
                Dashboard Ringkasan
            </h2>
        </div>

        <div class="inline-flex items-center gap-3 h-[54px] px-6 rounded-full bg-white shadow-[0_2px_10px_rgba(15,23,42,.035)]">
            <img src="{{ asset('storage/calender.png') }}" alt="Last Update" class="w-5 h-5 object-contain">
            <span class="text-[16px] font-bold text-[#083B6E]">Last Update: {{ now()->format('d F Y') }}</span>
        </div>
    </div>
</section>

<section class="grid grid-cols-1 xl:grid-cols-[1fr_1fr_1fr_.95fr] gap-6 mb-8">
    @foreach($summaryCards as $card)
        <div class="admin-card min-h-[220px] overflow-hidden relative flex flex-col">
            <div class="h-[4px] w-full {{ $card['top_line'] }}"></div>

            <div class="p-8 flex-1 flex flex-col justify-between relative">
                <div class="text-[14px] uppercase tracking-[.14em] font-extrabold text-[#7C8AA0]">
                    {{ $card['title'] }}
                </div>

                <div class="flex items-baseline gap-3">
                    <div class="text-[62px] leading-none font-extrabold text-[#083B6E] tracking-[-0.05em]">
                        {{ $card['value'] }}
                    </div>
                    <div class="text-[20px] font-extrabold {{ $card['note_color'] }}">
                        {{ $card['note'] }}
                    </div>
                </div>

                <img src="{{ asset('storage/' . $card['icon']) }}"
                     alt="{{ $card['title'] }}"
                     class="absolute right-7 bottom-6 w-[46px] h-[46px] object-contain {{ $card['icon_opacity'] }}">
            </div>
        </div>
    @endforeach

    <div class="rounded-[28px] bg-[#063A67] p-8 text-white min-h-[220px] flex flex-col justify-between">
        <div>
            <div class="text-[14px] uppercase tracking-[.16em] font-extrabold text-[#7FA8CE] mb-5">
                ENGAGEMENT TERTINGGI
            </div>

            <div class="text-[68px] leading-none font-extrabold tracking-[-0.05em]">
                {{ $highestEngagement }}
            </div>
        </div>

        <div>
            <div class="w-full h-[6px] bg-[#174E7A] rounded-full overflow-hidden">
                <div class="w-[68%] h-full bg-[#2E9F43] rounded-full"></div>
            </div>
        </div>
    </div>
</section>

<section class="grid grid-cols-1 xl:grid-cols-[1.65fr_.75fr] gap-6 mb-8 items-stretch">
    <div class="admin-card p-8 min-h-[540px]">
        <div class="flex items-start justify-between gap-4 mb-6">
            <div>
                <h3 class="text-[42px] leading-none font-extrabold text-[#083B6E] tracking-[-0.04em] mb-3">
                    Trend Posting Mingguan
                </h3>
                <p class="text-[18px] text-[#7C8AA0] max-w-[500px]">
                    Visualisasi aktivitas konten lingkungan di Surabaya
                </p>
            </div>
        </div>

        <div class="h-[380px] flex items-end gap-3 pt-6">
            @foreach($weeklyChart as $bar)
                <div class="flex-1 flex items-end">
                    <div class="w-full rounded-t-[18px] bg-[#A8C7A8] transition-all duration-300 hover:opacity-90"
                         style="height: {{ $bar['height'] }}%;">
                    </div>
                </div>
            @endforeach
        </div>

        <div class="grid grid-cols-7 gap-3 mt-5">
            @foreach($weeklyChart as $bar)
                <div class="text-center text-[12px] font-extrabold text-[#8A9AB3]">
                    {{ $bar['label'] }}
                </div>
            @endforeach
        </div>
    </div>

    <div class="space-y-6">
        <div class="admin-card p-8 min-h-[540px]">
            <h3 class="text-[40px] leading-none font-extrabold text-[#083B6E] tracking-[-0.04em] mb-3">
                Top 5 Hashtags
            </h3>
            <p class="text-[18px] text-[#7C8AA0] mb-10">
                Dominasi diskusi lingkungan
            </p>

            <div class="space-y-8">
                @forelse($topHashtags as $item)
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-[18px] font-extrabold text-[#083B6E]">#{{ $item->label }}</span>
                            <span class="text-[18px] font-bold text-[#7C8AA0]">{{ $item->value }}</span>
                        </div>

                        <div class="w-full h-[10px] bg-[#E7ECF1] rounded-full overflow-hidden">
                            <div class="h-full bg-[#2E7D32] rounded-full" style="width: {{ $item->width }}"></div>
                        </div>
                    </div>
                @empty
                    <p class="text-[#7C8AA0]">Belum ada data hashtag.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

<section class="grid grid-cols-1 xl:grid-cols-[1.55fr_.45fr] gap-6 items-stretch">
    <div class="admin-card p-10 min-h-[520px] relative overflow-hidden">
        <h3 class="text-[42px] leading-none font-extrabold text-[#083B6E] tracking-[-0.04em] mb-10">
            Top Keywords Frequency
        </h3>

        <div class="min-h-[340px] flex items-center justify-center">
            <div class="flex flex-wrap justify-center gap-6 text-center">
                @forelse($topKeywords as $index => $item)
                    <span class="
                        @if($index == 0) text-[84px] text-[#083B6E]
                        @elseif($index == 1) text-[60px] text-[#2E7D32]
                        @elseif($index == 2) text-[52px] text-[#3F7AA7]
                        @elseif($index == 3) text-[44px] text-[#6B3F11]
                        @else text-[30px] text-[#8A9AB3]
                        @endif
                        font-extrabold tracking-[-0.04em]
                    ">
                        {{ $item->label }}
                    </span>
                @empty
                    <p class="text-[#7C8AA0]">Belum ada data keyword.</p>
                @endforelse
            </div>
        </div>

        <img src="{{ asset('storage/archive.png') }}" alt="Archive" class="absolute right-6 bottom-6 w-[84px] opacity-[.10] object-contain">
    </div>

    <div class="space-y-6">
        <div class="rounded-[28px] bg-[#063A67] p-8 min-h-[240px] text-white">
            <div class="text-[12px] uppercase tracking-[.16em] font-extrabold text-[#7FA8CE] mb-6">
                AKUN TERAKTIF
            </div>

            <div class="text-[34px] leading-[1.2] font-extrabold tracking-[-0.03em] mb-6">
                Peduli Sungai<br>Surabaya
            </div>

            <div class="flex items-center gap-3">
                <img src="{{ asset('storage/environmental.png') }}" alt="Environmental Leader" class="w-5 h-5 object-contain">
                <span class="text-[16px] text-slate-200">Environmental Leader</span>
            </div>
        </div>

        <div class="admin-card p-8 min-h-[240px]">
            <div class="text-[12px] uppercase tracking-[.16em] font-extrabold text-[#7C8AA0] mb-5">
                UPDATE TERAKHIR
            </div>
            <div class="text-[30px] leading-none font-extrabold text-[#083B6E] tracking-[-0.03em] mb-8">
                {{ now()->format('d F Y') }}
            </div>

            <div class="text-[12px] uppercase tracking-[.16em] font-extrabold text-[#7C8AA0] mb-5">
                TOTAL DATA TERINPUT
            </div>
            <div class="text-[30px] leading-none font-extrabold text-[#083B6E] tracking-[-0.03em]">
                {{ $summaryCards[0]['value'] + $summaryCards[1]['value'] + $summaryCards[2]['value'] }} Record
            </div>
        </div>
    </div>
</section>

@endsection