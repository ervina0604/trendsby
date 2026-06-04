@extends('layouts.app')

@section('title','Peta Sungai')

@section('content')

<link rel="stylesheet"
href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

<style>

#map{
    height:850px;
    width:100%;
    border-radius:24px 0 0 24px;
}

.leaflet-popup-content-wrapper{
    border-radius:18px;
}

.legend-box{
    background:white;
    padding:14px;
    border-radius:16px;
    box-shadow:0 8px 20px rgba(0,0,0,.1);
}

</style>

<section class="max-w-[1700px] mx-auto px-6 pb-20">

<div class="grid lg:grid-cols-[1fr_380px] gap-0 overflow-hidden rounded-[30px] shadow-xl bg-white">

    {{-- MAP --}}
    <div class="relative">

        <div id="map"></div>

        <div class="absolute bottom-5 left-5 z-[999] legend-box">

            <h4 class="font-bold mb-3">
                Kondisi Sungai
            </h4>

            <div class="flex items-center gap-2 mb-2">
                <span class="w-4 h-4 rounded-full bg-green-600"></span>
                <span class="text-sm">Baik</span>
            </div>

            <div class="flex items-center gap-2 mb-2">
                <span class="w-4 h-4 rounded-full bg-yellow-500"></span>
                <span class="text-sm">Perlu Perhatian</span>
            </div>

            <div class="flex items-center gap-2">
                <span class="w-4 h-4 rounded-full bg-red-600"></span>
                <span class="text-sm">Prioritas Tinggi</span>
            </div>

        </div>

    </div>

    {{-- PANEL --}}
    <div class="bg-white border-l p-6">

        <img
        id="riverImage"
        src="{{ asset('images/home sungai.png') }}"
        class="rounded-2xl h-[220px] w-full object-cover">

        <div class="mt-5 flex items-center justify-between">

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

        <div class="card p-5 mt-6">

            <div class="font-semibold">
                Status Sungai
            </div>

            <div
            id="riverStatus"
            class="text-red-600 font-bold">
                Prioritas Tinggi
            </div>

            <p
            id="riverDesc"
            class="mt-4 text-gray-500">
                Klik salah satu titik sungai pada peta untuk melihat detail.
            </p>

        </div>

        <div class="mt-8 space-y-5">

            <div>

                <div class="flex justify-between">
                    <span>Sampah Plastik</span>
                    <span id="plastikVal">85%</span>
                </div>

                <div class="h-2 bg-gray-200 rounded-full mt-2">

                    <div
                    id="plastikBar"
                    class="h-2 bg-red-600 rounded-full"
                    style="width:85%">
                    </div>

                </div>

            </div>

            <div>

                <div class="flex justify-between">
                    <span>Air Keruh</span>
                    <span id="sedimenVal">60%</span>
                </div>

                <div class="h-2 bg-gray-200 rounded-full mt-2">

                    <div
                    id="sedimenBar"
                    class="h-2 bg-yellow-500 rounded-full"
                    style="width:60%">
                    </div>

                </div>

            </div>

            <div>

                <div class="flex justify-between">
                    <span>Limbah Kimia</span>
                    <span id="kimiaVal">32%</span>
                </div>

                <div class="h-2 bg-gray-200 rounded-full mt-2">

                    <div
                    id="kimiaBar"
                    class="h-2 bg-green-700 rounded-full"
                    style="width:32%">
                    </div>

                </div>

            </div>

        </div>

        <button
        class="mt-10 w-full bg-[#04543D] hover:bg-[#023b2b] text-white py-4 rounded-xl font-bold">
            Lihat Detail →
        </button>

    </div>

</div>

</section>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>

const map = L.map('map').setView([-7.2575,112.7521],11);

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

