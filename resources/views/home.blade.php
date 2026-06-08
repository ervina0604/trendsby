@extends('layouts.app')

@section('title','SuraTrend')

@section('content')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

<style>
#homeMap{
    height:700px;
    border-radius:24px;
}

.card-panel{
    background:white;
    border-radius:24px;
    box-shadow:0 15px 40px rgba(0,0,0,.08);
    overflow:hidden;
}

.legend{
    background:white;
    padding:14px;
    border-radius:16px;
    box-shadow:0 8px 20px rgba(0,0,0,.12);
    font-size:14px;
}

.dot{
    width:10px;
    height:10px;
    border-radius:50%;
    display:inline-block;
    margin-right:6px;
}
</style>

@php
function statusColor($status){
    return match($status){
        'Baik' => '#16a34a',
        'Perlu Perhatian' => '#f59e0b',
        'Prioritas Tinggi' => '#dc2626',
        default => '#6b7280'
    };
}
@endphp

<section class="max-w-7xl mx-auto px-6 py-10">

<div class="grid lg:grid-cols-2 gap-12 items-center">

    <div>
        <h1 class="text-5xl font-extrabold text-[#04543D]">
            Pantau Kondisi Sungai Surabaya
        </h1>

        <p class="mt-4 text-gray-600">
            Visualisasi AI + data sosial media untuk monitoring sungai secara real-time
        </p>
    </div>

    <div>
        <img src="{{ asset('storage/home-sungai.png') }}"
             class="rounded-3xl shadow-xl h-[420px] w-full object-cover">
    </div>

</div>

</section>

<section class="max-w-7xl mx-auto px-6 py-10">

<div class="grid lg:grid-cols-[1fr_420px] gap-8">

    {{-- MAP --}}
    <div class="relative card-panel p-3">

        <div id="homeMap"></div>

        {{-- LEGEND --}}
        <div class="legend absolute bottom-5 left-5">
            <div class="font-bold text-[#04543D] mb-2">Status Sungai</div>

            <div><span class="dot" style="background:#16a34a"></span> Baik</div>
            <div><span class="dot" style="background:#f59e0b"></span> Perlu Perhatian</div>
            <div><span class="dot" style="background:#dc2626"></span> Prioritas Tinggi</div>
        </div>

    </div>

    {{-- DETAIL PANEL --}}
    <div class="card-panel p-6">

        <img id="riverImage"
             src="{{ asset('storage/home-sungai.png') }}"
             class="w-full h-48 object-cover rounded-2xl mb-4">

        <h2 id="riverName" class="text-3xl font-bold text-[#04543D]">
            Klik Sungai
        </h2>

        <p id="riverStatus" class="font-semibold mt-2 text-gray-600">-</p>

        <div class="mt-4">
            <div class="text-gray-500 text-sm">Indeks Risiko</div>
            <div id="riverScore" class="text-5xl font-bold text-[#04543D]">0</div>
        </div>

        <p id="riverDesc" class="mt-4 text-gray-600 text-sm leading-relaxed">
            Klik marker untuk melihat detail kondisi sungai
        </p>

        <a id="detailLink"
           href="#"
           class="mt-6 inline-block bg-[#04543D] text-white px-5 py-3 rounded-xl font-semibold">
            Lihat Detail Sungai
        </a>

    </div>

</div>

</section>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>

const rivers = @json($rivers);

const map = L.map('homeMap').setView([-7.2575,112.7521], 11);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap'
}).addTo(map);

function color(status){
    if(status === 'Baik') return '#16a34a';
    if(status === 'Perlu Perhatian') return '#f59e0b';
    if(status === 'Prioritas Tinggi') return '#dc2626';
    return '#6b7280';
}

rivers.forEach(r => {

    const marker = L.circleMarker([r.lat, r.lng], {
        radius: 9,
        fillColor: color(r.status),
        color: '#fff',
        weight: 3,
        fillOpacity: 1
    }).addTo(map);

    marker.bindPopup(`
        <b>${r.name}</b><br>
        ${r.status}<br>
        Score: ${r.score}
    `);

    marker.on('click', () => {

        map.flyTo([r.lat, r.lng], 13);

        document.getElementById('riverName').innerText = r.name;
        document.getElementById('riverStatus').innerText = r.status;
        document.getElementById('riverScore').innerText = r.score;
        document.getElementById('riverDesc').innerText = r.desc;

        document.getElementById('riverImage').src =
            r.image
            ? '/storage/' + r.image
            : '/storage/home-sungai.png';

        const slug = r.name.toLowerCase().replace(/\s+/g,'-');
        document.getElementById('detailLink').href = `/sungai/${slug}`;

    });

});

</script>

@endsection