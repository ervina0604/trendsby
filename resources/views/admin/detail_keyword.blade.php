@extends('layouts.admin')

@section('title', 'Detail Keyword Analysis')
@section('header_title', 'Detail Keyword Analysis')

@section('content')

<!-- Filtering and Searching Section -->
<div class="admin-card p-8 mb-8">
    <div class="flex justify-between items-center">
        <h3 class="text-[20px] font-extrabold text-[#083B6E] mb-5">Detail Keyword Analysis</h3>

        <!-- Search Input -->
        <div class="relative w-72">
            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-[22px]">
                search
            </span>
            <input
                type="text"
                placeholder="Cari keyword..."
                class="w-full h-12 rounded-full bg-slate-100 border-0 pl-12 pr-5 text-sm focus:outline-none focus:ring-2 focus:ring-sky-200"
            >
        </div>
    </div>

    <!-- Filter Date Range -->
    <div class="flex gap-5">
        <button class="bg-[#063A67] text-white px-5 py-3 rounded-full text-sm">Pilih Periode</button>
        <button class="bg-[#2E9F43] text-white px-5 py-3 rounded-full text-sm">Filter Akun</button>
    </div>
</div>

<!-- Keyword Data Table -->
<div class="admin-card p-8">
    <table class="w-full table-auto border-collapse text-sm">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b text-left">Rank</th>
                <th class="px-4 py-2 border-b text-left">Keyword</th>
                <th class="px-4 py-2 border-b text-left">Jumlah Kemunculan</th>
                <th class="px-4 py-2 border-b text-left">Trend</th>
                <th class="px-4 py-2 border-b text-left">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="px-4 py-3 border-b">1</td>
                <td class="px-4 py-3 border-b">#sungaisurabaya</td>
                <td class="px-4 py-3 border-b">38</td>
                <td class="px-4 py-3 border-b">↗ +12%</td>
                <td class="px-4 py-3 border-b">
                    <button class="text-[#FF5C5C]">Hapus</button>
                </td>
            </tr>
            <tr>
                <td class="px-4 py-3 border-b">2</td>
                <td class="px-4 py-3 border-b">#pedulisungai</td>
                <td class="px-4 py-3 border-b">25</td>
                <td class="px-4 py-3 border-b">↗ +6%</td>
                <td class="px-4 py-3 border-b">
                    <button class="text-[#FF5C5C]">Hapus</button>
                </td>
            </tr>
            <tr>
                <td class="px-4 py-3 border-b">3</td>
                <td class="px-4 py-3 border-b">#ecoton</td>
                <td class="px-4 py-3 border-b">20</td>
                <td class="px-4 py-3 border-b">—</td>
                <td class="px-4 py-3 border-b">
                    <button class="text-[#FF5C5C]">Hapus</button>
                </td>
            </tr>
            <tr>
                <td class="px-4 py-3 border-b">4</td>
                <td class="px-4 py-3 border-b">#surabayahijau</td>
                <td class="px-4 py-3 border-b">18</td>
                <td class="px-4 py-3 border-b">↗ +8%</td>
                <td class="px-4 py-3 border-b">
                    <button class="text-[#FF5C5C]">Hapus</button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-6 flex justify-center">
        <ul class="flex gap-2">
            <li><a href="#" class="text-[#2E9F43] font-semibold">‹</a></li>
            <li><a href="#" class="text-[#2E9F43] font-semibold">1</a></li>
            <li><a href="#" class="text-[#2E9F43] font-semibold">2</a></li>
            <li><a href="#" class="text-[#2E9F43] font-semibold">3</a></li>
            <li><a href="#" class="text-[#2E9F43] font-semibold">›</a></li>
        </ul>
    </div>
</div>

<!-- Export Button Modal -->
<div id="exportVisualModal" class="modal">
    <div class="modal-content">
        <span id="closeExportModal" class="close-btn">&times;</span>
        <h2>Ekspor Visual</h2>
        <form>
            <label>Format File:</label><br>
            <input type="radio" name="format" value="PNG"> PNG (High Quality)<br>
            <input type="radio" name="format" value="JPG"> JPG (Small File Size)<br>
            <input type="radio" name="format" value="PDF" checked> PDF (Report)<br><br>
            
            <label>Visual Size:</label><br>
            <input type="radio" name="size" value="Normal"> Normal<br>
            <input type="radio" name="size" value="HD"> HD<br><br>

            <button type="submit">Download</button>
        </form>
    </div>
</div>

@endsection