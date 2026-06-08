@extends('layouts.app')

@section('title','Tentang SuraTrend')

@section('content')

<style>
body {
    background:
        radial-gradient(circle at top left, rgba(126,240,200,.12), transparent 35%),
        radial-gradient(circle at top right, rgba(255,255,255,.03), transparent 40%),
        #2B5748;
}

.fade-up {
    opacity: 0;
    transform: translateY(40px);
    transition: .8s ease;
}

.fade-up.show {
    opacity: 1;
    transform: translateY(0);
}

.hover-card {
    transition: .35s;
    background: rgba(255,255,255,.06);
    border: 1px solid rgba(255,255,255,.12);
    box-shadow: 0 15px 40px rgba(0,0,0,.12);
}

.hover-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 50px rgba(0,0,0,.18);
}

.hero-image {
    transition: 1s;
}

.hero-image:hover {
    transform: scale(1.03);
}

.glass-card {
    background: rgba(255,255,255,.06);
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
    border: 1px solid rgba(255,255,255,.10);
    border-radius: 32px;
    box-shadow: 0 20px 60px rgba(0,0,0,.12);
}

.glass-card h1,
.glass-card h2,
.glass-card h3,
.glass-card p,
.glass-card span,
.glass-card div {
    color: white;
}

.section-panel {
    background: rgba(255,255,255,.05);
    border: 1px solid rgba(255,255,255,.10);
    border-radius: 32px;
}

.text-muted {
    color: rgba(255,255,255,.72);
}

.text-strong {
    color: #7EF0C8;
}

.modal-backdrop {
    background: rgba(0,0,0,.65);
}

.modal-card {
    background: rgba(15,23,42,.95);
    border: 1px solid rgba(255,255,255,.12);
    border-radius: 32px;
    box-shadow: 0 30px 80px rgba(0,0,0,.25);
}

.modal-card p {
    color: rgba(255,255,255,.75);
}

.modal-card button {
    background: #0D5C46;
    color: white;
}
</style>

<section class="max-w-7xl mx-auto px-6 py-24 fade-up">

<div class="grid lg:grid-cols-2 gap-16 items-center">

<div>

<span class="bg-white/10 text-[#7EF0C8]
px-5 py-2 rounded-full text-sm font-bold tracking-widest">

TENTANG SURATREND

</span>

<h1 class="text-6xl font-extrabold text-white mt-8 leading-tight">

Pantau Tren Lingkungan
Sungai Surabaya

</h1>

<p class="mt-8 text-xl text-white/70">

Ubah data media sosial menjadi insight yang membantu memahami kondisi dan isu lingkungan secara lebih cepat dan terukur.

</p>

</div>

<div>

<img
src="{{ asset('storage/gambar tentang.png') }}"
alt="Tentang SuraTrend"
class="rounded-xl shadow-lg hero-image w-full">

</div>

</div>

</section>

<section class="bg-white/5 py-24 text-center fade-up">

<img
src="{{ asset('storage/misi-icon.png') }}"
alt="Misi"
class="mx-auto h-20 mb-8 animate-pulse">

<h2 class="text-5xl font-extrabold text-white max-w-4xl mx-auto leading-tight">

"Memberikan informasi lingkungan yang mudah diakses mengenai kondisi sungai di Surabaya."

</h2>

<div class="w-24 h-1 bg-[#7EF0C8] mx-auto mt-8"></div>

</section>

<section class="max-w-7xl mx-auto px-6 py-20 fade-up">

<a href="{{ route('peta') }}"
class="block glass-card overflow-hidden hover-card">

<div class="grid lg:grid-cols-2">

<div class="p-12">

<img
src="{{ asset('storage/peta tentang.png') }}"
alt="Peta Interaktif"
class="h-10 mb-6">

<h3 class="text-4xl font-bold text-white">

Peta Interaktif

</h3>

<p class="text-white/70 mt-5">

Visualisasi kondisi sungai Surabaya berbasis data media sosial dan AI.

</p>

<div class="mt-8 inline-flex items-center gap-2
text-[#7EF0C8] font-semibold">

Jelajahi Peta →

</div>

</div>

<img
src="{{ asset('storage/suratrend-tentang.png') }}"
alt="Dashboard SuraTrend"
class="w-full h-full object-cover">

</div>

</a>

<div class="grid md:grid-cols-2 gap-8 mt-8">

<a href="{{ route('prioritas') }}"
class="glass-card p-10 hover-card block">

<img
src="{{ asset('storage/rangking.png') }}"
alt="Ranking"
class="h-8 mb-5">

<h3 class="text-3xl font-bold text-white">
Ranking Sungai
</h3>

<p class="mt-4 text-white/70">

Indeks prioritas sungai berdasarkan hasil analisis SAW.

</p>

<div class="mt-6 text-[#0D5C46] font-semibold">
Lihat Ranking →
</div>

</a>

<div
onclick="openModal()"
class="cursor-pointer glass-card p-10 hover-card">

<img
src="{{ asset('storage/air.png') }}"
alt="Wawasan"
class="h-8 mb-5">

<h3 class="text-3xl font-bold text-white">
Wawasan Mendalam
</h3>

<p class="mt-4 text-white/70">

Analisis AI untuk mengetahui tren dan potensi risiko lingkungan sungai.

</p>

<div class="mt-6 text-[#0D5C46] font-semibold">
Pelajari →
</div>

</div>

</div>

</section>

<div id="modal"
class="fixed inset-0 modal-backdrop hidden z-50">

<div class="flex items-center justify-center h-full">

<div class="modal-card p-10 max-w-lg">

<h3 class="text-3xl font-bold mb-4 text-white">

Wawasan Mendalam

</h3>

<p class="text-white/75">

SuraTrend memanfaatkan analisis media sosial,
pemrosesan bahasa alami (NLP),
dan sistem pemeringkatan untuk
mengidentifikasi tren lingkungan sungai di Surabaya.

</p>

<button
onclick="closeModal()"
class="mt-8 bg-[#0D5C46] text-white px-8 py-3 rounded-xl hover:bg-[#0b4d3b] transition">

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