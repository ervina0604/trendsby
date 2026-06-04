@extends('layouts.app')

@section('title','SuraTrend')

@section('content')

<link rel="stylesheet"
href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

<style>

#homeMap{
    height:700px;
    border-radius:24px;
}

.river-card{
    background:white;
    border-radius:24px;
    box-shadow:0 15px 40px rgba(0,0,0,.08);
}

.leaflet-popup-content-wrapper{
    border-radius:18px;
}

.legend{
    background:white;
    padding:15px;
    border-radius:18px;
    box-shadow:0 8px 20px rgba(0,0,0,.12);
}

</style>

{{-- HERO --}}
<section class="max-w-7xl mx-auto px-6 py-16">

<div class="grid lg:grid-cols-2 gap-12 items-center">

<div>

<h1 class="text-6xl font-extrabold leading-tight text-[#04543D]">
Pantau Kondisi Sungai
Surabaya Secara
Interaktif
</h1>

<p class="mt-8 text-xl text-gray-600">
Visualisasi kondisi sungai Surabaya berbasis data lingkungan,
media sosial dan AI.
</p>

<div class="flex gap-4 mt-10">

<a href="{{ route('peta') }}"
class="bg-[#04543D] text-white px-8 py-4 rounded-full font-semibold">
Jelajahi Sungai
</a>

<a href="{{ route('prioritas') }}"
class="border-2 border-[#04543D] text-[#04543D]
px-8 py-4 rounded-full font-semibold">
Prioritas Sungai
</a>

</div>

</div>

<div>

<img src="{{ asset('images/home-sungai.jpg') }}"
class="rounded-3xl shadow-xl h-[450px] w-full object-cover">

</div>

</div>

</section>

{{-- STATISTIK --}}
<section class="max-w-7xl mx-auto px-6">

<div class="grid md:grid-cols-4 gap-6">

<div class="river-card p-6">
<p class="text-gray-500 text-sm">Total Sungai</p>
<h2 class="text-5xl font-bold text-[#04543D]">17</h2>
</div>

<div class="river-card p-6">
<p class="text-gray-500 text-sm">Baik</p>
<h2 class="text-5xl font-bold text-green-600">7</h2>
</div>

<div class="river-card p-6">
<p class="text-gray-500 text-sm">Perlu Perhatian</p>
<h2 class="text-5xl font-bold text-yellow-500">5</h2>
</div>

<div class="river-card p-6">
<p class="text-gray-500 text-sm">Prioritas Tinggi</p>
<h2 class="text-5xl font-bold text-red-600">5</h2>
</div>

</div>

</section>

{{-- PETA --}}
<section class="max-w-7xl mx-auto px-6 py-14">

<div class="grid lg:grid-cols-[1fr_350px] gap-6">

<div class="relative">

<div id="homeMap"></div>

<div class="legend absolute bottom-5 left-5 z-[999]">

<h4 class="font-bold mb-2">
Kondisi Sungai
</h4>

<div class="flex items-center gap-2 mb-2">
<div class="w-4 h-4 rounded-full bg-green-600"></div>
Baik
</div>

<div class="flex items-center gap-2 mb-2">
<div class="w-4 h-4 rounded-full bg-yellow-500"></div>
Perlu Perhatian
</div>

<div class="flex items-center gap-2">
<div class="w-4 h-4 rounded-full bg-red-600"></div>
Prioritas Tinggi
</div>

</div>

</div>

{{-- CARD --}}
<div class="river-card p-6">

<h2 id="riverName"
class="text-4xl font-bold text-[#04543D]">
Kalimas
</h2>

<p id="riverStatus"
class="text-red-600 font-semibold mt-2">
Prioritas Tinggi
</p>

<div class="mt-6">

<div class="text-gray-500">
Indeks Lingkungan
</div>

<div id="riverScore"
class="text-6xl font-bold text-[#04543D]">
72
</div>

</div>

<p id="riverDesc"
class="mt-6 text-gray-600 leading-relaxed">
Klik marker sungai pada peta untuk melihat detail.
</p>

