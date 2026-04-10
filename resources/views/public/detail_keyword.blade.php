@extends('layouts.app')

@section('title','Ranking Keyword Dominan')

@php
    $stats = [
        ['label' => 'Total Keywords', 'value' => '1,284', 'desc' => '+12% from last month'],
        ['label' => 'Avg. Position', 'value' => '4.2', 'desc' => '+0.8 points growth'],
    ];

    $rows = [
        ['rank' => '01', 'keyword' => 'sampah', 'category' => 'ENVIRONMENT', 'category_bg' => '#D6E7DE', 'category_text' => '#4B6A5A', 'count' => 154, 'trend' => '-12%', 'type' => 'down'],
        ['rank' => '02', 'keyword' => 'plastik', 'category' => 'ENVIRONMENT', 'category_bg' => '#D6E7DE', 'category_text' => '#4B6A5A', 'count' => 120, 'trend' => '-1%', 'type' => 'soft'],
        ['rank' => '03', 'keyword' => 'pencemaran', 'category' => 'NEWS', 'category_bg' => '#EFE5E5', 'category_text' => '#8B5E5E', 'count' => 98, 'trend' => 'stabil', 'type' => 'stable'],
        ['rank' => '04', 'keyword' => 'banjir', 'category' => 'ENVIRONMENT', 'category_bg' => '#D6E7DE', 'category_text' => '#4B6A5A', 'count' => 87, 'trend' => '+38%', 'type' => 'up'],
        ['rank' => '05', 'keyword' => 'limbah', 'category' => 'ENVIRONMENT', 'category_bg' => '#D6E7DE', 'category_text' => '#4B6A5A', 'count' => 82, 'trend' => '+5%', 'type' => 'up'],
        ['rank' => '06', 'keyword' => 'aksi bersih', 'category' => 'SOCIAL', 'category_bg' => '#D8ECE8', 'category_text' => '#466A65', 'count' => 79, 'trend' => '+14%', 'type' => 'up'],
        ['rank' => '07', 'keyword' => 'kalimas', 'category' => 'NEWS', 'category_bg' => '#EFE5E5', 'category_text' => '#8B5E5E', 'count' => 75, 'trend' => 'stabil', 'type' => 'stable'],
        ['rank' => '08', 'keyword' => 'mikroplastik', 'category' => 'ENVIRONMENT', 'category_bg' => '#D6E7DE', 'category_text' => '#4B6A5A', 'count' => 59, 'trend' => '+21%', 'type' => 'up'],
        ['rank' => '09', 'keyword' => 'ekosistem', 'category' => 'ENVIRONMENT', 'category_bg' => '#D6E7DE', 'category_text' => '#4B6A5A', 'count' => 51, 'trend' => '-8%', 'type' => 'down'],
        ['rank' => '10', 'keyword' => 'surabaya', 'category' => 'NEWS', 'category_bg' => '#EFE5E5', 'category_text' => '#8B5E5E', 'count' => 48, 'trend' => '+12%', 'type' => 'up'],
    ];
@endphp

@section('content')

<section class="mb-12">
    <h1 class="text-[56px] leading-[1.04] font-extrabold text-[#255F4D] tracking-[-0.045em] mb-3">
        Ranking Keyword Dominan
    </h1>
    <p class="text-[18px] text-[#8292A8]">
        Analytics Overview
    </p>
</section>

<section class="grid grid-cols-1 xl:grid-cols-[235px_235px_1fr] gap-6 mb-8 items-stretch">
    @foreach($stats as $stat)
        <div class="glass-card bg-white p-7 min-h-[152px] flex flex-col justify-center">
            <div class="text-[16px] text-[#8292A8] mb-3">
                {{ $stat['label'] }}
            </div>
            <div class="text-[54px] leading-none font-extrabold text-[#255F4D] tracking-[-0.04em] mb-4">
                {{ $stat['value'] }}
            </div>
            <div class="text-[15px] font-extrabold text-[#255F4D]">
                {{ $stat['desc'] }}
            </div>
        </div>
    @endforeach

    <div class="rounded-[30px] bg-[#255F4D] p-8 text-white relative overflow-hidden shadow-[0_10px_22px_rgba(37,95,77,0.18)]">
        <div class="inline-flex items-center px-4 h-[30px] rounded-full bg-white/12 text-[11px] uppercase tracking-[.14em] font-extrabold mb-7">
            TOP PERFORMER
        </div>

        <div class="text-[24px] xl:text-[28px] font-extrabold tracking-[-0.03em] mb-2">
            sampah plastik
        </div>

        <p class="text-[17px] leading-[1.7] text-white/75 max-w-[420px]">
            This keyword currently leads engagement and ranking consistency across all major segments.
        </p>

        <img src="{{ asset('storage/bintang.png') }}" alt="Bintang" class="absolute right-8 top-6 w-[120px] opacity-25 object-contain">
    </div>
</section>

