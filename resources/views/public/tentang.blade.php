@extends('layouts.app')

@section('title','Tentang')

@section('content')

<!-- HERO -->
<section class="relative w-full h-[420px] rounded-none overflow-hidden mb-16">

    <img src="{{ asset('storage/hero.png') }}"
         class="absolute inset-0 w-full h-full object-cover">

    <div class="absolute inset-0 bg-[#0A3A67]/90"></div>

    <div class="relative z-10 max-w-[1100px] px-8 h-full flex flex-col justify-center text-white">
        <div class="text-xs uppercase tracking-[.25em] text-green-400 mb-4 font-bold">
            The Living Archive
        </div>

        <h1 class="text-[48px] font-extrabold mb-4 leading-tight">
            Tentang SuraTrend
        </h1>

        <p class="text-lg text-gray-200 max-w-2xl leading-8">
            Mendokumentasikan narasi digital untuk penyelamatan ekosistem Sungai Surabaya melalui analisis data media sosial yang presisi.
        </p>
    </div>

</section>

<!-- MISI -->
<section class="grid lg:grid-cols-2 gap-12 items-center mb-20">

    <div>
        <h2 class="text-[30px] font-extrabold text-[#0A3A67] mb-4">
            Misi Kami
        </h2>

        <p class="text-gray-500 leading-8 mb-8 max-w-lg">
            SuraTrend hadir sebagai jembatan antara aktivitas digital dan kesadaran lingkungan. Kami percaya bahwa setiap postingan, hashtag, dan diskusi di Instagram adalah data berharga yang mencerminkan kepedulian publik terhadap Sungai Surabaya.
        </p>

        <div class="grid grid-cols-2 gap-6">

            <!-- CARD 1 -->
            <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center mb-4">
                    <span class="text-green-600 text-xl">💧</span>
                </div>

                <h3 class="font-bold text-[#0A3A67] mb-2">
                    Dokumentasi Isu
                </h3>

                <p class="text-sm text-gray-500 leading-6">
                    Mengarsipkan setiap pergerakan isu lingkungan secara sistematis.
                </p>
            </div>

            <!-- CARD 2 -->
            <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center mb-4">
                    <span class="text-green-600 text-xl">📊</span>
                </div>

                <h3 class="font-bold text-[#0A3A67] mb-2">
                    Analisis Tren
                </h3>

                <p class="text-sm text-gray-500 leading-6">
                    Menemukan pola dari ribuan interaksi digital untuk strategi advokasi.
                </p>
            </div>

        </div>

    </div>

    <!-- IMAGE RIGHT -->
    <div class="relative">
        <img src="{{ asset('storage/safe.png') }}"
             class="rounded-[28px] shadow-lg w-full">

        <!-- FLOATING CARD -->
        <div class="absolute -bottom-6 left-6 bg-[#F4D7C1] px-5 py-4 rounded-xl shadow-md">
            <div class="text-sm font-bold text-[#7A4B15]">
                Rising Awareness +24%
            </div>
            <div class="text-xs text-[#7A4B15]">
                Peningkatan keterlibatan publik dalam 30 hari terakhir.
            </div>
        </div>
    </div>

</section>

<!-- METODOLOGI -->
<section class="mb-20">

    <h2 class="text-center text-[32px] font-extrabold text-[#0A3A67] mb-12">
        Metodologi Analisis
    </h2>

    <div class="grid md:grid-cols-3 gap-10">

        <!-- ITEM 1 -->
        <div>
            <div class="text-6xl font-extrabold text-gray-100 mb-4">01</div>

            <h3 class="font-bold text-[#0A3A67] mb-2">
                Frekuensi Hashtag
            </h3>

            <p class="text-gray-500 text-sm leading-6 mb-4">
                Melacak penggunaan hashtag populer seperti #SaveSurabayaRiver untuk mengukur volume percakapan publik dari waktu ke waktu.
            </p>

            <div class="w-full h-2 bg-gray-200 rounded-full">
                <div class="w-3/4 h-2 bg-green-600 rounded-full"></div>
            </div>
        </div>

        <!-- ITEM 2 -->
        <div>
            <div class="text-6xl font-extrabold text-gray-100 mb-4">02</div>

            <h3 class="font-bold text-[#0A3A67] mb-2">
                Keyword Caption
            </h3>

            <p class="text-gray-500 text-sm leading-6 mb-4">
                Menggunakan Natural Language Processing sederhana untuk mengekstrak kata kunci dominan dalam setiap caption postingan terkait.
            </p>

            <div class="flex gap-2 flex-wrap text-xs">
                <span class="bg-gray-100 px-3 py-1 rounded-full">Limbah</span>
                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">Konservasi</span>
                <span class="bg-gray-100 px-3 py-1 rounded-full">Pencemaran</span>
            </div>
        </div>

        <!-- ITEM 3 -->
        <div>
            <div class="text-6xl font-extrabold text-gray-100 mb-4">03</div>

            <h3 class="font-bold text-[#0A3A67] mb-2">
                Tren Waktu
            </h3>

            <p class="text-gray-500 text-sm leading-6 mb-4">
                Menganalisis periode puncak aktivitas postingan untuk mengidentifikasi momen krisis atau kejadian lingkungan tertentu.
            </p>

            <div class="flex items-end gap-2 h-16">
                <div class="w-10 bg-gray-300 h-4"></div>
                <div class="w-10 bg-gray-400 h-6"></div>
                <div class="w-10 bg-[#0A3A67] h-10"></div>
                <div class="w-10 bg-gray-400 h-5"></div>
            </div>
        </div>

    </div>

</section>

<!-- CTA -->
<section class="bg-[#0A3A67] rounded-[28px] p-10 flex flex-col md:flex-row justify-between items-center gap-6 text-white">

    <div>
        <h3 class="text-[24px] font-bold mb-2">
            Mulai Eksplorasi Data Sekarang
        </h3>

        <p class="text-gray-300 max-w-xl">
            Dapatkan wawasan mendalam tentang pergerakan isu lingkungan di Surabaya melalui dashboard interaktif kami.
        </p>
    </div>

    <a href="/dashboard"
       class="bg-green-600 hover:bg-green-700 px-6 py-3 rounded-full font-bold transition">
        Buka Dashboard
    </a>

</section>

@endsection