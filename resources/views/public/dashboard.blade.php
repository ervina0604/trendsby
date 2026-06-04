@extends('layouts.app')

@section('title','Home')

@section('content')

<div class="max-w-7xl mx-auto px-6">

    {{-- HERO --}}
    <section class="grid lg:grid-cols-2 gap-14 items-center mb-24">

        <div>

            <h1 class="text-6xl font-extrabold text-[#04543D] leading-tight mb-8">
                Pantau Kondisi Sungai Surabaya Secara Interaktif
            </h1>

            <p class="text-xl text-gray-600 leading-relaxed mb-10">
                Temukan informasi kondisi sungai, dokumentasi lapangan,
                dan perkembangan isu lingkungan di berbagai wilayah Surabaya.
            </p>

            <div class="flex gap-4">

                <a href="{{ route('peta') }}"
                   class="bg-[#04543D] text-white px-8 py-4 rounded-2xl font-bold">
                    Jelajahi Sungai
                </a>

                <a href="{{ route('prioritas') }}"
                   class="border border-gray-300 px-8 py-4 rounded-2xl font-bold">
                    Lihat Prioritas
                </a>

            </div>

        </div>

        <div>
            <img
                src="{{ asset('images/gambar-tentang.png') }}"
                class="rounded-xl w-full shadow-lg"
            >
        </div>

    </section>


    {{-- STATISTIK --}}
    <section class="grid md:grid-cols-4 gap-6 mb-16">

        <div class="card p-6 border-t-4 border-green-700">
            <div class="text-gray-500 uppercase text-xs mb-4">
                Total Dipantau
            </div>

            <div class="text-5xl font-bold text-[#04543D]">
                18
            </div>
        </div>

        <div class="card p-6 border-t-4 border-green-500">
            <div class="text-gray-500 uppercase text-xs mb-4">
                Baik
            </div>

            <div class="text-5xl font-bold text-green-500">
                7
            </div>
        </div>

        <div class="card p-6 border-t-4 border-yellow-500">
            <div class="text-gray-500 uppercase text-xs mb-4">
                Perlu Perhatian
            </div>

            <div class="text-5xl font-bold text-yellow-500">
                6
            </div>
        </div>

        <div class="card p-6 border-t-4 border-red-500">
            <div class="text-gray-500 uppercase text-xs mb-4">
                Prioritas Tinggi
            </div>

            <div class="text-5xl font-bold text-red-500">
                5
            </div>
        </div>

    </section>


    {{-- PETA --}}
    <section class="card p-6 mb-20">

        <img
            src="{{ asset('images/peta-tentang.png') }}"
            class="w-full rounded-2xl"
        >

    </section>


    {{-- ISU --}}
    <section>

        <h2 class="text-5xl font-extrabold text-[#04543D] mb-10">
            Isu Utama Sungai
        </h2>

        <div class="grid md:grid-cols-3 gap-6">

            <div class="card p-6">
                <img src="{{ asset('images/sampah.png') }}" class="w-12 mb-5">
                <h3 class="font-bold text-2xl mb-2">Sampah Plastik</h3>
                <div class="text-4xl text-[#04543D]">82%</div>
            </div>

            <div class="card p-6">
                <img src="{{ asset('images/air.png') }}" class="w-12 mb-5">
                <h3 class="font-bold text-2xl mb-2">Pencemaran Air</h3>
                <div class="text-4xl text-[#04543D]">45%</div>
            </div>

            <div class="card p-6">
                <img src="{{ asset('images/limbah.png') }}" class="w-12 mb-5">
                <h3 class="font-bold text-2xl mb-2">Limbah Domestik</h3>
                <div class="text-4xl text-[#04543D]">68%</div>
            </div>

            <div class="card p-6">
                <img src="{{ asset('images/banjir.png') }}" class="w-12 mb-5">
                <h3 class="font-bold text-2xl mb-2">Risiko Banjir</h3>
                <div class="text-4xl text-[#04543D]">30%</div>
            </div>

            <div class="card p-6">
                <img src="{{ asset('images/sedimentasi.png') }}" class="w-12 mb-5">
                <h3 class="font-bold text-2xl mb-2">Sedimentasi</h3>
                <div class="text-4xl text-[#04543D]">54%</div>
            </div>

            <div class="card p-6">
                <img src="{{ asset('images/rumahtangga.png') }}" class="w-12 mb-5">
                <h3 class="font-bold text-2xl mb-2">Sampah Rumah Tangga</h3>
                <div class="text-4xl text-[#04543D]">76%</div>
            </div>

        </div>

    </section>

</div>

@endsection