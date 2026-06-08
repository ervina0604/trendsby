@extends('layouts.app')

@section('title','Peta Sungai')

@section('content')

<link rel="stylesheet"
href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

<style>

body{
    background:
        radial-gradient(
            circle at top left,
            rgba(126,240,200,.12),
            transparent 35%
        ),
        #2B5748;
}

/* MAP */

#map{
    height:850px;
    width:100%;
    border-radius:32px;
}

/* CARD */

.map-card{

    overflow:hidden;

    border-radius:32px;

    background:
        rgba(255,255,255,.06);

    backdrop-filter:
        blur(18px);

    -webkit-backdrop-filter:
        blur(18px);

    border:
        1px solid rgba(255,255,255,.10);

    box-shadow:
        0 20px 60px rgba(0,0,0,.15);
}

/* SIDEBAR */

.sidebar-panel{

    background:
        rgba(255,255,255,.04);

    backdrop-filter:
        blur(18px);

    border-left:
        1px solid rgba(255,255,255,.08);
}

/* POPUP */

.leaflet-popup-content-wrapper{

    border-radius:18px;

    background:
        rgba(43,87,72,.95);

    color:white;
}

.leaflet-popup-tip{
    background:#2B5748;
}

/* SEARCH */

.search-box{

    position:absolute;

    top:20px;
    left:70px;

    z-index:999;

    width:320px;

    padding:14px;

    border-radius:18px;

    background:
        rgba(255,255,255,.08);

    backdrop-filter:
        blur(16px);

    border:
        1px solid rgba(255,255,255,.10);
}

.search-box input{

    background:
        rgba(255,255,255,.06);

    border:
        1px solid rgba(255,255,255,.10);

    color:white;
}

.search-box input::placeholder{
    color:rgba(255,255,255,.55);
}

/* LEGEND */

.legend-box{

    background:
        rgba(255,255,255,.08);

    backdrop-filter:
        blur(16px);

    color:white;

    padding:18px;

    border-radius:18px;

    border:
        1px solid rgba(255,255,255,.10);
}

/* INFO CARD */

.info-card{

    background:
        rgba(255,255,255,.06);

    border:
        1px solid rgba(255,255,255,.08);

    backdrop-filter:
        blur(12px);

    border-radius:22px;

    color:white;

    transition:.3s ease;
}

.info-card:hover{

    transform:translateY(-4px);

    background:
        rgba(255,255,255,.10);
}

/* TEXT */

.page-label{

    color:#7EF0C8;
}

.page-title{

    color:white;

    text-shadow:
        0 0 30px rgba(126,240,200,.15);
}

.page-desc{

    color:
        rgba(255,255,255,.70);
}

/* DETAIL */

#riverName{
    color:white;
}

#riverLocation{
    color:
        rgba(255,255,255,.60);
}

#riverStatus{
    color:#7EF0C8;
}

#riverDesc{
    color:
        rgba(255,255,255,.70);
}

#riverScore{
    color:#7EF0C8;
}

/* BUTTON */

#detailBtn{

    background:
        rgba(255,255,255,.08);

    border:
        1px solid rgba(255,255,255,.12);

    backdrop-filter:
        blur(14px);

    color:white;

    transition:.3s;
}

#detailBtn:hover{

    background:
        rgba(255,255,255,.15);
}

/* IMAGE */

#riverImage{

    border:
        1px solid rgba(255,255,255,.10);
}

/* LEAFLET CONTROL */

.leaflet-control-zoom{

    border:none !important;
}

.leaflet-control-zoom a{

    background:
        rgba(43,87,72,.95) !important;

    color:white !important;

    border:none !important;
}

</style>

<section class="max-w-7xl mx-auto px-6 py-10">

<div class="mb-10">

<span class="page-label uppercase tracking-[4px] text-sm font-bold">
    Dashboard Monitoring
</span>

<h1 class="page-title text-6xl font-extrabold mt-3 leading-tight">

    Peta Interaktif

    <span class="text-[#7EF0C8]">
        Sungai Surabaya
    </span>

</h1>

<p class="page-desc text-xl mt-5 max-w-3xl leading-relaxed">

    Pantau kondisi sungai Surabaya 

</p>

</div>

<div class="grid md:grid-cols-4 gap-5 mb-10">

<div class="info-card p-5">

    <div class="text-sm opacity-70">
        Total Sungai
    </div>

    <div class="text-4xl font-bold mt-2">
        {{ count($rivers) }}
    </div>

</div>

<div class="info-card p-5">

    <div class="text-sm opacity-70">
        Prioritas Tinggi
    </div>

    <div class="text-4xl font-bold mt-2 text-red-400">

        {{
            collect($rivers)
            ->where('status','Prioritas Tinggi')
            ->count()
        }}

    </div>

</div>

<div class="info-card p-5">

    <div class="text-sm opacity-70">
        Perlu Perhatian
    </div>

    <div class="text-4xl font-bold mt-2 text-yellow-300">

        {{
            collect($rivers)
            ->where('status','Perlu Perhatian')
            ->count()
        }}

    </div>

