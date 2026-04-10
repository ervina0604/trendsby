@extends('layouts.admin')

@section('title', 'Filter & Pencarian')

@section('content')

<!-- Filter Panel -->
<div class="admin-card p-8 mb-8">
    <h3 class="text-[20px] font-extrabold text-[#083B6E] mb-5">Filter & Pencarian</h3>

    <form method="GET" action="{{ route('admin.filter') }}">
        <!-- Filter Date Range -->
        <div class="mb-5">
            <label for="date_range" class="block text-sm font-bold">Rentang Tanggal</label>
            <input type="text" name="start_date" id="start_date" placeholder="MM/DD/YYYY" class="datepicker input" />
            <span>to</span>
            <input type="text" name="end_date" id="end_date" placeholder="MM/DD/YYYY" class="datepicker input" />
        </div>

        <!-- Filter Account Source -->
        <div class="mb-5">
            <label class="block text-sm font-bold">Akun Sumber</label>
            <label><input type="checkbox" name="account[]" value="Peduli Sungai Surabaya"> Peduli Sungai Surabaya</label><br>
            <label><input type="checkbox" name="account[]" value="Ecoton Foundation"> Ecoton Foundation</label><br>
        </div>

        <!-- Filter Hashtags -->
        <div class="mb-5">
            <label class="block text-sm font-bold">Hashtag Populer</label>
            <label><input type="checkbox" name="hashtag[]" value="#BrantasResik"> #BrantasResik</label><br>
            <label><input type="checkbox" name="hashtag[]" value="#SaveSurabayaRiver"> #SaveSurabayaRiver</label><br>
            <label><input type="checkbox" name="hashtag[]" value="#ZeroWaste"> #ZeroWaste</label><br>
        </div>

        <!-- Apply Filter Button -->
        <button type="submit" class="bg-[#2E9F43] text-white px-5 py-3 rounded-full text-sm">Terapkan Filter</button>
    </form>
</div>

<!-- Filtered Results Table -->
<div class="admin-card p-8">
    <h3 class="text-[20px] font-extrabold text-[#083B6E] mb-5">Hasil Pencarian Terperinci</h3>

    <table class="w-full table-auto border-collapse text-sm">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b text-left">Tanggal</th>
                <th class="px-4 py-2 border-b text-left">Akun</th>
                <th class="px-4 py-2 border-b text-left">Caption</th>
                <th class="px-4 py-2 border-b text-left">Engagement</th>
                <th class="px-4 py-2 border-b text-left">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through filtered data -->
            <tr>
                <td class="px-4 py-3 border-b">12 Jun 2024</td>
                <td class="px-4 py-3 border-b">Peduli Sungai Surabaya</td>
                <td class="px-4 py-3 border-b">Penemuan mikroplastik...</td>
                <td class="px-4 py-3 border-b">1.2k | 48</td>
                <td class="px-4 py-3 border-b">
                    <button class="text-[#FF5C5C]">Hapus</button>
                </td>
            </tr>
            <!-- Add more rows dynamically based on filter -->
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

@endsection