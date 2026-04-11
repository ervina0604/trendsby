@extends('layouts.admin')

@section('title', 'Analisis Hashtag')
@section('header_title', 'Analisis Hashtag')

@section('content')
<div class="grid xl:grid-cols-2 gap-6 mb-8">

    <!-- Top Hashtags Section -->
    <div class="admin-card p-8">
        <h3 class="text-[20px] font-extrabold text-[#083B6E] mb-5">Top 10 Hashtags</h3>
        <div class="text-sm font-semibold text-[#A1A1AA] mb-3">
            Frekuensi kemunculan tagar dalam 30 hari terakhir
        </div>
        <div>
            <!-- Insert dynamic Hashtags list here -->
            <div class="flex justify-between mb-4">
                <span>#sungaisurabaya</span>
                <span>38 hits</span>
            </div>
            <div class="flex justify-between mb-4">
                <span>#pedulisungai</span>
                <span>25 hits</span>
            </div>
            <!-- More hashtags -->
        </div>
    </div>

    <!-- Impact Insight Section -->
    <div class="admin-card p-8">
        <h3 class="text-[20px] font-extrabold text-[#083B6E] mb-5">Impact Insight</h3>
        <div class="text-sm font-semibold text-[#A1A1AA] mb-3">
            Tager #sungaisurabaya mendominasi 34% total volume narasi lingkungan minggu ini.
        </div>
        <div class="mb-5">
            <button class="text-white bg-[#2E9F43] px-5 py-3 rounded-full">Lihat Detail Analisis</button>
        </div>
        <div class="text-[#1C4B87] text-[12px] font-semibold">
            Trending Sekarang: 
            <span>#bebasplastik #limbahindustri #airbersih #suroboyo #ecofriendly</span>
        </div>
    </div>

</div>

<!-- Period and Export Data Section -->
<div class="admin-card p-8">
    <h3 class="text-[20px] font-extrabold text-[#083B6E] mb-5">Filter and Export</h3>

    <!-- Period Selection -->
    <div class="mb-4">
        <label for="periode" class="font-semibold text-[#7A7D7F]">Pilih Periode</label>
        <div class="relative">
            <select id="periode" class="w-full h-12 rounded-lg border-2 border-slate-300 px-4">
                <option value="7">7 Hari Terakhir</option>
                <option value="30">30 Hari Terakhir</option>
                <option value="90">3 Bulan Terakhir</option>
                <option value="365">1 Tahun Terakhir</option>
            </select>
        </div>
    </div>

    <!-- Export Data -->
    <div class="mb-4">
        <button class="bg-[#063A67] text-white px-5 py-3 rounded-full" id="exportDataBtn">
            Ekspor Data
        </button>
    </div>
</div>

<!-- Table Section for Hashtags -->
<div class="admin-card p-8">
    <h3 class="text-[20px] font-extrabold text-[#083B6E] mb-5">Ranking Hashtags</h3>
    <table class="w-full table-auto border-collapse text-sm">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b text-left">Rank</th>
                <th class="px-4 py-2 border-b text-left">Hashtag</th>
                <th class="px-4 py-2 border-b text-left">Jumlah Kemunculan</th>
                <th class="px-4 py-2 border-b text-left">Trend</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="px-4 py-3 border-b">1</td>
                <td class="px-4 py-3 border-b">#sungaisurabaya</td>
                <td class="px-4 py-3 border-b">38</td>
                <td class="px-4 py-3 border-b">↗ +12%</td>
            </tr>
            <tr>
                <td class="px-4 py-3 border-b">2</td>
                <td class="px-4 py-3 border-b">#pedulisungai</td>
                <td class="px-4 py-3 border-b">25</td>
                <td class="px-4 py-3 border-b">—</td>
            </tr>
            <!-- More rows -->
        </tbody>
    </table>

    <!-- View All Hashtags Button -->
    <div class="mt-5 text-center">
        <a href="{{ route('admin.detail_hashtag') }}" class="text-[#2E9F43] font-semibold">
            Lihat Seluruh Hashtag
        </a>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Export Data Button functionality
    document.getElementById('exportDataBtn').addEventListener('click', function () {
        alert('Export Data will be triggered here');
        // Add logic for triggering file export (CSV/Excel/PDF)
    });
</script>
@endpush