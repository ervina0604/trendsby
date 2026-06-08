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
src="{{ asset('storage/gambar tentang.png') }}"
alt="Tentang SuraTrend"
class="rounded-xl shadow-lg hero-image w-full">

</div>

</div>

</section>

<section class="bg-[#EAF5EE] py-24 text-center fade-up">

<img
src="{{ asset('storage/misi-icon.png') }}"
alt="Misi"
class="mx-auto h-20 mb-8 animate-pulse">

<h2 class="text-5xl font-extrabold text-slate-900 max-w-4xl mx-auto leading-tight">

"Memberikan informasi lingkungan yang mudah diakses mengenai kondisi sungai di Surabaya."

</h2>

<div class="w-24 h-1 bg-[#2BB673] mx-auto mt-8"></div>

</section>

<section class="max-w-7xl mx-auto px-6 py-20 fade-up">

<a href="{{ route('peta') }}"
class="block border border-[#DDEFE3] rounded-3xl overflow-hidden bg-white hover-card">

<div class="grid lg:grid-cols-2">

<div class="p-12">

<img
src="{{ asset('storage/peta tentang.png') }}"
alt="Peta Interaktif"
class="h-10 mb-6">

<h3 class="text-4xl font-bold">

Peta Interaktif

</h3>


<div class="mt-8 inline-flex items-center gap-2
text-[#0D5C46] font-semibold">

Jelajahi Peta 

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
class="bg-white border border-[#DDEFE3] rounded-3xl p-10 hover-card block">

<img
src="{{ asset('storage/rangking.png') }}"
alt="Ranking"
class="h-8 mb-5">

<h3 class="text-3xl font-bold">
Ranking Sungai
</h3>

<p class="mt-4 text-slate-600">

Menampilkan urutan prioritas sungai yang memerlukan perhatian berdasarkan hasil analisis kondisi lingkungan.

</p>

<div class="mt-6 text-[#0D5C46] font-semibold">
Lihat Ranking →
</div>

</a>

<div
onclick="openModal()"
class="cursor-pointer bg-white border border-[#DDEFE3] rounded-3xl p-10 hover-card">

<img
src="{{ asset('storage/air.png') }}"
alt="Wawasan"
class="h-8 mb-5">

<h3 class="text-3xl font-bold">
Wawasan Mendalam
</h3>

<p class="mt-4 text-slate-600">

Menyajikan hasil analisis data untuk membantu memahami tren, isu, dan potensi risiko lingkungan pada sungai di Surabaya.

</p>

<div class="mt-6 text-[#0D5C46] font-semibold">
Pelajari 
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

SuraTrend memanfaatkan data media sosial, teknologi Natural Language Processing (NLP), analisis gambar, serta sistem pemeringkatan untuk mengidentifikasi kondisi, tren, dan potensi permasalahan lingkungan pada sungai di Surabaya.

</p>

<button
onclick="closeModal()"
class="mt-8 bg-[#0D5C46] hover:bg-[#094532] text-white px-8 py-3 rounded-xl transition">

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