const rivers = [

{name:'Kalimas',lat:-7.204056,lng:112.736528,score:72,status:'Perlu Perhatian',plastik:85,sedimen:60,kimia:32,desc:'Sungai utama dan bersejarah di Surabaya.'},

{name:'Jagir',lat:-7.304694,lng:112.844556,score:80,status:'Prioritas Tinggi',plastik:90,sedimen:70,kimia:40,desc:'Sungai pengendali banjir wilayah timur.'},

{name:'Gunung Anyar',lat:-7.334639,lng:112.829972,score:55,status:'Perlu Perhatian',plastik:55,sedimen:40,kimia:22,desc:'Mengalir menuju kawasan mangrove.'},

{name:'Dadapan',lat:-7.321694,lng:112.837667,score:60,status:'Perlu Perhatian',plastik:60,sedimen:45,kimia:25,desc:'Muara pesisir timur Surabaya.'},

{name:'Keputih',lat:-7.299056,lng:112.845972,score:40,status:'Baik',plastik:35,sedimen:30,kimia:10,desc:'Dekat kawasan konservasi mangrove.'},

{name:'Damean',lat:-7.274306,lng:112.839889,score:48,status:'Baik',plastik:38,sedimen:35,kimia:12,desc:'Muara pesisir timur.'},

{name:'Kalisari',lat:-7.257278,lng:112.810972,score:58,status:'Perlu Perhatian',plastik:52,sedimen:44,kimia:21,desc:'Sungai kawasan permukiman.'},

{name:'Kedung Cowek',lat:-7.208989,lng:112.780000,score:67,status:'Perlu Perhatian',plastik:64,sedimen:55,kimia:30,desc:'Dekat Jembatan Suramadu.'},

{name:'Tambak Wedi',lat:-7.203139,lng:112.772611,score:62,status:'Perlu Perhatian',plastik:60,sedimen:50,kimia:25,desc:'Muara wilayah Kenjeran.'},

{name:'Bosem Kalianak',lat:-7.235694,lng:112.715361,score:70,status:'Perlu Perhatian',plastik:68,sedimen:55,kimia:30,desc:'Dekat kawasan industri.'},

{name:'Kalianak',lat:-7.222750,lng:112.706250,score:81,status:'Prioritas Tinggi',plastik:92,sedimen:76,kimia:42,desc:'Terdampak aktivitas industri.'},

{name:'Greges',lat:-7.225667,lng:112.685917,score:84,status:'Prioritas Tinggi',plastik:93,sedimen:80,kimia:45,desc:'Kawasan padat industri.'},

{name:'Manukan',lat:-7.224194,lng:112.677250,score:57,status:'Perlu Perhatian',plastik:54,sedimen:44,kimia:20,desc:'Muara Surabaya Barat.'},

{name:'Tambak Langon',lat:-7.220194,lng:112.668389,score:59,status:'Perlu Perhatian',plastik:56,sedimen:46,kimia:24,desc:'Kawasan pesisir dan pelabuhan.'},

{name:'Sememi',lat:-7.207250,lng:112.660417,score:52,status:'Perlu Perhatian',plastik:48,sedimen:40,kimia:18,desc:'Sungai wilayah barat laut.'},

{name:'Kali Lamong',lat:-7.193222,lng:112.662500,score:69,status:'Perlu Perhatian',plastik:66,sedimen:55,kimia:30,desc:'Perbatasan Surabaya dan Gresik.'},

{name:'Kebon Agung',lat:-7.342167,lng:112.824000,score:61,status:'Perlu Perhatian',plastik:58,sedimen:48,kimia:22,desc:'Muara wilayah Surabaya Timur.'}

];

rivers.forEach(river => {

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
        <b>${river.name}</b><br>
        Skor : ${river.score}/100
    `);

    marker.on('click',()=>{

        document.getElementById('riverName').innerText = river.name;
        document.getElementById('riverScore').innerText = river.score;
        document.getElementById('riverStatus').innerText = river.status;
        document.getElementById('riverDesc').innerText = river.desc;

        document.getElementById('plastikVal').innerText = river.plastik+'%';
        document.getElementById('sedimenVal').innerText = river.sedimen+'%';
        document.getElementById('kimiaVal').innerText = river.kimia+'%';

        document.getElementById('plastikBar').style.width = river.plastik+'%';
        document.getElementById('sedimenBar').style.width = river.sedimen+'%';
        document.getElementById('kimiaBar').style.width = river.kimia+'%';

    });

});

</script>

@endsection