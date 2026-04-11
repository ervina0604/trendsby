@extends('layouts.admin')

@section('title','Kelola Data Konten')
@section('header_title','Kelola Data Konten')

@php
    $data = [
        ['date' => '24 Mei 2024', 'account' => 'Peduli Sungai Sby', 'caption' => 'Aksi bersih...', 'hashtags' => '#kalimas #surabaya', 'likes' => 1240, 'comments' => 84],
        ['date' => '22 Mei 2024', 'account' => 'Ecoton', 'caption' => 'Temuan...', 'hashtags' => '#mikroplastik #ecoton', 'likes' => 3512, 'comments' => 210],
        ['date' => '19 Mei 2024', 'account' => 'Peduli Sungai Sby', 'caption' => 'Edukas...', 'hashtags' => '#edukasi #zerowaste', 'likes' => 890, 'comments' => 45],
        ['date' => '15 Mei 2024', 'account' => 'Ecoton', 'caption' => 'Hasil audit...', 'hashtags' => '#audit #brantas', 'likes' => 2100, 'comments' => 156],
    ];
@endphp

@section('content')
<section class="mb-10">
    <div class="flex flex-col xl:flex-row xl:items-end xl:justify-between gap-5">
        <div>
            <div class="text-[18px] uppercase tracking-[.16em] font-extrabold text-[#2E7D32] mb-4">
                FILTER AKUN
            </div>
            <select class="h-[56px] rounded-[16px] bg-[#F4F6F8] px-5 outline-none border border-transparent focus:border-[#B8D4EA] text-[16px] text-slate-700">
                <option>Semua Akun</option>
                <option>Peduli Sungai Surabaya</option>
                <option>Ecoton</option>
            </select>
        </div>

        <div class="flex items-center gap-3">
            <div class="text-[18px] font-bold text-[#083B6E]">RENTANG TANGGAL</div>
            <input type="date" class="h-[56px] rounded-[16px] bg-[#F4F6F8] px-5 outline-none border border-transparent focus:border-[#B8D4EA] text-[16px] text-slate-700" />
            <button class="h-[56px] px-8 rounded-full bg-[#063A67] text-white text-[16px] font-extrabold shadow-[0_2px_10px_rgba(15,23,42,.18)] hover:opacity-95 transition">
                Terapkan
            </button>
            <button class="h-[56px] px-8 rounded-full bg-white border border-slate-200 text-[#083B6E] text-[16px] font-extrabold hover:bg-slate-50 transition">
                Reset
            </button>
        </div>
    </div>
</section>

<section class="mb-8">
    <div class="flex justify-between gap-5 mb-6">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.input') }}" class="inline-flex items-center gap-3 text-[16px] font-extrabold text-[#083B6E] hover:opacity-80 transition">
                <img src="{{ asset('storage/plus-icon.png') }}" alt="Tambah" class="w-4 h-4 object-contain">
                Entry Data Baru
            </a>
        </div>

        <div class="text-[16px] font-extrabold text-[#2E7D32]">
            <span>Menampilkan 1-10 dari 42 data</span>
        </div>
    </div>

    <div class="admin-card p-8">
        <div class="grid grid-cols-1 xl:grid-cols-5 gap-4 text-[12px] uppercase tracking-[.16em] font-extrabold text-slate-400 border-b border-slate-200 bg-[#FBFBFB]">
            <div>Tanggal</div>
            <div>Akun</div>
            <div>Caption</div>
            <div>Hashtag</div>
            <div class="text-right">Aksi</div>
        </div>

        @foreach($data as $item)
            <div class="grid grid-cols-1 xl:grid-cols-5 gap-4 px-8 py-7 items-center border-b border-slate-200 last:border-b-0 bg-white">
                <div class="text-[18px] font-extrabold text-[#083B6E]">{{ $item['date'] }}</div>
                <div>{{ $item['account'] }}</div>
                <div>{{ $item['caption'] }}</div>
                <div>{{ $item['hashtags'] }}</div>
                <div class="text-right">
                    <a href="{{ route('admin.input') }}" class="inline-flex items-center gap-2 text-[#2E7D32] hover:text-[#0B5B94]">
                        <img src="{{ asset('storage/edit-icon.png') }}" alt="Edit" class="w-5 h-5 object-contain">
                        <span class="text-[15px] font-extrabold">Edit</span>
                    </a>
                    <span class="inline-flex items-center gap-2 text-[#D45F5F] hover:text-[#0B5B94] cursor-pointer">
                        <img src="{{ asset('storage/delete-icon.png') }}" alt="Delete" class="w-5 h-5 object-contain">
                        <span class="text-[15px] font-extrabold">Hapus</span>
                    </span>
                </div>
            </div>
        @endforeach
    </div>
</section>

<section class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-8">
    <div class="admin-card p-8">
        <h3 class="text-[20px] font-extrabold text-[#083B6E] mb-5">Ringkasan Aktivitas Terbaru</h3>
        <div class="grid grid-cols-2 gap-4">
            <div class="text-[14px] font-extrabold text-slate-500">ENTRY BULAN INI</div>
            <div class="text-[18px] font-extrabold text-[#083B6E]">158 <span class="text-[#2E7D32]">+12%</span></div>
        </div>
        <div class="grid grid-cols-2 gap-4 mt-5">
            <div class="text-[14px] font-extrabold text-slate-500">TOTAL INTERAKSI</div>
            <div class="text-[18px] font-extrabold text-[#083B6E]">42.5K</div>
        </div>
    </div>

    <div class="admin-card p-8">
        <h3 class="text-[20px] font-extrabold text-[#083B6E] mb-5">Trend Meningkat</h3>
        <div class="inline-flex items-center gap-3 text-[16px] font-extrabold text-[#083B6E] hover:opacity-80 transition">
            <img src="{{ asset('storage/hashtag-icon.png') }}" alt="Hashtag" class="w-4 h-4 object-contain">
            <span>#PeduliSungai</span>
        </div>
    </div>
</section>
@endsection