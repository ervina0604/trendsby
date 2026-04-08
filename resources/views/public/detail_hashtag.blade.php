@extends('layouts.app')

@section('title','Dataset Hashtag')

@section('content')

<!-- HEADER -->
<section class="mb-8">
    <h1 class="text-[32px] font-extrabold text-[#083B6E] mb-2">
        Dataset Hashtag Lengkap
    </h1>
    <p class="text-gray-500">
        Data frekuensi hashtag terkait Sungai Surabaya
    </p>
</section>


<!-- SEARCH & FILTER -->
<div class="flex flex-col lg:flex-row gap-4 justify-between mb-6">

    <!-- SEARCH -->
    <div class="flex items-center bg-white rounded-full px-5 py-3 w-full lg:max-w-xl shadow-sm border">
        <img src="{{ asset('storage/hashtag.png') }}" class="w-5 h-5 mr-3 opacity-60">
        <input type="text" placeholder="Cari hashtag spesifik..."
            class="w-full outline-none text-sm">
    </div>

    <!-- FILTER -->
    <div class="flex items-center gap-3">

        <select class="bg-white border rounded-full px-4 py-2 text-sm shadow-sm">
            <option>Bulanan</option>
            <option>Mingguan</option>
        </select>

        <button class="w-10 h-10 rounded-full bg-[#0B5B94] flex items-center justify-center shadow">
            <img src="{{ asset('storage/filter.png') }}" class="w-5 h-5">
        </button>

    </div>

</div>


<!-- TABLE -->
<div class="bg-white rounded-[28px] overflow-hidden border border-gray-100 shadow-sm">

    <table class="w-full text-sm">

        <!-- HEAD -->
        <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
            <tr>
                <th class="px-6 py-4 text-left">Rank</th>
                <th class="px-6 py-4 text-left">Hashtag</th>
                <th class="px-6 py-4 text-left">Jumlah</th>
                <th class="px-6 py-4 text-left">Tren</th>
                <th class="px-6 py-4 text-left">Periode</th>
            </tr>
        </thead>

        <!-- BODY -->
        <tbody class="divide-y">

            @php
            $data = [
                ['#sungaisurabaya',90,'naik','+12%'],
                ['#pedulisungai',25,'stabil','stabil'],
                ['#ecoton',19,'naik','+4%'],
                ['#pencemaran',18,'turun','-2%'],
                ['#plastik',25,'turun','-2%'],
                ['#aksibersih',20,'naik','+5%'],
                ['#surabayasehat',18,'turun','-2%'],
                ['#daruratplastik',12,'turun','-3%'],
                ['#sungailestari',14,'naik','+3%'],
            ];
            @endphp

            @foreach($data as $i => $row)
            <tr class="hover:bg-gray-50">

                <!-- RANK -->
                <td class="px-6 py-4 font-semibold text-gray-600">
                    {{ str_pad($i+1,2,'0',STR_PAD_LEFT) }}
                </td>

                <!-- HASHTAG -->
                <td class="px-6 py-4 font-bold text-[#083B6E]">
                    {{ $row[0] }}
                </td>

                <!-- JUMLAH -->
                <td class="px-6 py-4">
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">
                        {{ $row[1] }}
                    </span>
                </td>

                <!-- TREN -->
                <td class="px-6 py-4 flex items-center gap-2 font-semibold">

                    @if($row[1] == 'stabil' || $row[2] == 'stabil')
                        <img src="{{ asset('storage/stabil.png') }}" class="w-4 h-4">
                        <span class="text-gray-400">stabil</span>

                    @elseif($row[2] == 'naik')
                        <img src="{{ asset('storage/naik.png') }}" class="w-4 h-4">
                        <span class="text-green-600">{{ $row[3] }}</span>

                    @else
                        <img src="{{ asset('storage/turun.png') }}" class="w-4 h-4">
                        <span class="text-red-500">{{ $row[3] }}</span>
                    @endif

                </td>

                <!-- PERIODE -->
                <td class="px-6 py-4 text-gray-400">
                    Mei
                </td>

            </tr>
            @endforeach

        </tbody>

    </table>

</div>


<!-- PAGINATION -->
<div class="flex items-center justify-between mt-6 text-sm text-gray-500">

    <span>&lt; Sebelumnya</span>

    <div class="flex gap-2">
        <span class="w-8 h-8 flex items-center justify-center rounded bg-gray-200">1</span>
        <span class="w-8 h-8 flex items-center justify-center">2</span>
        <span class="w-8 h-8 flex items-center justify-center">3</span>
        <span class="w-8 h-8 flex items-center justify-center">4</span>
        <span class="w-8 h-8 flex items-center justify-center">5</span>
    </div>

    <span>Selanjutnya &gt;</span>

</div>


<!-- INSIGHT CARDS -->
<div class="grid md:grid-cols-3 gap-6 mt-10">

    <!-- INSIGHT -->
    <div class="bg-white p-6 rounded-2xl border shadow-sm">
        <div class="flex items-center gap-3 mb-3">
            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                <img src="{{ asset('storage/analisis.png') }}" class="w-5 h-5">
            </div>
            <h3 class="font-bold text-[#083B6E]">
                Insight Utama
            </h3>
        </div>

        <p class="text-sm text-gray-500 leading-6">
            Peningkatan hashtag <b>#sungaisurabaya</b> berkorelasi langsung dengan kampanye pembersihan sungai minggu lalu.
        </p>
    </div>

    <!-- AKTIVITAS -->
    <div class="bg-white p-6 rounded-2xl border shadow-sm">
        <div class="flex items-center gap-3 mb-3">
            <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center">
                <img src="{{ asset('storage/share.png') }}" class="w-5 h-5">
            </div>
            <h3 class="font-bold text-[#083B6E]">
                Aktivitas Komunitas
            </h3>
        </div>

        <p class="text-sm text-gray-500 leading-6">
            Lebih dari 2.400 user aktif menggunakan hashtag terkait lingkungan di wilayah Surabaya Timur.
        </p>
    </div>

    <!-- EXPORT -->
    <div class="bg-white p-6 rounded-2xl border shadow-sm">
        <div class="flex items-center gap-3 mb-3">
            <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center">
                <img src="{{ asset('storage/export.png') }}" class="w-5 h-5">
            </div>
            <h3 class="font-bold text-[#083B6E]">
                Ekspor Dataset
            </h3>
        </div>

        <button class="mt-4 w-full bg-gray-100 hover:bg-gray-200 text-gray-600 py-2 rounded-full text-sm font-semibold">
            Unduh CSV/Excel
        </button>
    </div>

</div>

@endsection