<section class="glass-card overflow-hidden mb-8">
    <div class="px-8 py-7 bg-white border-b border-slate-200 flex flex-col xl:flex-row xl:items-center xl:justify-between gap-5">
        <h2 class="text-[24px] font-extrabold text-[#255F4D] tracking-[-0.03em]">
            Keyword Performance
        </h2>

        <div class="flex items-center gap-4">
            <button type="button"
                    onclick="openPeriodPopup()"
                    class="h-[44px] px-6 rounded-full border border-slate-300 bg-white inline-flex items-center gap-3 text-[15px] font-semibold text-slate-600 hover:bg-slate-50 transition">
                <img src="{{ asset('storage/filter.png') }}" alt="Filter" class="w-4 h-4 object-contain">
                <span id="selectedPeriodLabel">Filter periode</span>
            </button>

            <button type="button"
                    onclick="openExportPopup()"
                    class="h-[44px] px-6 rounded-full bg-[#255F4D] inline-flex items-center gap-3 text-[15px] font-semibold text-white hover:opacity-95 transition shadow">
                <img src="{{ asset('storage/export.png') }}" alt="Export" class="w-4 h-4 object-contain brightness-0 invert">
                Export Data
            </button>
        </div>
    </div>

    <div class="grid grid-cols-[90px_1.2fr_180px_160px_160px] px-8 py-5 text-[11px] uppercase tracking-[.16em] font-extrabold text-[#94A3B8] border-b border-slate-200 bg-[#FBFBFB]">
        <div>Rank</div>
        <div>Keyword</div>
        <div>Category</div>
        <div>Kemunculan</div>
        <div class="text-right">Trend</div>
    </div>

    @foreach($rows as $row)
        <div class="grid grid-cols-[90px_1.2fr_180px_160px_160px] px-8 py-7 items-center border-b border-slate-200 last:border-b-0 bg-white">
            <div class="text-[18px] font-extrabold text-[#A9BCB4] tracking-[-0.02em]">
                {{ $row['rank'] }}
            </div>

            <div class="text-[18px] font-extrabold text-[#202020]">
                {{ $row['keyword'] }}
            </div>

            <div>
                <span class="inline-flex items-center h-[28px] px-3 rounded-[8px] text-[11px] font-extrabold tracking-[.08em]"
                      style="background: {{ $row['category_bg'] }}; color: {{ $row['category_text'] }};">
                    {{ $row['category'] }}
                </span>
            </div>

            <div class="text-[18px] font-bold text-[#344256]">
                {{ $row['count'] }}
            </div>

            <div class="text-right">
                @if($row['type'] === 'up')
                    <span class="inline-flex items-center gap-2 text-[#255F4D] font-extrabold text-[15px]">
                        <img src="{{ asset('storage/naik.png') }}" alt="Naik" class="w-4 h-4 object-contain">
                        {{ $row['trend'] }}
                    </span>
                @elseif($row['type'] === 'down')
                    <span class="inline-flex items-center gap-2 text-[#DC2626] font-extrabold text-[15px]">
                        <img src="{{ asset('storage/turun.png') }}" alt="Turun" class="w-4 h-4 object-contain">
                        {{ $row['trend'] }}
                    </span>
                @elseif($row['type'] === 'soft')
                    <span class="inline-flex items-center gap-2 text-[#94A3B8] font-extrabold text-[15px]">
                        <img src="{{ asset('storage/turun.png') }}" alt="Turun" class="w-4 h-4 object-contain opacity-60">
                        {{ $row['trend'] }}
                    </span>
                @else
                    <span class="inline-flex items-center gap-2 text-[#94A3B8] font-extrabold text-[15px]">
                        stabil
                    </span>
                @endif
            </div>
        </div>
    @endforeach

    <div class="px-8 py-7 bg-white flex flex-col xl:flex-row xl:items-center xl:justify-between gap-5">
        <div class="text-[14px] text-[#8292A8]">
            Showing 1 to 10 of 128 results
        </div>

        <div class="flex items-center gap-4 text-[15px] font-semibold">
            <button class="text-[#94A3B8]">‹</button>
            <button class="w-[36px] h-[36px] rounded-full bg-[#255F4D] text-white">1</button>
            <button class="text-[#344256]">2</button>
            <button class="text-[#344256]">3</button>
            <button class="text-[#94A3B8]">...</button>
            <button class="text-[#94A3B8]">›</button>
        </div>
    </div>
</section>

<section class="grid grid-cols-1 xl:grid-cols-[1.35fr_.65fr] gap-6">
    <div class="glass-card p-8 bg-[#F3F7F5] min-h-[170px]">
        <h3 class="text-[20px] font-extrabold text-[#255F4D] tracking-[-0.02em] mb-4">
            Content Opportunity Detected
        </h3>
        <p class="text-[17px] leading-[1.85] text-slate-500 max-w-[700px]">
            Kata kunci "pencemaran" stabil tetapi memiliki volume konten yang rendah.
            <br>
            Membuat cerita fitur tentang "Sungai Kalimas" dapat memanfaatkan minat regional saat ini.
        </p>
    </div>

    <div class="glass-card p-8 bg-[#F7F7F8] min-h-[170px]">
        <div class="flex items-center gap-3 mb-4">
            <img src="{{ asset('storage/editor.png') }}" alt="Editor" class="w-5 h-5 object-contain">
            <div class="text-[13px] uppercase tracking-[.14em] font-extrabold text-[#8292A8]">
                EDITOR'S NOTE
            </div>
        </div>

        <p class="text-[17px] leading-[1.85] text-slate-500">
            "Data menunjukkan pergeseran ke arah etika lingkungan
            daripada liputan yang semata-mata berbasis berita."
        </p>
    </div>