</div>

<div class="info-card p-5">

    <div class="text-sm opacity-70">
        Kondisi Baik
    </div>

    <div class="text-4xl font-bold mt-2 text-green-300">

        {{
            collect($rivers)
            ->where('status','Baik')
            ->count()
        }}

    </div>

</div>

</div>


<div class="map-card">


<div class="grid lg:grid-cols-[1fr_420px]">

    {{-- MAP --}}
    <div class="relative">

        {{-- SEARCH --}}
        <div class="search-box">

            <div class="flex items-center gap-3">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 text-white/60"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 105.5 5.5a7.5 7.5 0 0011.15 11.15z"/>

                </svg>

                <input
                    id="searchRiver"
                    type="text"
                    placeholder="Cari sungai..."
                    class="w-full bg-transparent outline-none">

            </div>

        </div>

        {{-- MAP HEADER --}}
        <div
            class="absolute top-5 right-5 z-[999]
            px-5 py-3 rounded-2xl
            bg-white/10 backdrop-blur-lg
            border border-white/10">

            <div class="text-white text-xs uppercase tracking-widest opacity-60">
                Monitoring AI
            </div>

            <div class="text-white font-bold mt-1">
    {{ count($rivers) }} Sungai Terpantau
</div>

        </div>

        <div id="map"></div>

        {{-- LEGEND --}}
        <div
            class="absolute bottom-5 left-5 z-[999] legend-box">

            <div class="text-sm uppercase tracking-widest opacity-70 mb-3">
                Status Sungai
            </div>

            <div class="space-y-3">

                <div class="flex items-center gap-3">

                    <span
                        class="w-3 h-3 rounded-full bg-green-500">
                    </span>

                    <span>
                        Baik
                    </span>

                </div>

                <div class="flex items-center gap-3">

                    <span
                        class="w-3 h-3 rounded-full bg-yellow-400">
                    </span>

                    <span>
                        Perlu Perhatian
                    </span>

                </div>

                <div class="flex items-center gap-3">

                    <span
                        class="w-3 h-3 rounded-full bg-red-500">
                    </span>

                    <span>
                        Prioritas Tinggi
                    </span>

                </div>

            </div>

        </div>

        {{-- QUICK INFO --}}
        <div
            class="absolute bottom-5 right-5 z-[999]
            flex gap-4">

            <div
                class="bg-white/10 backdrop-blur-lg
                border border-white/10
                rounded-2xl px-5 py-4">

                <div class="text-white/60 text-xs">
                    Total Sungai
                </div>

                <div class="text-white text-2xl font-bold">
                    {{ count($rivers) }}
                </div>

            </div>

            <div
                class="bg-white/10 backdrop-blur-lg
                border border-white/10
                rounded-2xl px-5 py-4">

                <div class="text-white/60 text-xs">
                    Prioritas Tinggi
                </div>

                <div class="text-red-300 text-2xl font-bold">

                    {{
                        collect($rivers)
                        ->where('status','Prioritas Tinggi')
                        ->count()
                    }}

                </div>

            </div>

        </div>

    </div>


{{-- SIDEBAR --}}

<div class="sidebar-panel p-7">

<img
    id="riverImage"
    src="{{ asset('storage/home-sungai.png') }}"
    class="rounded-3xl h-[250px] w-full object-cover">

