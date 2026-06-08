@extends('layouts.app')

@section('title', $sungai['nama'])

@section('content')

<link rel="stylesheet"
href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

<section>

    {{-- HERO --}}
    <div class="relative">

        <img
            src="{{ asset('storage/'.$sungai['foto']) }}"
            alt="{{ $sungai['nama'] }}"
            class="w-full h-[550px] object-cover">

        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent"></div>

        <div class="absolute bottom-12 left-12 text-white">

            <span class="bg-yellow-500 px-5 py-2 rounded-full font-semibold">
                {{ $sungai['status'] }}
            </span>

            <h1 class="text-7xl font-black mt-4">
                {{ $sungai['nama'] }}
            </h1>

            <p class="text-xl mt-2 opacity-90">
                {{ $sungai['lokasi'] }}
            </p>

        </div>

    </div>

    <div class="max-w-7xl mx-auto px-6 -mt-16 relative z-20">

        {{-- INFO CARD --}}
        <div class="grid md:grid-cols-3 gap-6">

            <div class="bg-white rounded-3xl p-6 shadow-lg">

                <div class="text-gray-500 text-sm">
                    STATUS ANALISIS
                </div>

                <div class="text-3xl font-bold text-yellow-600 mt-3">
                    {{ $sungai['status'] }}
                </div>

            </div>

            <div class="bg-white rounded-3xl p-6 shadow-lg">

                <div class="text-gray-500 text-sm">
                    KOORDINAT
                </div>

                <div class="font-bold mt-3">
                    {{ $sungai['lat'] }},
                    {{ $sungai['lng'] }}
                </div>

            </div>

            <div class="bg-white rounded-3xl p-6 shadow-lg">

                <div class="text-gray-500 text-sm">
                    KATEGORI DATA
                </div>

                <div class="font-bold mt-3 text-[#04543D]">
                    Data Sungai Surabaya
                </div>

            </div>

        </div>

        {{-- CONTENT --}}
        <div class="grid lg:grid-cols-[1fr_420px] gap-8 mt-10">

            {{-- LEFT --}}
            <div class="space-y-8">

                <div class="bg-white rounded-3xl shadow-lg p-8">

                    <h2 class="text-3xl font-bold text-[#04543D]">
                        Deskripsi Sungai
                    </h2>

                    <p class="text-gray-600 mt-6 leading-relaxed text-lg">
                        {{ $sungai['deskripsi'] }}
                    </p>

                </div>

                <div class="bg-gradient-to-r from-[#04543D] to-[#0f766e] rounded-3xl p-8 text-white">

                    <h2 class="text-3xl font-bold">
                        Insight AI
                    </h2>

                    <p class="mt-5 leading-relaxed">

                        Data media sosial dan hasil scraping untuk
                        <b>{{ $sungai['nama'] }}</b>
                        masih dalam proses pengumpulan.

                        Setelah proses analisis SAW dan klasifikasi selesai,
                        sistem akan menampilkan skor prioritas, tren pembahasan,
                        tingkat pencemaran, serta rekomendasi penanganan otomatis.

                    </p>

                </div>

                <div class="bg-white rounded-3xl shadow-lg p-8">

                    <h2 class="text-3xl font-bold text-[#04543D]">
                        Informasi Monitoring
                    </h2>

                    <div class="mt-6 space-y-4">

                        <div class="flex justify-between">
                            <span>Dokumentasi Tersimpan</span>
                            <span class="font-bold">Menunggu Scraping</span>
                        </div>

                        <div class="flex justify-between">
                            <span>Pembahasan Media Sosial</span>
                            <span class="font-bold">Menunggu Analisis</span>
                        </div>

                        <div class="flex justify-between">
                            <span>Priority Score</span>
                            <span class="font-bold text-yellow-600">
                                Belum Tersedia
                            </span>
                        </div>

                    </div>

                </div>

            </div>

            {{-- RIGHT --}}
            <div class="space-y-8">

                <div class="bg-white rounded-3xl p-5 shadow-lg">

                    <div
                        id="map"
                        class="h-[400px] rounded-2xl">
                    </div>

                </div>

                <div class="bg-white rounded-3xl p-8 shadow-lg">

                    <h3 class="text-2xl font-bold text-[#04543D]">
                        Detail Lokasi
                    </h3>

                    <div class="mt-6 space-y-5">

                        <div>
                            <div class="text-gray-500 text-sm">
                                Nama Sungai
                            </div>

                            <div class="font-semibold">
                                {{ $sungai['nama'] }}
                            </div>
                        </div>

                        <div>
                            <div class="text-gray-500 text-sm">
                                Wilayah
                            </div>

                            <div class="font-semibold">
                                {{ $sungai['lokasi'] }}
                            </div>
                        </div>

                        <div>
                            <div class="text-gray-500 text-sm">
                                Latitude
                            </div>

                            <div class="font-semibold">
                                {{ $sungai['lat'] }}
                            </div>
                        </div>

                        <div>
                            <div class="text-gray-500 text-sm">
                                Longitude
                            </div>

                            <div class="font-semibold">
                                {{ $sungai['lng'] }}
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- GALLERY --}}
        <h2 class="text-4xl font-bold mt-16 mb-8 text-[#04543D]">
            Dokumentasi
        </h2>

        <div class="bg-white rounded-3xl shadow-lg p-12 text-center">

            <div class="text-6xl mb-4">
                📷
            </div>

            <h3 class="text-2xl font-bold">
                Dokumentasi Belum Tersedia
            </h3>

            <p class="text-gray-500 mt-3">
                Dokumentasi akan muncul otomatis setelah proses scraping selesai.
            </p>

        </div>

        <div class="flex justify-between mt-12 mb-20">

            <a
                href="{{ route('peta') }}"
                class="bg-gray-200 px-8 py-4 rounded-xl font-semibold">

                ← Kembali ke Peta

            </a>

            <a
                href="{{ route('prioritas') }}"
                class="bg-[#04543D] text-white px-8 py-4 rounded-xl font-semibold">

                Lihat Prioritas →

            </a>

        </div>

    </div>

</section>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function(){

    const map = L.map('map').setView(
    [
        {{ $sungai['lat'] }},
        {{ $sungai['lng'] }}
    ],
    13
    );

    L.tileLayer(
    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    {
        attribution:'© OpenStreetMap'
    }
    ).addTo(map);

    L.marker(
    [
        {{ $sungai['lat'] }},
        {{ $sungai['lng'] }}
    ])
    .addTo(map)
    .bindPopup(`
        <b>{{ $sungai['nama'] }}</b><br>
        {{ $sungai['lokasi'] }}
    `)
    .openPopup();

    L.circle(
    [
        {{ $sungai['lat'] }},
        {{ $sungai['lng'] }}
    ],
    {
        radius:1000,
        color:'#04543D',
        fillColor:'#04543D',
        fillOpacity:0.15
    }
    ).addTo(map);

});

</script>

@endsection