@extends('layouts.app')

@section('title','SuraTrend')

@section('content')

<section class="max-w-7xl mx-auto px-6 py-24">

<div class="grid lg:grid-cols-2 gap-16 items-center">

<div>

<span class="bg-[#E6F0EB] text-[#0D5C46]
px-5 py-2 rounded-full text-sm font-bold tracking-widest">

TENTANG SURATREND

</span>

<h1 class="text-6xl font-extrabold text-[#0D5C46] mt-8 leading-tight">

Pantau Tren Lingkungan
Sungai Surabaya

</h1>

<p class="mt-8 text-xl text-slate-600">

Ubah data media sosial menjadi insight yang membantu memahami kondisi dan isu lingkungan secara lebih cepat dan terukur.

</p>

</div>

<div>

<img src="{{ asset('images/gambar tentang.png') }}"
class="rounded-xl shadow-lg">

</div>

</div>

</section>


<section class="bg-[#EEF1F2] py-24 text-center">

<img src="{{ asset('images/misi-icon.png') }}"
class="mx-auto h-20 mb-8">

<h2 class="text-5xl font-extrabold text-slate-900 max-w-4xl mx-auto leading-tight">

"Memberikan informasi lingkungan yang mudah diakses mengenai kondisi sungai di Surabaya."

</h2>

<div class="w-24 h-1 bg-[#0D5C46] mx-auto mt-8"></div>

</section>


<section class="max-w-7xl mx-auto px-6 py-20">

<div class="border rounded-3xl overflow-hidden bg-white">

<div class="grid lg:grid-cols-2">

<div class="p-12">

<img src="{{ asset('images/peta tentang.png') }}"
class="h-10 mb-6">

<h3 class="text-4xl font-bold">

Peta Interaktif

</h3>

<p class="text-slate-600 mt-5">

Visualisasi kondisi sungai Surabaya berbasis data media sosial dan AI.

</p>

</div>

<img src="{{ asset('images/suratrend-tentang.png') }}">

</div>

</div>

<div class="grid md:grid-cols-2 gap-8 mt-8">

<div class="bg-white border rounded-3xl p-10">

<img src="{{ asset('images/rangking.png') }}"
class="h-8 mb-5">

<h3 class="text-3xl font-bold">
Ranking Sungai
</h3>

<p class="mt-4 text-slate-600">

Indeks prioritas sungai berdasarkan hasil analisis SAW.

</p>

</div>

<div class="bg-white border rounded-3xl p-10">

<img src="{{ asset('images/air.png') }}"
class="h-8 mb-5">

<h3 class="text-3xl font-bold">
Wawasan Mendalam
</h3>

<p class="mt-4 text-slate-600">

Analisis AI untuk mengetahui tren dan potensi risiko lingkungan sungai.

</p>

</div>

</div>

</section>

@endsection