</section>

<div id="periodPopup" class="hidden fixed inset-0 z-[70]">
    <div class="absolute inset-0 bg-black/10" onclick="closePeriodPopup()"></div>

    <div class="absolute top-[220px] right-[250px] w-[220px] rounded-[24px] bg-white shadow-[0_12px_30px_rgba(15,23,42,0.14)] overflow-hidden border border-slate-200">
        <div class="px-5 pt-4 pb-2">
            <div class="text-[18px] font-extrabold text-[#255F4D] mb-2">Pilih Periode</div>
            <div class="border-b border-slate-300"></div>
        </div>

        <div class="pb-4">
            <button type="button" onclick="setPeriod('7 Hari Terakhir')" class="w-full px-5 py-3 text-left text-[16px] text-[#466A65] hover:bg-slate-100 transition">
                7 Hari Terakhir
            </button>
            <button type="button" onclick="setPeriod('30 Hari Terakhir')" class="w-full px-5 py-3 text-left text-[16px] text-[#466A65] hover:bg-slate-100 transition">
                30 Hari Terakhir
            </button>
            <button type="button" onclick="setPeriod('3 Bulan Terakhir')" class="w-full px-5 py-3 text-left text-[16px] bg-slate-200 text-[#255F4D] font-bold">
                3 Bulan Terakhir
            </button>
            <button type="button" onclick="setPeriod('1 Tahun Terakhir')" class="w-full px-5 py-3 text-left text-[16px] text-[#466A65] hover:bg-slate-100 transition">
                1 Tahun Terakhir
            </button>
        </div>
    </div>
</div>

<div id="exportPopup" class="hidden fixed inset-0 z-[70]">
    <div class="absolute inset-0 bg-black/10" onclick="closeExportPopup()"></div>

    <div class="absolute top-[220px] right-[40px] w-[250px] rounded-[24px] bg-white shadow-[0_12px_30px_rgba(15,23,42,0.14)] overflow-hidden border border-slate-200">
        <div class="px-5 pt-4 pb-2 text-center">
            <div class="text-[18px] font-extrabold text-[#255F4D] mb-2">Export Data</div>
            <div class="border-b border-slate-300"></div>
        </div>

        <div class="px-5 py-3">
            <div class="text-[16px] text-slate-600 mb-3">Format File</div>

            <div class="space-y-3">
                <label class="flex items-center gap-3 text-[16px] text-[#255F4D] font-semibold cursor-pointer">
                    <input type="radio" name="export_type_keyword" value="csv" class="w-4 h-4 accent-[#255F4D]" checked>
                    CSV
                </label>

                <label class="flex items-center gap-3 text-[16px] text-[#255F4D] font-semibold cursor-pointer">
                    <input type="radio" name="export_type_keyword" value="excel" class="w-4 h-4 accent-[#255F4D]">
                    Excel
                </label>

                <label class="flex items-center gap-3 text-[16px] text-[#255F4D] font-semibold cursor-pointer">
                    <input type="radio" name="export_type_keyword" value="pdf" class="w-4 h-4 accent-[#255F4D]">
                    PDF
                </label>
            </div>
        </div>

        <div class="px-5 py-3 border-t border-slate-300 flex items-center justify-between">
            <button type="button"
                    onclick="downloadKeywordTableData()"
                    class="h-[36px] px-5 rounded-[6px] bg-[#255F4D] text-white font-bold text-[15px] hover:opacity-95 transition">
                Download
            </button>

            <button type="button"
                    onclick="closeExportPopup()"
                    class="h-[36px] px-5 rounded-[6px] bg-slate-200 text-slate-500 font-bold text-[15px] hover:bg-slate-300 transition">
                Cancel
            </button>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
function openPeriodPopup() {
    document.getElementById('periodPopup').classList.remove('hidden');
}
function closePeriodPopup() {
    document.getElementById('periodPopup').classList.add('hidden');
}
function openExportPopup() {
    document.getElementById('exportPopup').classList.remove('hidden');
}
function closeExportPopup() {
    document.getElementById('exportPopup').classList.add('hidden');
}
function setPeriod(period) {
    const label = document.getElementById('selectedPeriodLabel');
    if (label) label.textContent = period;
    closePeriodPopup();
}
function downloadKeywordTableData() {
    const selected = document.querySelector('input[name="export_type_keyword"]:checked');
    const type = selected ? selected.value : 'csv';

    if (type === 'csv') window.location.href = '/export/keyword/csv';
    if (type === 'excel') window.location.href = '/export/keyword/excel';
    if (type === 'pdf') window.location.href = '/export/keyword/pdf';

    closeExportPopup();
}
</script>
@endpush