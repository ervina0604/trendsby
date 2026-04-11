@extends('layouts.admin')

@section('title','Import Otomatis')
@section('header_title','Import Otomatis')

@php
    $logs = [
        [
            'date' => '04 April 2026',
            'account_name' => 'Peduli Sungai Surabaya',
            'account_username' => '@pedulisungaisurabaya',
            'account_code' => 'P',
            'account_bg' => 'bg-[#CFE1F7]',
            'posts' => 3,
            'status' => 'Berhasil',
            'status_bg' => 'bg-[#E4F1E7]',
            'status_text' => 'text-[#2E7D32]',
        ],
        [
            'date' => '03 April 2026',
            'account_name' => 'Ecoton',
            'account_username' => '@ecoton',
            'account_code' => 'E',
            'account_bg' => 'bg-[#97E082]',
            'posts' => 2,
            'status' => 'Berhasil',
            'status_bg' => 'bg-[#E4F1E7]',
            'status_text' => 'text-[#2E7D32]',
        ],
        [
            'date' => '02 April 2026',
            'account_name' => 'Peduli Sungai Surabaya',
            'account_username' => '@pedulisungaisurabaya',
            'account_code' => 'P',
            'account_bg' => 'bg-[#CFE1F7]',
            'posts' => 0,
            'status' => 'Berhasil',
            'status_bg' => 'bg-[#E4F1E7]',
            'status_text' => 'text-[#2E7D32]',
        ],
    ];
@endphp

@section('content')

<section class="grid grid-cols-1 xl:grid-cols-[1.9fr_.9fr] gap-6 mb-12 items-start">
    <div class="admin-card p-8 xl:p-10 min-h-[270px] relative overflow-hidden">
        <div class="inline-flex items-center gap-2 h-[38px] px-5 rounded-full bg-[#97E082] text-[#2E7D32] text-[15px] font-extrabold uppercase tracking-[.04em] mb-7">
            <span class="w-2.5 h-2.5 rounded-full bg-[#2E7D32]"></span>
            SISTEM BERJALAN NORMAL
        </div>

        <h2 class="text-[58px] leading-[1.04] font-extrabold text-[#083B6E] tracking-[-0.05em] mb-7">
            Status Sinkronisasi<br>Instagram
        </h2>

        <div class="space-y-4">
            <div class="flex items-center gap-4">
                <img src="{{ asset('storage/jam.png') }}" alt="Update" class="w-6 h-6 object-contain">
                <span class="text-[18px] text-slate-600">Terakhir update: 4 April 2026, 08:00</span>
            </div>

            <div class="flex items-center gap-4">
                <img src="{{ asset('storage/berhasil.png') }}" alt="Berhasil" class="w-6 h-6 object-contain">
                <span class="text-[18px] font-bold text-[#2E7D32]">5 posting baru berhasil ditambahkan</span>
            </div>
        </div>

        <div class="absolute right-8 top-1/2 -translate-y-1/2">
            <button class="h-[112px] px-10 rounded-full bg-[#063A67] text-white text-[20px] font-extrabold shadow-[0_14px_28px_rgba(6,58,103,0.18)] hover:opacity-95 transition inline-flex items-center gap-4">
                <img src="{{ asset('storage/sysnc.png') }}" alt="Sync" class="w-7 h-7 object-contain brightness-0 invert">
                <span>Ambil Data<br>Terbaru</span>
            </button>
        </div>

        <img src="{{ asset('storage/archive.png') }}" alt="Decorative" class="absolute right-12 top-10 w-[140px] opacity-[.06] object-contain">
    </div>

    <div class="admin-card p-8 min-h-[270px]">
        <div class="text-[14px] uppercase tracking-[.16em] font-extrabold text-[#7C8AA0] mb-6">
            METRIK TERKINI
        </div>

        <div class="flex items-end gap-3 mb-6">
            <div class="text-[72px] leading-none font-extrabold text-[#083B6E] tracking-[-0.05em]">94%</div>
            <div class="text-[26px] font-extrabold text-[#2E7D32] pb-3">+2%</div>
        </div>

        <p class="text-[18px] leading-[1.8] text-slate-600 mb-10">
            Keandalan scheduler pengambilan data otomatis dalam 30 hari terakhir.
            Performa optimal terdeteksi.
        </p>

        <div class="border-t border-slate-200 pt-8 flex items-center justify-between">
            <span class="text-[15px] font-bold text-slate-500">SURA SCHEDULER V2.4</span>
            <span class="text-[15px] font-extrabold text-[#2E7D32]">ACTIVE</span>
        </div>
    </div>
