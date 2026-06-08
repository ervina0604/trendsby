@extends('layouts.app')

@section('title','Peta Sungai')

@section('content')

<link rel="stylesheet"
href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

<style>

#map{
    height:850px;
    width:100%;
}

.map-card{
    overflow:hidden;
    border-radius:32px;
    background:white;
    box-shadow:0 20px 50px rgba(0,0,0,.08);
}

.leaflet-popup-content-wrapper{
    border-radius:18px;
}

.leaflet-popup-content{
    font-family:Manrope,sans-serif;
}

.legend-box{
    background:white;
    padding:14px;
    border-radius:18px;
    box-shadow:0 10px 30px rgba(0,0,0,.12);
}

.search-box{
    position:absolute;
    top:20px;
    left:70px;
    z-index:999;
    background:white;
    border-radius:14px;
    padding:12px;
    width:280px;
    box-shadow:0 8px 20px rgba(0,0,0,.1);
}

.info-card{
    background:#f8fafc;
    border-radius:18px;
    padding:18px;
}

</style>

<section class="max-w-[1700px] mx-auto px-6 pb-16">

    <div class="mb-10">

        <span class="uppercase tracking-[4px] text-sm font-bold text-[#0B5B94]">
            Dashboard Monitoring
        </span>

        <h1 class="text-5xl font-extrabold text-[#063A67] mt-3">
            Peta Interaktif Sungai Surabaya
        </h1>

        <p class="text-slate-500 text-lg mt-4 max-w-3xl">
            Visualisasi kondisi sungai berdasarkan hasil analisis media sosial,
            dokumentasi visual, dan pemantauan lingkungan.
        </p>

    </div>

    <div class="map-card">

        <div class="grid lg:grid-cols-[1fr_400px]">

            {{-- MAP --}}
            <div class="relative">

                <div class="search-box">

                    <input
                    id="searchRiver"
                    type="text"
                    placeholder="Cari sungai..."
                    class="w-full border rounded-xl px-4 py-3 outline-none">

                </div>

                <div id="map"></div>

                <div class="absolute bottom-5 left-5 z-[999] legend-box">

                    <h4 class="font-bold mb-3">
                        Kondisi Sungai
                    </h4>

                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-4 h-4 rounded-full bg-green-600"></span>
                        Baik
                    </div>

                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-4 h-4 rounded-full bg-yellow-500"></span>
                        Perlu Perhatian
                    </div>

                    <div class="flex items-center gap-2">
                        <span class="w-4 h-4 rounded-full bg-red-600"></span>
                        Prioritas Tinggi
                    </div>

                </div>

            </div>

            {{-- SIDEBAR --}}
            <div class="bg-white border-l p-6">

                <img
                id="riverImage"
                src="{{ asset('storage/home-sungai.png') }}"
                class="rounded-2xl h-[220px] w-full object-cover">

                <div class="mt-5 flex justify-between items-start">

                    <div>

                        <h2
                        id="riverName"
                        class="text-4xl font-bold text-[#04543D]">
                            Kalimas
                        </h2>

                        <p
                        id="riverLocation"
                        class="text-gray-500">
                            Surabaya, Jawa Timur
                        </p>

                    </div>

                    <div>

                        <div
                        id="riverScore"
                        class="text-red-600 text-5xl font-bold">
                            72
                        </div>

                        <div>/100</div>

                    </div>

                </div>

                <div class="info-card mt-6">

                    <div class="flex justify-between">

                        <div>

                            <div class="text-sm text-gray-500">
                                Status
                            </div>

                            <div
                            id="riverStatus"
                            class="font-bold text-red-600">
                                Prioritas Tinggi
                            </div>

                        </div>

                        <div>

                            <div class="text-sm text-gray-500">
                                Dokumentasi
                            </div>

                            <div class="font-bold">
                                147
                            </div>

                        </div>

                    </div>

                    <p
                    id="riverDesc"
                    class="text-gray-600 mt-4">
                        Klik salah satu titik sungai untuk melihat detail.
                    </p>

                </div>

                <div class="mt-8 space-y-6">

                    <div>

                        <div class="flex justify-between mb-2">
                            <span>Sampah Plastik</span>
                            <span id="plastikVal">85%</span>
                        </div>

                        <div class="bg-gray-200 h-2 rounded-full">

                            <div
                            id="plastikBar"
                            class="bg-red-600 h-2 rounded-full"
                            style="width:85%">
                            </div>

                        </div>

                    </div>

                    <div>

                        <div class="flex justify-between mb-2">
                            <span>Air Keruh</span>
                            <span id="sedimenVal">60%</span>
                        </div>

                        <div class="bg-gray-200 h-2 rounded-full">

                            <div
                            id="sedimenBar"
                            class="bg-yellow-500 h-2 rounded-full"
                            style="width:60%">
                            </div>

                        </div>

                    </div>

                    <div>

                        <div class="flex justify-between mb-2">
                            <span>Limbah Kimia</span>
                            <span id="kimiaVal">32%</span>
                        </div>

                        <div class="bg-gray-200 h-2 rounded-full">

                            <div
                            id="kimiaBar"
                            class="bg-green-700 h-2 rounded-full"
                            style="width:32%">
                            </div>

                        </div>

                    </div>

                </div>

                <a
                id="detailBtn"
                href="#"
                class="mt-10 block text-center bg-[#04543D] hover:bg-[#023b2b] text-white py-4 rounded-xl font-bold">

                    Lihat Detail →

                </a>

            </div>

        </div>

    </div>

