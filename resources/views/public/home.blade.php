@extends('layouts.app')

@section('title','SuraTrend')

@section('content')

{{-- HERO --}}
<section class="max-w-7xl mx-auto px-6 py-16">

    <div class="grid lg:grid-cols-2 gap-12 items-center">

        <div>

            <h1 class="text-6xl font-extrabold leading-tight text-[#04543D]">
                Pantau Kondisi Sungai
                Surabaya Secara
                Interaktif
            </h1>

            <p class="mt-8 text-xl text-gray-600 leading-relaxed">
                Temukan informasi kondisi sungai, dokumentasi lapangan,
                dan perkembangan isu lingkungan di berbagai wilayah Surabaya.
            </p>

            <div class="flex gap-4 mt-10">

                <a href="{{ route('peta') }}"
                   class="bg-[#04543D] text-white px-8 py-4 rounded-full font-semibold">
                    Jelajahi Sungai
                </a>

                <a href="{{ route('prioritas') }}"
                   class="border-2 border-[#04543D] text-[#04543D]
                   px-8 py-4 rounded-full font-semibold">
                    Lihat Prioritas
                </a>

            </div>

        </div>

        <div>

            <img src="{{ asset('images/home-sungai.jpg') }}"
                 class="rounded-3xl shadow-xl w-full h-[450px] object-cover">

        </div>

    </div>

</section>


{{-- STATISTIK --}}
<section class="max-w-7xl mx-auto px-6">

    <div class="grid md:grid-cols-4 gap-6">

        <div class="card p-6 border-t-4 border-green-700">
            <p class="text-sm text-gray-500 uppercase">Total Dipantau</p>
            <h3 class="text-5xl font-bold mt-2 text-[#04543D]">17</h3>
        </div>

        <div class="card p-6 border-t-4 border-green-500">
            <p class="text-sm text-gray-500 uppercase">Baik</p>
            <h3 class="text-5xl font-bold mt-2 text-green-600">7</h3>
        </div>

        <div class="card p-6 border-t-4 border-yellow-500">
            <p class="text-sm text-gray-500 uppercase">Perlu Perhatian</p>
            <h3 class="text-5xl font-bold mt-2 text-yellow-500">6</h3>
        </div>

        <div class="card p-6 border-t-4 border-red-500">
            <p class="text-sm text-gray-500 uppercase">Prioritas Tinggi</p>
            <h3 class="text-5xl font-bold mt-2 text-red-500">5</h3>
        </div>

    </div>

</section>


{{-- PETA INTERAKTIF --}}
<section class="max-w-7xl mx-auto px-6 mt-14">

    <div class="card overflow-hidden">

        <div class="p-6 border-b">

            <h2 class="text-3xl font-bold text-[#04543D]">
                Peta Interaktif Sungai Surabaya
            </h2>

            <p class="text-gray-500 mt-2">
                Klik marker sungai untuk melihat ringkasan kondisi.
            </p>

        </div>

        <div id="homeMap" class="h-[650px]"></div>

    </div>

</section>


{{-- ISU --}}
<section class="max-w-7xl mx-auto px-6 py-20">

    <h2 class="text-4xl font-bold text-[#04543D] mb-10">
        Isu Utama Sungai
    </h2>

    <div class="grid md:grid-cols-3 gap-6">

        <div class="card p-8">
            <h3 class="font-bold text-2xl">Sampah Plastik</h3>
            <p class="text-5xl text-[#04543D] mt-3">82%</p>
            <span class="text-red-500 font-semibold">Kritis</span>
        </div>

        <div class="card p-8">
            <h3 class="font-bold text-2xl">Pencemaran Air</h3>
            <p class="text-5xl text-[#04543D] mt-3">45%</p>
            <span class="text-yellow-500 font-semibold">Sedang</span>
        </div>

        <div class="card p-8">
            <h3 class="font-bold text-2xl">Limbah Domestik</h3>
            <p class="text-5xl text-[#04543D] mt-3">68%</p>
            <span class="text-red-500 font-semibold">Tinggi</span>
        </div>

    </div>

</section>



<script>

document.addEventListener('DOMContentLoaded', function(){

const map = L.map('homeMap').setView([-7.2575,112.7521],11);

L.tileLayer(
'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
{
attribution:'© OpenStreetMap'
}
).addTo(map);


const rivers = [

{
name:"Kalimas",
lat:-7.204,
lng:112.736,
status:"Prioritas Tinggi",
score:72,
color:"#dc2626"
},

{
name:"Jagir",
lat:-7.3047,
lng:112.8445,
status:"Perlu Perhatian",
score:60,
color:"#f59e0b"
},

{
name:"Gunung Anyar",
lat:-7.3346,
lng:112.8300,
status:"Baik",
score:30,
color:"#16a34a"
},

{
name:"Dadapan",
lat:-7.3217,
lng:112.8377,
status:"Perlu Perhatian",
score:55,
color:"#f59e0b"
},

{
name:"Keputih",
lat:-7.2990,
lng:112.8459,
status:"Baik",
score:28,
color:"#16a34a"
},

{
name:"Damean",
lat:-7.2743,
lng:112.8398,
status:"Baik",
score:33,
color:"#16a34a"
},

{
name:"Kalisari",
lat:-7.2572,
lng:112.8109,
status:"Baik",
score:31,
color:"#16a34a"
},

{
name:"Kedung Cowek",
lat:-7.2089,
lng:112.7800,
status:"Prioritas Tinggi",
score:80,
color:"#dc2626"
},

{
name:"Tambak Wedi",
lat:-7.2031,
lng:112.7726,
status:"Prioritas Tinggi",
score:82,
color:"#dc2626"
},

{
name:"Mas",
lat:-7.2040,
lng:112.7365,
status:"Perlu Perhatian",
score:61,
color:"#f59e0b"
},

{
name:"Bosem Kalianak",
lat:-7.2357,
lng:112.7153,
status:"Prioritas Tinggi",
score:84,
color:"#dc2626"
},

{
name:"Kalianak",
lat:-7.2227,
lng:112.7062,
status:"Prioritas Tinggi",
score:76,
color:"#dc2626"
},

{
name:"Greges",
lat:-7.2256,
lng:112.6859,
status:"Perlu Perhatian",
score:58,
color:"#f59e0b"
},

{
name:"Manukan",
lat:-7.2241,
lng:112.6773,
status:"Baik",
score:35,
color:"#16a34a"
},

{
name:"Tambak Langon",
lat:-7.2201,
lng:112.6684,
status:"Perlu Perhatian",
score:57,
color:"#f59e0b"
},

{
name:"Sememi",
lat:-7.2073,
lng:112.6604,
status:"Baik",
score:29,
color:"#16a34a"
},

{
name:"Kalilamong",
lat:-7.1932,
lng:112.6625,
status:"Baik",
score:27,
color:"#16a34a"
}

];


rivers.forEach(function(river){

let marker = L.circleMarker(
[river.lat,river.lng],
{
radius:10,
fillColor:river.color,
color:'#fff',
weight:3,
fillOpacity:1
}
).addTo(map);

marker.bindPopup(`
<div style="width:250px">

<h3 style="font-size:20px;font-weight:bold;color:#04543D">
${river.name}
</h3>

<p>Status :
<b>${river.status}</b>
</p>

<p>Indeks Polusi :
<b>${river.score}/100</b>
</p>

<a href="{{ route('peta') }}"
style="
display:block;
margin-top:10px;
padding:10px;
background:#04543D;
color:white;
text-align:center;
border-radius:8px;
text-decoration:none;
">
Lihat Detail
</a>

</div>
`);

});

});

</script>

@endsection