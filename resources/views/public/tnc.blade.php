@extends('layouts.app')

@section('title','Terms and Conditions')

@php
    $terms = [
        ['icon'=>'check.png','text'=>'Data yang disajikan bersifat informatif dan untuk tujuan edukasi.','color'=>'green'],
        ['icon'=>'check.png','text'=>'Pengguna tidak diperkenankan menyalin atau mendistribusikan data secara massal.','color'=>'green'],
        ['icon'=>'check.png','text'=>'Data boleh digunakan untuk referensi pribadi dengan atribusi yang jelas.','color'=>'green'],
        ['icon'=>'close.png','text'=>'Pengambilan data otomatis seperti scraping atau crawling dilarang keras.','color'=>'red'],
        ['icon'=>'close.png','text'=>'Dilarang menggunakan ulang data untuk sistem atau platform lain.','color'=>'red'],
        ['icon'=>'setting.png','text'=>'Admin bertanggung jawab memastikan data yang diinput akurat.','color'=>'blue'],
        ['icon'=>'close.png','text'=>'Sistem tidak boleh digunakan untuk aktivitas ilegal atau merugikan.','color'=>'red'],
    ];

    $privacy = [
        'Tidak mengumpulkan data pribadi sensitif pengguna.',
        'Data penggunaan dasar dapat dikumpulkan untuk peningkatan sistem.',
        'Data admin disimpan aman hanya untuk keperluan autentikasi.',
    ];
@endphp

@section('content')

<!-- HEADER -->
<section class="mb-12">

    <div class="flex items-center justify-between flex-wrap gap-4">

        <div>
            <h1 class="text-[48px] font-extrabold text-[#083B6E] mb-4">
                Terms & Conditions
            </h1>

            <p class="text-lg text-slate-500 max-w-2xl">
                Dengan mengakses dan menggunakan SuraTrend, Anda setuju untuk mematuhi ketentuan yang berlaku berikut ini.
            </p>
        </div>

        <div class="flex items-center gap-2 bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">
            <img src="{{ asset('storage/live.png') }}" class="w-4 h-4">
            Rilis Terbaru
        </div>

    </div>

</section>


<!-- MAIN GRID -->
<section class="grid lg:grid-cols-[1.6fr_1fr] gap-8 mb-10">

    <!-- LEFT -->
    <div class="bg-white rounded-[28px] p-8 border border-gray-100 shadow-sm">

        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 flex items-center justify-center bg-blue-100 rounded-xl">
                <img src="{{ asset('storage/shield.png') }}" class="w-5 h-5">
            </div>
            <h2 class="text-xl font-bold text-[#083B6E]">
                Ketentuan Penggunaan
            </h2>
        </div>

        <ul class="space-y-5 text-gray-600 leading-7">

            @foreach($terms as $item)
                <li class="flex gap-3 items-start">

                    <img src="{{ asset('storage/'.$item['icon']) }}"
                         class="w-5 h-5 mt-1
                         {{ $item['color']=='green' ? 'opacity-100' : '' }}
                         {{ $item['color']=='red' ? 'opacity-90' : '' }}
                         {{ $item['color']=='blue' ? 'opacity-80' : '' }}">

                    <span>{{ $item['text'] }}</span>

                </li>
            @endforeach

        </ul>

    </div>


    <!-- RIGHT -->
    <div class="bg-white rounded-[28px] p-8 border border-gray-100 shadow-sm">

        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 flex items-center justify-center bg-slate-100 rounded-xl">
                <img src="{{ asset('storage/info.png') }}" class="w-5 h-5">
            </div>
            <h2 class="text-lg font-bold text-[#083B6E]">
                Cakupan Sistem
            </h2>
        </div>

        <div class="text-sm text-gray-500 mb-4 uppercase tracking-widest">
            PEMBERITAHUAN
        </div>

        <p class="text-gray-600 text-sm leading-7 mb-4">
            SuraTrend tidak menggunakan API resmi Instagram. Semua data diinput secara manual oleh admin.
        </p>

        <p class="text-gray-600 text-sm leading-7 mb-6">
            Sistem ini berfokus pada <span class="text-green-600 font-semibold">dokumentasi tren dan analisis</span>, bukan prediksi.
        </p>

        <img src="{{ asset('storage/grafik.png') }}"
             class="rounded-xl w-full shadow-sm">

    </div>

</section>


<!-- BOTTOM -->
<section class="grid md:grid-cols-2 gap-6">

    <!-- DISCLAIMER -->
    <div class="bg-[#F4D7C1] rounded-[28px] p-8 text-[#5A3A1A]">

        <div class="flex items-center gap-3 mb-4">
            <div class="bg-[#8B5E34] w-10 h-10 flex items-center justify-center rounded-xl">
                <img src="{{ asset('storage/warning.png') }}" class="w-5 h-5">
            </div>
            <h3 class="font-bold text-lg">
                Disclaimer
            </h3>
        </div>

        <p class="text-sm leading-7 mb-4">
            Semua data dan hasil analisis disediakan "apa adanya" tanpa jaminan apapun.
        </p>

        <p class="text-sm leading-7 mb-4">
            SuraTrend tidak bertanggung jawab atas kesalahan atau keputusan yang diambil berdasarkan data.
        </p>

        <div class="border-t border-[#d1b59f] pt-4 text-sm">
            Sistem ini bertujuan mendukung analisis, bukan menggantikan keputusan profesional.
        </div>

    </div>


    <!-- PRIVACY -->
    <div class="bg-white rounded-[28px] p-8 border border-gray-100">

        <div class="flex items-center gap-3 mb-4">
            <div class="bg-green-100 w-10 h-10 flex items-center justify-center rounded-xl">
                <img src="{{ asset('storage/lock.png') }}" class="w-5 h-5">
            </div>
            <h3 class="font-bold text-lg text-[#083B6E]">
                Kebijakan Privasi
            </h3>
        </div>

        <ul class="text-sm text-gray-600 space-y-3 leading-7">
            @foreach($privacy as $item)
                <li class="flex gap-2 items-start">
                    <img src="{{ asset('storage/dot.png') }}" class="w-3 h-3 mt-2">
                    <span>{{ $item }}</span>
                </li>
            @endforeach
        </ul>

    </div>

</section>

@endsection