</section>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>

const riverName = document.getElementById('riverName');
const riverScore = document.getElementById('riverScore');
const riverStatus = document.getElementById('riverStatus');
const riverDesc = document.getElementById('riverDesc');

const plastikVal = document.getElementById('plastikVal');
const sedimenVal = document.getElementById('sedimenVal');
const kimiaVal = document.getElementById('kimiaVal');

const plastikBar = document.getElementById('plastikBar');
const sedimenBar = document.getElementById('sedimenBar');
const kimiaBar = document.getElementById('kimiaBar');

const detailBtn = document.getElementById('detailBtn');

const map = L.map('map').setView([-7.2575,112.7521],11);

L.tileLayer(
'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
{
attribution:'© OpenStreetMap'
}
).addTo(map);

function markerColor(score){
    if(score >= 75) return "#dc2626";
    if(score >= 50) return "#f59e0b";
    return "#16a34a";
}

const rivers = [
{name:'Kalimas',lat:-7.204056,lng:112.736528,score:72,status:'Perlu Perhatian',plastik:85,sedimen:60,kimia:32,desc:'Sungai utama dan bersejarah di Surabaya.'},
{name:'Jagir',lat:-7.304694,lng:112.844556,score:80,status:'Prioritas Tinggi',plastik:90,sedimen:70,kimia:40,desc:'Sungai pengendali banjir wilayah timur.'},
{name:'Kalianak',lat:-7.222750,lng:112.706250,score:81,status:'Prioritas Tinggi',plastik:92,sedimen:76,kimia:42,desc:'Terdampak aktivitas industri.'},
{name:'Greges',lat:-7.225667,lng:112.685917,score:84,status:'Prioritas Tinggi',plastik:93,sedimen:80,kimia:45,desc:'Kawasan padat industri.'},
{name:'Keputih',lat:-7.299056,lng:112.845972,score:40,status:'Baik',plastik:35,sedimen:30,kimia:10,desc:'Dekat kawasan konservasi mangrove.'}
];

let markers=[];

function updatePanel(river){

    riverName.innerText = river.name;
    riverScore.innerText = river.score;
    riverStatus.innerText = river.status;
    riverDesc.innerText = river.desc;

    plastikVal.innerText = river.plastik+'%';
    sedimenVal.innerText = river.sedimen+'%';
    kimiaVal.innerText = river.kimia+'%';

    plastikBar.style.width = river.plastik+'%';
    sedimenBar.style.width = river.sedimen+'%';
    kimiaBar.style.width = river.kimia+'%';

}

rivers.forEach(river=>{

    const marker = L.circleMarker(
    [river.lat,river.lng],
    {
        radius:10,
        fillColor:markerColor(river.score),
        color:'#fff',
        weight:3,
        fillOpacity:1
    }).addTo(map);

    marker.bindPopup(`
        <strong>${river.name}</strong><br>
        ${river.status}<br>
        Skor ${river.score}/100
    `);

    marker.on('click',()=>{

        updatePanel(river);

        map.flyTo(
        [river.lat,river.lng],
        13,
        {duration:1.5}
        );

    });

    markers.push({
        name:river.name.toLowerCase(),
        marker:marker,
        data:river
    });

});

document
.getElementById('searchRiver')
.addEventListener('keyup',function(){

    const keyword=this.value.toLowerCase();

    markers.forEach(item=>{

        if(item.name.includes(keyword)){

            map.flyTo(
            [item.data.lat,item.data.lng],
            13
            );

            item.marker.openPopup();

            updatePanel(item.data);

        }

    });

});

</script>

@endsection