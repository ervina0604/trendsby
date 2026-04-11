@extends('layouts.app')

@section('title','Dataset Hashtag Lengkap')

@php
    $rows = [
        ['rank' => '01', 'tag' => '#sungaisurabaya', 'jumlah' => 90, 'tren' => '+12%', 'type' => 'up', 'periode' => 'Mei'],
        ['rank' => '02', 'tag' => '#pedulisungai', 'jumlah' => 25, 'tren' => 'stabil', 'type' => 'stable', 'periode' => 'Mei'],
        ['rank' => '03', 'tag' => '#ecoton', 'jumlah' => 19, 'tren' => '+4%', 'type' => 'up', 'periode' => 'Mei'],
        ['rank' => '04', 'tag' => '#pencemaran', 'jumlah' => 18, 'tren' => '-2%', 'type' => 'down', 'periode' => 'Mei'],
        ['rank' => '05', 'tag' => '#plastik', 'jumlah' => 25, 'tren' => '-2%', 'type' => 'down', 'periode' => 'Mei'],
        ['rank' => '06', 'tag' => '#aksibersih', 'jumlah' => 20, 'tren' => '+5%', 'type' => 'up', 'periode' => 'Mei'],
        ['rank' => '07', 'tag' => '#surabayasehat', 'jumlah' => 18, 'tren' => '-2%', 'type' => 'down', 'periode' => 'Mei'],
        ['rank' => '08', 'tag' => '#daruratplastik', 'jumlah' => 12, 'tren' => '-3%', 'type' => 'down', 'periode' => 'Mei'],
        ['rank' => '09', 'tag' => '#sungailestari', 'jumlah' => 14, 'tren' => '+3%', 'type' => 'up', 'periode' => 'Mei'],
    ];

    $pages = [1,2,3,4,5,6,7,8,9];
@endphp

@section('content')

<section class="mb-12">
    <h1 class="text-[58px] leading-[1.02] font-extrabold text-[#255F4D] tracking-[-0.045em] mb-4">
        Dataset Hashtag Lengkap
    </h1>
    <p class="text-[18px] text-slate-500">
        Data frekuensi hashtag terkait Sungai Surabaya
    </p>
</section>

<section class="glass-card p-5 mb-8">
    <div class="grid grid-cols-1 xl:grid-cols-[1fr_180px_180px] gap-4">
        <div class="h-[58px] rounded-full bg-white border border-slate-100 px-7 flex items-center gap-4">
            <img src="{{ asset('storage/hashtag.png') }}" alt="Hashtag" class="w-5 h-5 object-contain opacity-70">
            <input
                type="text"
                placeholder="Cari hashtag spesifik..."
                class="w-full bg-transparent outline-none text-[16px] text-slate-600 placeholder:text-slate-400"
            >
        </div>

        <button type="button"
                onclick="openPeriodPopup()"
                class="h-[58px] rounded-full bg-white border border-slate-100 px-6 flex items-center justify-between gap-4 hover:bg-slate-50 transition">
            <span id="selectedPeriodLabel" class="text-[16px] text-slate-600 font-medium">Pilih Periode</span>
            <span class="w-[42px] h-[42px] rounded-full bg-[#255F4D] flex items-center justify-center">
                <img src="{{ asset('storage/filter.png') }}" alt="Filter" class="w-4 h-4 object-contain brightness-0 invert">
            </span>
        </button>

        <button type="button"
                onclick="openExportPopup()"
                class="h-[58px] rounded-full bg-[#255F4D] px-6 flex items-center justify-center gap-3 text-white font-bold hover:opacity-95 transition">
            <img src="{{ asset('storage/export.png') }}" alt="Export" class="w-4 h-4 object-contain brightness-0 invert">
            Export Data
        </button>
    </div>
</section>

<section class="glass-card overflow-hidden mb-10">
    <div class="grid grid-cols-[120px_1.6fr_140px_170px_140px] px-8 py-5 text-[12px] uppercase tracking-[.15em] font-extrabold text-slate-500 border-b border-slate-200">
        <div>Rank</div>
        <div>Hashtag</div>
        <div>Jumlah</div>
        <div>Tren</div>
        <div>Periode</div>
    </div>

    @foreach($rows as $row)
        <div class="grid grid-cols-[120px_1.6fr_140px_170px_140px] px-8 py-6 items-center border-b border-slate-200 last:border-b-0 bg-white">
            <div class="text-[18px] font-extrabold text-[#255F4D]">
                {{ $row['rank'] }}
            </div>

            <div class="text-[18px] font-extrabold text-[#2E2E2E]">
                {{ $row['tag'] }}
            </div>

            <div>
                <span class="inline-flex items-center justify-center min-w-[42px] h-[38px] px-4 rounded-full bg-[#A9DEC9] text-[#255F4D] font-extrabold text-[16px]">
                    {{ $row['jumlah'] }}
                </span>
            </div>

            <div>
                @if($row['type'] === 'up')
                    <div class="inline-flex items-center gap-2 text-[#255F4D] font-extrabold text-[15px]">
                        <img src="{{ asset('storage/naik.png') }}" alt="Naik" class="w-4 h-4 object-contain">
                        {{ $row['tren'] }}
                    </div>
                @elseif($row['type'] === 'down')
                    <div class="inline-flex items-center gap-2 text-[#DC2626] font-extrabold text-[15px]">
                        <img src="{{ asset('storage/turun.png') }}" alt="Turun" class="w-4 h-4 object-contain">
                        {{ $row['tren'] }}
                    </div>
                @else
                    <div class="inline-flex items-center gap-2 text-slate-500 font-extrabold text-[15px]">
                        <img src="{{ asset('storage/stabil.png') }}" alt="Stabil" class="w-4 h-4 object-contain">
                        {{ $row['tren'] }}
                    </div>
                @endif
            </div>

            <div class="text-[16px] text-slate-500">
                {{ $row['periode'] }}
            </div>
        </div>
    @endforeach

    <div class="px-8 py-7 bg-[#F7F7F8] flex flex-col lg:flex-row items-center justify-between gap-5">
        <button class="text-[15px] text-slate-600 font-medium hover:text-[#255F4D] transition">
            ‹ Sebelumnya
        </button>

        <div class="flex items-center gap-3 flex-wrap justify-center">
            @foreach($pages as $page)
                <button class="{{ $page === 1 ? 'bg-[#D7DEDE] text-[#255F4D]' : 'text-slate-700' }} w-[32px] h-[32px] rounded-[6px] text-[14px] font-bold hover:bg-slate-200 transition">
                    {{ $page }}
                </button>
            @endforeach
        </div>

        <button class="text-[15px] text-slate-600 font-medium hover:text-[#255F4D] transition">
            Selanjutnya ›
        </button>
    </div>
