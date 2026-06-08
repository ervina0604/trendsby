@extends('layouts.app')

@section('title', $sungai['nama'])

@section('content')

<link rel="stylesheet"
href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

<style>
body {
    background:
        radial-gradient(circle at top left, rgba(126,240,200,.12), transparent 35%),
        radial-gradient(circle at top right, rgba(255,255,255,.03), transparent 40%),
        #2B5748;
}

.glass-card {
    background: rgba(255,255,255,.06);
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
    border: 1px solid rgba(255,255,255,.10);
    border-radius: 32px;
    box-shadow: 0 20px 60px rgba(0,0,0,.12);
}

.text-muted {
    color: rgba(255,255,255,.72);
}

.text-soft {
    color: rgba(255,255,255,.85);
}

.btn-light {
    background: rgba(255,255,255,.10);
    color: white;
    border: 1px solid rgba(255,255,255,.15);
}

.btn-light:hover {
    background: rgba(255,255,255,.16);
}

.btn-accent {
    background: #04543D;
    color: white;
}

.btn-accent:hover {
    background: #0b5135;
}
</style>

<section>

    {{-- HERO --}}
    <div class="relative">

        <img
            src="{{ $sungai['foto'] }}"
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

            <div class="glass-card p-6">

                <div class="text-white/60 text-sm">
                    STATUS ANALISIS
                </div>

                <div class="text-3xl font-bold text-yellow-400 mt-3">
                    {{ $sungai['status'] }}
                </div>

            </div>

            <div class="glass-card p-6">

                <div class="text-white/60 text-sm">
                    KOORDINAT
                </div>

                <div class="font-bold mt-3 text-white">
                    {{ $sungai['lat'] }},
                    {{ $sungai['lng'] }}
                </div>

            </div>

            <div class="glass-card p-6">

                <div class="text-white/60 text-sm">
                    KATEGORI DATA
                </div>

                <div class="font-bold mt-3 text-[#7EF0C8]">
                    Data Sungai Surabaya
                </div>

            </div>

        </div>

        {{-- CONTENT --}}
        <div class="grid lg:grid-cols-[1fr_420px] gap-8 mt-10">

            {{-- LEFT --}}
            <div class="space-y-8">

                <div class="glass-card p-8">

                    <h2 class="text-3xl font-bold text-white">
                        Deskripsi Sungai
                    </h2>

                    <p class="text-white/75 mt-6 leading-relaxed text-lg">
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

                <div class="glass-card p-8">

                    <h2 class="text-3xl font-bold text-white">
                        Informasi Monitoring
                    </h2>

                    <div class="mt-6 space-y-4 text-white/80">

                        <div class="flex justify-between">
                            <span>Dokumentasi Tersimpan</span>
                            <span class="font-bold text-white">
                                {{ $sungai['jumlah_galeri'] }}
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span>Pembahasan Media Sosial</span>
                            <span class="font-bold text-white">
                                {{ $sungai['jumlah_post'] }}
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span>Priority Score</span>
                            <span class="font-bold text-yellow-400">
                                {{ $sungai['score'] }}
                            </span>
                        </div>

                    </div>

                </div>

            </div>

            {{-- RIGHT --}}
            <div class="space-y-8">

<div class="glass-card p-5">

                    <div
                        id="map"
                        class="h-[400px] rounded-2xl">
                    </div>

                </div>

                <div class="glass-card p-8">

                    <h3 class="text-2xl font-bold text-white">
                        Detail Lokasi
                    </h3>

                    <div class="mt-6 space-y-5">

                        <div>
                            <div class="text-white/60 text-sm">
                                Nama Sungai
                            </div>

                            <div class="font-semibold text-white">
                                {{ $sungai['nama'] }}
                            </div>
                        </div>

                        <div>
                            <div class="text-white/60 text-sm">
                                Wilayah
                            </div>

                            <div class="font-semibold text-white">
                                {{ $sungai['lokasi'] }}
                            </div>
                        </div>

                        <div>
                            <div class="text-white/60 text-sm">
                                Latitude
                            </div>

                            <div class="font-semibold text-white">
                                {{ $sungai['lat'] }}
                            </div>
                        </div>

                        <div>
                            <div class="text-white/60 text-sm">
                                Longitude
                            </div>

                            <div class="font-semibold text-white">
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

        @if(count($sungai['galleries']) > 0)

            <div class="grid md:grid-cols-3 gap-6">

                @foreach($sungai['galleries'] as $gallery)

                    <div class="glass-card overflow-hidden">

                        <img
                            src="{{ $gallery['image'] }}"
                            class="w-full h-64 object-cover">

                    </div>

                @endforeach

            </div>

@else

<div class="glass-card p-12 text-center">

    <div class="text-6xl mb-4">
        📷
    </div>

    <h3 class="text-2xl font-bold text-white">
        Dokumentasi Belum Tersedia
    </h3>

</div>

@endif
            <p class="text-white mt-3">
                Dokumentasi akan muncul otomatis setelah proses scraping selesai.
            </p>

        </div>

        <div class="flex justify-between mt-12 mb-20">

            <a
                href="{{ route('peta') }}"
                class="btn-light px-8 py-4 rounded-xl font-semibold">

                ← Kembali ke Peta

            </a>

            <a
                href="{{ route('prioritas') }}"
                class="btn-accent px-8 py-4 rounded-xl font-semibold">

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