</section>

<section class="mb-8">
    <div class="flex items-end justify-between gap-4 mb-6">
        <div>
            <h2 class="text-[46px] leading-none font-extrabold text-[#083B6E] tracking-[-0.04em] mb-3">
                Riwayat Import
            </h2>
            <p class="text-[18px] text-slate-600">
                Log sinkronisasi data dari berbagai kanal media sosial.
            </p>
        </div>

        <a href="{{ route('admin.detail_log') }}"
           class="inline-flex items-center gap-3 text-[16px] font-extrabold text-[#083B6E] hover:opacity-80 transition">
            Lihat Semua Log
            <img src="{{ asset('storage/naik.png') }}" alt="Arrow" class="w-4 h-4 object-contain">
        </a>
    </div>

    <div class="admin-card overflow-hidden">
        <div class="grid grid-cols-[220px_1.4fr_220px_170px] px-8 py-5 text-[12px] uppercase tracking-[.16em] font-extrabold text-slate-400 border-b border-slate-200 bg-[#FBFBFB]">
            <div>Tanggal Import</div>
            <div>Akun Sumber</div>
            <div>Jumlah Post Baru</div>
            <div class="text-right">Status</div>
        </div>

        @foreach($logs as $log)
            <div class="grid grid-cols-[220px_1.4fr_220px_170px] px-8 py-7 items-center border-b border-slate-200 last:border-b-0 bg-white">
                <div class="text-[18px] font-extrabold text-[#083B6E]">
                    {{ $log['date'] }}
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-[46px] h-[46px] rounded-[12px] {{ $log['account_bg'] }} flex items-center justify-center text-[#083B6E] font-extrabold">
                        {{ $log['account_code'] }}
                    </div>
                    <div>
                        <div class="text-[18px] font-extrabold text-[#202020]">{{ $log['account_name'] }}</div>
                        <div class="text-[15px] text-slate-500">{{ $log['account_username'] }}</div>
                    </div>
                </div>

                <div>
                    <span class="inline-flex items-center justify-center w-[42px] h-[42px] rounded-full bg-[#EEF1F3] text-[#083B6E] font-extrabold text-[18px]">
                        {{ $log['posts'] }}
                    </span>
                </div>

                <div class="text-right">
                    <span class="inline-flex items-center gap-2 px-5 h-[38px] rounded-full {{ $log['status_bg'] }} {{ $log['status_text'] }} font-extrabold text-[15px]">
                        <img src="{{ asset('storage/berhasil.png') }}" alt="Status" class="w-4 h-4 object-contain">
                        {{ $log['status'] }}
                    </span>
                </div>
            </div>
        @endforeach
    </div>
</section>

<section class="pt-8 border-t border-slate-200 flex flex-col xl:flex-row xl:items-center xl:justify-between gap-5">
    <div class="inline-flex items-center gap-4 h-[54px] px-6 rounded-full bg-[#EEF0F2] text-[18px] text-slate-600">
        <img src="{{ asset('storage/comment.png') }}" alt="Info" class="w-5 h-5 object-contain">
        Sistem mengambil data otomatis 1 kali sehari melalui scheduler.
    </div>

    <div class="text-[14px] uppercase tracking-[.14em] font-extrabold text-slate-500">
        © 2026 SURATREND ANALYTICS SYSTEM. ALL RIGHTS RESERVED.
    </div>
</section>

@endsection