</section>

<section class="grid grid-cols-1 xl:grid-cols-3 gap-6">
    <div class="glass-card p-8 min-h-[210px] bg-[#F3F6F5]">
        <div class="flex items-start gap-5">
            <div class="w-[52px] h-[52px] rounded-full bg-[#255F4D] flex items-center justify-center shrink-0">
                <img src="{{ asset('storage/analisis.png') }}" alt="Insight" class="w-6 h-6 object-contain brightness-0 invert">
            </div>
            <div>
                <h3 class="text-[20px] font-extrabold text-[#255F4D] mb-4 tracking-[-0.02em]">
                    Insight Utama
                </h3>
                <p class="text-[16px] leading-[1.8] text-slate-600">
                    Peningkatan hashtag <span class="font-extrabold text-[#255F4D]">#sungaisurabaya</span>
                    berkorelasi langsung dengan kampanye pembersihan sungai minggu lalu.
                </p>
            </div>
        </div>
    </div>

    <div class="glass-card p-8 min-h-[210px] bg-[#F3F6F5]">
        <div class="flex items-start gap-5">
            <div class="w-[52px] h-[52px] rounded-full bg-[#4B5A58] flex items-center justify-center shrink-0">
                <img src="{{ asset('storage/acc.png') }}" alt="Aktivitas" class="w-6 h-6 object-contain brightness-0 invert">
            </div>
            <div>
                <h3 class="text-[20px] font-extrabold text-[#4B5A58] mb-4 tracking-[-0.02em]">
                    Aktivitas Komunitas
                </h3>
                <p class="text-[16px] leading-[1.8] text-slate-600">
                    Lebih dari <span class="font-extrabold text-[#4B5A58]">2,400 user unik</span> menggunakan hashtag
                    terkait lingkungan di wilayah Surabaya Timur.
                </p>
            </div>
        </div>
    </div>

    <div class="glass-card p-8 min-h-[210px] bg-[#F2F2F2]">
        <div class="flex items-start gap-5 mb-7">
            <div class="w-[52px] h-[52px] rounded-full bg-[#434B49] flex items-center justify-center shrink-0">
                <img src="{{ asset('storage/export.png') }}" alt="Ekspor" class="w-6 h-6 object-contain brightness-0 invert">
            </div>
            <div>
                <h3 class="text-[20px] font-extrabold text-[#2E2E2E] mb-2 tracking-[-0.02em]">
                    Ekspor Dataset
                </h3>
            </div>
        </div>

        <button type="button"
                onclick="openExportPopup()"
                class="w-full h-[48px] rounded-full border border-slate-300 bg-white text-[#255F4D] font-extrabold text-[15px] hover:bg-slate-50 transition">
            Unduh CSV/Excel/PDF
        </button>
    </div>
</section>

<div id="periodPopup" class="hidden fixed inset-0 z-[70]">
    <div class="absolute inset-0 bg-black/10" onclick="closePeriodPopup()"></div>

    <div class="absolute top-[220px] right-[230px] w-[220px] rounded-[24px] bg-white shadow-[0_12px_30px_rgba(15,23,42,0.14)] overflow-hidden border border-slate-200">
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
                    <input type="radio" name="export_type_hashtag" value="csv" class="w-4 h-4 accent-[#255F4D]" checked>
                    CSV
                </label>

                <label class="flex items-center gap-3 text-[16px] text-[#255F4D] font-semibold cursor-pointer">
                    <input type="radio" name="export_type_hashtag" value="excel" class="w-4 h-4 accent-[#255F4D]">
                    Excel
                </label>

                <label class="flex items-center gap-3 text-[16px] text-[#255F4D] font-semibold cursor-pointer">
                    <input type="radio" name="export_type_hashtag" value="pdf" class="w-4 h-4 accent-[#255F4D]">
                    PDF
                </label>
            </div>
        </div>

        <div class="px-5 py-3 border-t border-slate-300 flex items-center justify-between">
            <button type="button"
                    onclick="downloadHashtagTableData()"
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
function downloadHashtagTableData() {
    const selected = document.querySelector('input[name="export_type_hashtag"]:checked');
    const type = selected ? selected.value : 'csv';

    if (type === 'csv') window.location.href = '/export/hashtag/csv';
    if (type === 'excel') window.location.href = '/export/hashtag/excel';
    if (type === 'pdf') window.location.href = '/export/hashtag/pdf';

    closeExportPopup();
}
</script>
@endpush