<div class="mt-6">

    <div
        id="riverStatus"
        class="inline-flex items-center px-4 py-2 rounded-full
        bg-white/10 border border-white/10
        text-sm text-[#7EF0C8] font-semibold">

        Belum Dianalisis

    </div>

    <h2
        id="riverName"
        class="text-4xl font-bold text-white mt-4">

        Pilih Sungai

    </h2>

    <p
        id="riverLocation"
        class="text-white/60 mt-2">

        Surabaya

    </p>

</div>

{{-- SCORE CARD --}}
<div class="info-card mt-6 p-5">

    <div class="flex justify-between items-center">

        <div>

            <div class="text-white/60 text-sm">
                Risk Score
            </div>

            <div
                id="riverScore"
                class="text-5xl font-bold text-[#7EF0C8] mt-2">

                0

            </div>

        </div>

        <div
            class="w-16 h-16 rounded-2xl
            bg-white/10 flex items-center justify-center">

            <span class="text-white/50">
                /100
            </span>

        </div>

    </div>

</div>

{{-- INFO --}}
<div class="info-card mt-5 p-5">

    <div class="grid grid-cols-2 gap-4">

        <div>

            <div class="text-white/50 text-xs uppercase">
                Dokumentasi
            </div>

            <div
                id="galleryCount"
                class="text-2xl font-bold mt-2">

                0

            </div>

        </div>

        <div>

            <div class="text-white/50 text-xs uppercase">
                Status
            </div>

            <div
                class="font-semibold mt-2"
                id="statusText">

                -

            </div>

        </div>

    </div>

    <div
        id="riverDesc"
        class="mt-5 text-white/70 leading-relaxed">

        Klik salah satu titik sungai
        pada peta untuk melihat detail.

    </div>

</div>

{{-- ANALISIS --}}
<div class="info-card mt-5 p-5">

    <div class="font-semibold mb-5">
        Analisis Lingkungan
    </div>

    <div class="space-y-5">

        <div>

            <div class="flex justify-between text-sm mb-2">

                <span>Sampah Plastik</span>

                <span id="plastikVal">
                    0%
                </span>

            </div>

            <div class="progress-bg h-2 rounded-full">

                <div
                    id="plastikBar"
                    class="h-2 rounded-full bg-red-500"
                    style="width:0%">
                </div>

            </div>

        </div>

        <div>

            <div class="flex justify-between text-sm mb-2">

                <span>Air Keruh</span>

                <span id="sedimenVal">
                    0%
                </span>

            </div>

            <div class="progress-bg h-2 rounded-full">

                <div
                    id="sedimenBar"
                    class="h-2 rounded-full bg-yellow-500"
                    style="width:0%">
                </div>

            </div>

        </div>

        <div>

            <div class="flex justify-between text-sm mb-2">

                <span>Limbah Kimia</span>

                <span id="kimiaVal">
                    0%
                </span>

            </div>

            <div class="progress-bg h-2 rounded-full">

                <div
                    id="kimiaBar"
                    class="h-2 rounded-full bg-green-500"
                    style="width:0%">
                </div>

            </div>

        </div>

    </div>

</div>

<a
    id="detailBtn"
    href="#"
    class="mt-6 block text-center py-4 rounded-2xl font-bold
    bg-[#7EF0C8] text-[#16352C]
    hover:scale-[1.02]
    transition-all">

    Lihat Detail Sungai →

</a>

</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>

const rivers = @json($rivers);

const riverName = document.getElementById('riverName');
const riverScore = document.getElementById('riverScore');
const riverStatus = document.getElementById('riverStatus');
const riverDesc = document.getElementById('riverDesc');
const riverLocation = document.getElementById('riverLocation');

const galleryCount = document.getElementById('galleryCount');
const statusText = document.getElementById('statusText');

const plastikVal = document.getElementById('plastikVal');
const sedimenVal = document.getElementById('sedimenVal');
const kimiaVal = document.getElementById('kimiaVal');

const plastikBar = document.getElementById('plastikBar');
const sedimenBar = document.getElementById('sedimenBar');
const kimiaBar = document.getElementById('kimiaBar');

const detailBtn = document.getElementById('detailBtn');

const map = L.map('map').setView(
    [-7.2575, 112.7521],
    11
);

L.tileLayer(
    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    {
        attribution:'© OpenStreetMap'
    }
).addTo(map);

function markerColor(score){

    if(score >= 75){
        return '#dc2626';
    }

    if(score >= 50){
        return '#f59e0b';
    }

    return '#16a34a';
}

let markers = [];

function updatePanel(river){

    riverName.innerText =
        river.name ?? '-';

    riverLocation.innerText =
        river.location ?? '-';

    riverScore.innerText =
        river.score ?? 0;

    riverStatus.innerText =
        river.status ?? '-';

    riverDesc.innerText =
        river.desc ?? '-';

    if(statusText){
        statusText.innerText =
            river.status ?? '-';
    }

    if(galleryCount){
        galleryCount.innerText =
            river.gallery_count ?? 0;
    }

    document
        .getElementById('riverImage')
        .src =
            river.image;

    detailBtn.href =
        '/sungai/' + river.id;
}

if(rivers.length > 0){
    updatePanel(rivers[0]);
}

rivers.forEach(river => {

    const marker = L.circleMarker(
        [river.lat, river.lng],
        {
            radius:10,
            fillColor:markerColor(river.score),
            color:'#fff',
            weight:3,
            fillOpacity:1
        }
    ).addTo(map);

    marker.bindPopup(`
        <div style="width:220px">

            <img
                src="${river.image}"
                style="
                    width:100%;
                    height:120px;
                    object-fit:cover;
                    border-radius:12px;
                    margin-bottom:10px;
                ">

            <strong>${river.name}</strong><br>

            <span>${river.status}</span>

            <br>

            Score :
            <b>${river.score}%</b>

        </div>
    `);

    marker.on('click', () => {

        updatePanel(river);

        map.flyTo(
            [river.lat, river.lng],
            13,
            {
                duration:1.5
            }
        );

    });

    markers.push({
        name: river.name.toLowerCase(),
        marker: marker,
        data: river
    });

});

document
.getElementById('searchRiver')
.addEventListener('keyup', function(){

    const keyword =
        this.value.toLowerCase();

    const found =
        markers.find(item =>
            item.name.includes(keyword)
        );

    if(found){

        map.flyTo(
            [
                found.data.lat,
                found.data.lng
            ],
            13
        );

        found.marker.openPopup();

        updatePanel(found.data);
    }

});

</script>

@endsection