@extends('layouts.admin')

@section('title', 'Analisis Keyword')
@section('header_title', 'Analisis Keyword Caption')

@section('content')

<div class="grid xl:grid-cols-2 gap-6 mb-8">

    <!-- Word Cloud Section -->
    <div class="admin-card p-8">
        <h3 class="text-[20px] font-extrabold text-[#083B6E] mb-5">Word Cloud Visualisation</h3>
        <div class="text-sm font-semibold text-[#A1A1AA] mb-3">
            Representasi visual frekuensi terminologi
        </div>
        <div class="flex justify-center mb-5">
            <div class="relative">
                <!-- Example of Word Cloud, can be replaced with actual data visualization -->
                <img src="{{ asset('storage/word_cloud_example.png') }}" alt="Word Cloud" class="w-[400px] h-[400px] object-cover rounded-lg">
            </div>
        </div>

        <button class="bg-[#063A67] text-white px-5 py-3 rounded-full" id="exportVisualBtn">
            Ekspor Visual
        </button>
    </div>

    <!-- Executive Summary Section -->
    <div class="admin-card p-8">
        <h3 class="text-[20px] font-extrabold text-[#083B6E] mb-5">Executive Summary</h3>
        <div class="text-sm font-semibold text-[#A1A1AA] mb-3">
            Isu Persampahan Mendominasi Narasi Digital
        </div>
        <div class="text-lg font-semibold mb-5">
            Kata "Sampah" muncul 156 kali dalam periode ini, mencerminkan fokus utama kampanye terkait pengelolaan limbah.
        </div>
        <div class="mb-4">
            <button class="bg-[#A1A1AA] text-white px-5 py-3 rounded-full">
                Total Keyword: 1.4k
            </button>
        </div>
        <div class="text-[#2E9F43] font-semibold">
            Engagement: 94.2%
        </div>
    </div>

</div>

<!-- Ranking Section -->
<div class="admin-card p-8">
    <h3 class="text-[20px] font-extrabold text-[#083B6E] mb-5">Ranking Frekuensi Keyword</h3>
    <table class="w-full table-auto border-collapse text-sm">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b text-left">Rank</th>
                <th class="px-4 py-2 border-b text-left">Keyword</th>
                <th class="px-4 py-2 border-b text-left">Jumlah Kemunculan</th>
                <th class="px-4 py-2 border-b text-left">Trend Performa</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="px-4 py-3 border-b">1</td>
                <td class="px-4 py-3 border-b">Sampah</td>
                <td class="px-4 py-3 border-b">156</td>
                <td class="px-4 py-3 border-b">↗ +12%</td>
            </tr>
            <tr>
                <td class="px-4 py-3 border-b">2</td>
                <td class="px-4 py-3 border-b">Plastik</td>
                <td class="px-4 py-3 border-b">134</td>
                <td class="px-4 py-3 border-b">↗ +8%</td>
            </tr>
            <tr>
                <td class="px-4 py-3 border-b">3</td>
                <td class="px-4 py-3 border-b">Pencemaran</td>
                <td class="px-4 py-3 border-b">98</td>
                <td class="px-4 py-3 border-b">↘ -4%</td>
            </tr>
            <tr>
                <td class="px-4 py-3 border-b">4</td>
                <td class="px-4 py-3 border-b">Sungai</td>
                <td class="px-4 py-3 border-b">85</td>
                <td class="px-4 py-3 border-b">—</td>
            </tr>
            <tr>
                <td class="px-4 py-3 border-b">5</td>
                <td class="px-4 py-3 border-b">Limbah</td>
                <td class="px-4 py-3 border-b">72</td>
                <td class="px-4 py-3 border-b">↗ +20%</td>
            </tr>
        </tbody>
    </table>

    <!-- View All Keywords Button -->
    <div class="mt-5 text-center">
        <a href="{{ route('admin.detail_keyword') }}" class="text-[#2E9F43] font-semibold">
            Lihat Seluruh Keyword
        </a>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Export Visual Button functionality
    document.getElementById('exportVisualBtn').addEventListener('click', function () {
        alert('Export Visual will be triggered here');
        // Add logic for triggering export (PNG, JPG, PDF)
    });
</script>
@endpush