<a href="{{ route('peta') }}"
class="block mt-8 bg-[#04543D] text-white text-center py-4 rounded-xl font-bold">
Lihat Peta Lengkap
</a>

</div>

</div>

</section>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>

document.addEventListener('DOMContentLoaded',()=>{

const map = L.map('homeMap',{
zoomControl:true
}).setView([-7.2575,112.7521],11);

L.tileLayer(
'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'
).addTo(map);

const rivers = [

{name:'Kalimas',lat:-7.204,lng:112.736,score:72,status:'Prioritas Tinggi',desc:'Sungai utama dan ikon Kota Surabaya.'},

{name:'Jagir',lat:-7.304,lng:112.844,score:80,status:'Prioritas Tinggi',desc:'Pengendali banjir wilayah timur.'},

{name:'Gunung Anyar',lat:-7.334,lng:112.829,score:45,status:'Baik',desc:'Mengalir menuju kawasan mangrove.'},

{name:'Dadapan',lat:-7.321,lng:112.837,score:60,status:'Perlu Perhatian',desc:'Muara pesisir timur Surabaya.'},

{name:'Keputih',lat:-7.299,lng:112.845,score:35,status:'Baik',desc:'Dekat kawasan konservasi mangrove.'},

{name:'Damean',lat:-7.274,lng:112.839,score:40,status:'Baik',desc:'Muara pesisir timur.'},

{name:'Kalisari',lat:-7.257,lng:112.810,score:50,status:'Perlu Perhatian',desc:'Kawasan permukiman.'},

{name:'Kedung Cowek',lat:-7.208,lng:112.780,score:76,status:'Prioritas Tinggi',desc:'Dekat Jembatan Suramadu.'},

{name:'Tambak Wedi',lat:-7.203,lng:112.772,score:68,status:'Perlu Perhatian',desc:'Wilayah Kenjeran.'},

{name:'Mas',lat:-7.204,lng:112.736,score:61,status:'Perlu Perhatian',desc:'Muara Sungai Mas.'},

{name:'Bosem Kalianak',lat:-7.235,lng:112.715,score:81,status:'Prioritas Tinggi',desc:'Dekat kawasan industri.'},

{name:'Kalianak',lat:-7.222,lng:112.706,score:85,status:'Prioritas Tinggi',desc:'Terdampak aktivitas industri.'},

{name:'Greges',lat:-7.225,lng:112.685,score:79,status:'Prioritas Tinggi',desc:'Kawasan padat industri.'},

{name:'Manukan',lat:-7.224,lng:112.677,score:48,status:'Baik',desc:'Wilayah Surabaya Barat.'},

{name:'Tambak Langon',lat:-7.220,lng:112.668,score:59,status:'Perlu Perhatian',desc:'Area pesisir.'},

{name:'Sememi',lat:-7.207,lng:112.660,score:44,status:'Baik',desc:'Sungai wilayah barat.'},

{name:'Kalilamong',lat:-7.193,lng:112.662,score:52,status:'Perlu Perhatian',desc:'Perbatasan Surabaya-Gresik.'}

];

function color(score){

if(score>=75) return '#dc2626';
if(score>=50) return '#f59e0b';

return '#16a34a';

}

rivers.forEach(r=>{

const marker = L.circleMarker(
[r.lat,r.lng],
{
radius:10,
fillColor:color(r.score),
color:'#fff',
weight:3,
fillOpacity:1
}
).addTo(map);

marker.bindPopup(`
<b>${r.name}</b><br>
${r.status}<br>
Skor : ${r.score}
`);

marker.on('mouseover',function(){
this.setRadius(15);
});

marker.on('mouseout',function(){
this.setRadius(10);
});

marker.on('click',()=>{

map.flyTo([r.lat,r.lng],14,{
duration:1.5
});

document.getElementById('riverName').innerHTML=r.name;
document.getElementById('riverStatus').innerHTML=r.status;
document.getElementById('riverScore').innerHTML=r.score;
document.getElementById('riverDesc').innerHTML=r.desc;

});

});

});

</script>

@endsection