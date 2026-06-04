@extends('layouts.app')

@section('title',$sungai['nama'])

@section('content')

<section>

<div class="relative">

<img src="{{ asset($sungai['foto']) }}"
     class="w-full h-[520px] object-cover">

<div class="absolute inset-0 bg-black/20"></div>

<div class="absolute bottom-12 left-12 text-white">

<h1 class="text-6xl font-black">
    {{ $sungai['nama'] }}
</h1>

<p class="mt-3 text-xl">
    Surabaya, Jawa Timur
</p>

</div>

</div>

<div class="max-w-7xl mx-auto px-6 -mt-16 relative z-20">

<div class="grid md:grid-cols-4 gap-6">

<div class="bg-white rounded-3xl p-6 shadow">

<p class="text-gray-500 text-sm">
SKOR
</p>

<h3 class="text-5xl font-black text-[#04543D] mt-3">
{{ $sungai['skor'] }}
</h3>

</div>

<div class="bg-white rounded-3xl p-6 shadow">

<p class="text-gray-500 text-sm">
DOKUMENTASI
</p>

<h3 class="text-5xl font-black">
{{ $sungai['dokumentasi'] }}
</h3>

</div>

<div class="bg-white rounded-3xl p-6 shadow">

<p class="text-gray-500 text-sm">
PEMBAHASAN
</p>

<h3 class="text-5xl font-black">
{{ $sungai['pembahasan'] }}
</h3>

</div>

<div class="bg-white rounded-3xl p-6 shadow">

<p class="text-gray-500 text-sm">
PRIORITAS
</p>

<h3 class="text-5xl font-black text-red-600">
{{ $sungai['prioritas'] }}
</h3>

</div>

</div>

<div class="grid lg:grid-cols-[1fr_400px] gap-8 mt-10">

<div class="bg-white rounded-3xl shadow p-8">

<h2 class="text-3xl font-bold text-[#04543D]">
Ringkasan Ekosistem
</h2>

<hr class="my-5">

<div class="grid md:grid-cols-2 gap-8">

<div>

<div class="text-gray-500 text-sm">
LOKASI UTAMA
</div>

<div class="font-semibold text-xl">
{{ $sungai['lokasi'] }}
</div>

</div>

<div>

<div class="text-gray-500 text-sm">
LUAS DAERAH ALIRAN
</div>

<div class="font-semibold text-xl">
{{ $sungai['luas'] }}
</div>

</div>

<div>

<div class="text-gray-500 text-sm">
PANJANG ALIRAN
</div>

<div class="font-semibold text-xl">
{{ $sungai['panjang'] }}
</div>

</div>

</div>

</div>

<div>

<div id="map"
     class="h-[420px] rounded-3xl overflow-hidden shadow">
</div>

</div>

</div>

<h2 class="text-4xl font-bold mt-16 mb-8">
Dokumentasi Terkini
</h2>

<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">

@for($i=1;$i<=5;$i++)

<img src="https://picsum.photos/400/300?random={{ $i }}"
     class="rounded-2xl h-56 w-full object-cover">

@endfor

</div>

</div>

</section>

<link rel="stylesheet"
href="https://unpkg.com/leaflet/dist/leaflet.css"/>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>

const map = L.map('map').setView([-7.2575,112.7521],12);

L.tileLayer(
'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'
).addTo(map);

L.marker([-7.2575,112.7521])
.addTo(map)
.bindPopup('{{ $sungai["nama"] }}')
.openPopup();

</script>

@endsection