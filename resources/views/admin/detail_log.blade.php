@extends('layouts.admin')

@section('title','Detail Log Import')
@section('header_title','Import Otomatis')

@php
    $rows = [
        ['date' => '04 April 2026', 'time' => '08:00', 'source' => 'Peduli Sungai Surabaya', 'username' => '@pedulisungaisurabaya', 'new_posts' => 3, 'status' => 'Berhasil', 'status_type' => 'success'],
        ['date' => '03 April 2026', 'time' => '08:00', 'source' => 'Ecoton', 'username' => '@ecoton', 'new_posts' => 2, 'status' => 'Berhasil', 'status_type' => 'success'],
        ['date' => '02 April 2026', 'time' => '08:00', 'source' => 'Peduli Sungai Surabaya', 'username' => '@pedulisungaisurabaya', 'new_posts' => 0, 'status' => 'Berhasil', 'status_type' => 'success'],
        ['date' => '01 April 2026', 'time' => '08:00', 'source' => 'Ecoton', 'username' => '@ecoton', 'new_posts' => 1, 'status' => 'Berhasil', 'status_type' => 'success'],
        ['date' => '31 Maret 2026', 'time' => '08:00', 'source' => 'Peduli Sungai Surabaya', 'username' => '@pedulisungaisurabaya', 'new_posts' => 0, 'status' => 'Berhasil', 'status_type' => 'success'],
        ['date' => '30 Maret 2026', 'time' => '08:00', 'source' => 'Ecoton', 'username' => '@ecoton', 'new_posts' => 0, 'status' => 'Gagal', 'status_type' => 'danger'],
    ];
@endphp

@section('content')

<section class="mb-10">
    <div class="flex flex-col xl:flex-row xl:items-end xl:justify-between gap-5">
        <div>
            <div class="text-[18px] uppercase tracking-[.16em] font-extrabold text-[#2E7D32] mb-4">
                IMPORT ACTIVITY
            </div>

            <h2 class="text-[58px] leading-[1.04] font-extrabold text-[#083B6E] tracking-[-0.05em] mb-3">
                Detail Log Sinkronisasi
            </h2>

            <p class="text-[18px] text-slate-600">
                Riwayat lengkap proses pengambilan data otomatis.
            </p>
        </div>

        <a href="{{ route('admin.import') }}"
           class="inline-flex items-center gap-3 h-[50px] px-6 rounded-full bg-white border border-slate-200 text-[#083B6E] text-[16px] font-extrabold hover:bg-slate-50 transition">
            <img src="{{ asset('storage/filter.png') }}" alt="Back" class="w-4 h-4 object-contain">
            Kembali ke Import
        </a>
    </div>
</section>

<section class="admin-card p-5 mb-8">
    <div class="grid grid-cols-1 xl:grid-cols-[1fr_220px_220px] gap-4">
        <div class="h-[56px] rounded-full bg-[#F4F6F8] px-6 flex items-center gap-4">
            <img src="{{ asset('storage/pencarian.png') }}" alt="Cari" class="w-5 h-5 object-contain opacity-60">
            <input type="text" placeholder="Cari akun atau tanggal log..." class="w-full bg-transparent outline-none text-[16px] text-slate-700 placeholder:text-slate-400">
        </div>

        <button class="h-[56px] rounded-full border border-slate-200 bg-white px-6 text-[16px] font-semibold text-slate-600 hover:bg-slate-50 transition">
            Filter Tanggal
        </button>

        <button class="h-[56px] rounded-full border border-slate-200 bg-white px-6 text-[16px] font-semibold text-slate-600 hover:bg-slate-50 transition">
            Filter Status
        </button>
    </div>
</section>

<section class="admin-card overflow-hidden mb-8">
    <div class="grid grid-cols-[220px_120px_1.3fr_180px_170px] px-8 py-5 text-[12px] uppercase tracking-[.16em] font-extrabold text-slate-400 border-b border-slate-200 bg-[#FBFBFB]">
        <div>Tanggal</div>
        <div>Jam</div>
        <div>Akun Sumber</div>
        <div>Post Baru</div>
        <div class="text-right">Status</div>
    </div>

    @foreach($rows as $row)
        <div class="grid grid-cols-[220px_120px_1.3fr_180px_170px] px-8 py-7 items-center border-b border-slate-200 last:border-b-0 bg-white">
            <div class="text-[18px] font-extrabold text-[#083B6E]">
                {{ $row['date'] }}
            </div>

            <div class="text-[16px] font-bold text-slate-500">
                {{ $row['time'] }}
            </div>

            <div>
                <div class="text-[18px] font-extrabold text-[#202020]">{{ $row['source'] }}</div>
                <div class="text-[15px] text-slate-500">{{ $row['username'] }}</div>
            </div>

            <div>
                <span class="inline-flex items-center justify-center min-w-[44px] h-[42px] px-4 rounded-full bg-[#EEF1F3] text-[#083B6E] font-extrabold text-[18px]">
                    {{ $row['new_posts'] }}
                </span>
            </div>

            <div class="text-right">
                @if($row['status_type'] === 'success')
                    <span class="inline-flex items-center gap-2 px-5 h-[38px] rounded-full bg-[#E4F1E7] text-[#2E7D32] font-extrabold text-[15px]">
                        <img src="{{ asset('storage/berhasil.png') }}" alt="Berhasil" class="w-4 h-4 object-contain">
                        {{ $row['status'] }}
                    </span>
                @else
                    <span class="inline-flex items-center gap-2 px-5 h-[38px] rounded-full bg-[#FDE8E8] text-[#DC2626] font-extrabold text-[15px]">
                        <img src="{{ asset('storage/dont.png') }}" alt="Gagal" class="w-4 h-4 object-contain">
                        {{ $row['status'] }}
                    </span>
                @endif
            </div>
        </div>
    @endforeach
</section>

<section class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-5">
    <div class="text-[15px] text-slate-500">
        Menampilkan 6 log sinkronisasi terbaru.
    </div>

    <div class="flex items-center gap-3">
        <button class="w-[38px] h-[38px] rounded-full bg-white border border-slate-200 text-slate-500 font-bold hover:bg-slate-50 transition">1</button>
        <button class="w-[38px] h-[38px] rounded-full bg-[#083B6E] text-white font-bold">2</button>
        <button class="w-[38px] h-[38px] rounded-full bg-white border border-slate-200 text-slate-500 font-bold hover:bg-slate-50 transition">3</button>
    </div>
</section>

@endsection