@extends('layouts.app')

@section('title','Tentang SuraTrend')

@section('content')

<style>

.fade-up{
    opacity:0;
    transform:translateY(40px);
    transition:.8s ease;
}

.fade-up.show{
    opacity:1;
    transform:translateY(0);
}

.hover-card{
    transition:.35s;
}

.hover-card:hover{
    transform:translateY(-8px);
    box-shadow:0 20px 40px rgba(0,0,0,.08);
}

.hero-image{
    transition:1s;
}

.hero-image:hover{
    transform:scale(1.03);
}

</style>

<section class="max-w-7xl mx-auto px-6 py-24 fade-up">

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

<img
src="{{ asset('images/gambar tentang.png') }}"
class="rounded-xl shadow-lg hero-image w-full">

</div>

</div>

</section>


<section class="bg-[#EEF1F2] py-24 text-center fade-up">

<img
src="{{ asset('images/misi-icon.png') }}"
class="mx-auto h-20 mb-8 animate-pulse">

<h2 class="text-5xl font-extrabold text-slate-900 max-w-4xl mx-auto leading-tight">

"Memberikan informasi lingkungan yang mudah diakses mengenai kondisi sungai di Surabaya."

</h2>

<div class="w-24 h-1 bg-[#0D5C46] mx-auto mt-8"></div>

</section>


<section class="max-w-7xl mx-auto px-6 py-20 fade-up">

<a href="{{ route('peta') }}"
class="block border rounded-3xl overflow-hidden bg-white hover-card">

<div class="grid lg:grid-cols-2">

<div class="p-12">

<img
src="{{ asset('images/peta tentang.png') }}"
class="h-10 mb-6">

<h3 class="text-4xl font-bold">

Peta Interaktif

</h3>

<p class="text-slate-600 mt-5">

Visualisasi kondisi sungai Surabaya berbasis data media sosial dan AI.

</p>

<div class="mt-8 inline-flex items-center gap-2
text-[#0D5C46] font-semibold">

Jelajahi Peta →

</div>

</div>

<img
src="{{ asset('images/suratrend-tentang.png') }}"
class="w-full h-full object-cover">

</div>

</a>


<div class="grid md:grid-cols-2 gap-8 mt-8">

<a href="{{ route('prioritas') }}"
class="bg-white border rounded-3xl p-10 hover-card block">

<img
src="{{ asset('images/rangking.png') }}"
class="h-8 mb-5">

<h3 class="text-3xl font-bold">
Ranking Sungai
</h3>

<p class="mt-4 text-slate-600">

Indeks prioritas sungai berdasarkan hasil analisis SAW.

</p>

<div class="mt-6 text-[#0D5C46] font-semibold">
Lihat Ranking →
</div>

</a>


<div
onclick="openModal()"
class="cursor-pointer bg-white border rounded-3xl p-10 hover-card">

<img
src="{{ asset('images/air.png') }}"
class="h-8 mb-5">

<h3 class="text-3xl font-bold">
Wawasan Mendalam
</h3>

<p class="mt-4 text-slate-600">

Analisis AI untuk mengetahui tren dan potensi risiko lingkungan sungai.

</p>

<div class="mt-6 text-[#0D5C46] font-semibold">
Pelajari →
</div>

</div>

</div>

</section>


<div id="modal"
class="fixed inset-0 bg-black/50 hidden z-50">

<div class="flex items-center justify-center h-full">

<div class="bg-white rounded-3xl p-10 max-w-lg">

<h3 class="text-3xl font-bold mb-4">

Wawasan Mendalam

</h3>

<p class="text-slate-600">

SuraTrend memanfaatkan analisis media sosial,
pemrosesan bahasa alami (NLP),
dan sistem pemeringkatan untuk
mengidentifikasi tren lingkungan sungai di Surabaya.

</p>

<button
onclick="closeModal()"
class="mt-8 bg-[#0D5C46] text-white px-8 py-3 rounded-xl">

Tutup

</button>

</div>

</div>

</div>

<script>

const observer = new IntersectionObserver(entries => {

entries.forEach(entry => {

if(entry.isIntersecting){
entry.target.classList.add('show');
}

});

});

document.querySelectorAll('.fade-up').forEach(el => {
observer.observe(el);
});

function openModal(){
document.getElementById('modal').classList.remove('hidden');
}

function closeModal(){
document.getElementById('modal').classList.add('hidden');
}

</script>

@endsection