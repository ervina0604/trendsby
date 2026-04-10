@extends('layouts.app')

@section('title','Tentang')

@section('content')

<section class="relative left-1/2 right-1/2 -translate-x-1/2 w-screen min-h-[700px] overflow-hidden mb-16">
    <img src="{{ asset('storage/hero.png') }}" alt="Tentang SuraTrend" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-[#063A67]/88"></div>

    <div class="relative max-w-[1280px] mx-auto px-7 xl:px-8 h-[700px] flex items-center">
        <div class="max-w-[720px] text-white">
            <div class="text-[18px] font-extrabold uppercase tracking-[.12em] text-[#97E082] mb-6">
                THE LIVING ARCHIVE
            </div>

            <h1 class="text-[72px] leading-[1.02] font-extrabold tracking-[-0.05em] mb-6">
                Tentang SuraTrend
            </h1>

            <p class="text-[24px] leading-[1.65] text-white/90 max-w-[680px]">
                Mendokumentasikan narasi digital untuk penyelamatan ekosistem
                Sungai Surabaya melalui analisis data media sosial yang presisi.
            </p>
        </div>
    </div>
</section>

<section class="mb-20">
    <div class="grid grid-cols-1 xl:grid-cols-[1.1fr_.9fr] gap-12 items-center">
        <div>
            <h2 class="text-[54px] leading-none font-extrabold text-[#083B6E] tracking-[-0.04em] mb-8">
                Misi Kami
            </h2>

            <p class="text-[22px] leading-[1.8] text-slate-600 max-w-[700px] mb-12">
                SuraTrend hadir sebagai jembatan antara aktivitas digital dan kesadaran
                lingkungan. Kami percaya bahwa setiap postingan, hashtag, dan diskusi di
                Instagram adalah data berharga yang mencerminkan kepedulian publik terhadap
                Sungai Surabaya.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 max-w-[760px]">
                <div class="glass-card p-8 min-h-[220px]">
                    <img src="{{ asset('storage/isu.png') }}" alt="Dokumentasi Isu" class="w-8 h-8 object-contain mb-6">
                    <h3 class="text-[28px] font-extrabold text-[#083B6E] tracking-[-0.03em] mb-4">
                        Dokumentasi Isu
                    </h3>
                    <p class="text-[18px] leading-[1.8] text-slate-500">
                        Mengarsipkan setiap pergerakan isu lingkungan secara sistematis.
                    </p>
                </div>

                <div class="glass-card p-8 min-h-[220px]">
                    <img src="{{ asset('storage/analisis.png') }}" alt="Analisis Tren" class="w-8 h-8 object-contain mb-6">
                    <h3 class="text-[28px] font-extrabold text-[#083B6E] tracking-[-0.03em] mb-4">
                        Analisis Tren
                    </h3>
                    <p class="text-[18px] leading-[1.8] text-slate-500">
                        Menemukan pola dari ribuan interaksi digital untuk strategi advokasi.
                    </p>
                </div>
            </div>
        </div>

        <div class="relative flex justify-center xl:justify-end">
            <div class="relative w-full max-w-[500px] min-h-[620px]">
                <img src="{{ asset('storage/safe.png') }}" alt="Poster Visual" class="w-full h-[620px] object-cover rounded-[34px] shadow-[0_20px_40px_rgba(15,23,42,0.16)]">

                <div class="absolute left-[-24px] bottom-[-24px] bg-[#F6DCC7] rounded-[16px] px-7 py-5 shadow-[0_12px_24px_rgba(15,23,42,0.12)] max-w-[250px]">
                    <div class="text-[16px] font-extrabold text-[#4A2F20] mb-2">
                        Rising Awareness
                    </div>
                    <div class="text-[36px] leading-none font-extrabold text-[#4A2F20] tracking-[-0.04em] mb-2">
                        +24%
                    </div>
                    <div class="text-[15px] leading-[1.7] text-[#8B6B57]">
                        Peningkatan keterlibatan publik dalam 30 hari terakhir.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mb-16">
    <h2 class="text-[54px] leading-none font-extrabold text-[#083B6E] tracking-[-0.04em] text-center mb-14">
        Metodologi Analisis
    </h2>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-10">
        <div class="relative pt-10">
            <div class="absolute left-0 top-0 text-[92px] leading-none font-extrabold text-slate-200/60 tracking-[-0.05em]">
                01
            </div>

            <h3 class="text-[30px] font-extrabold text-[#083B6E] tracking-[-0.03em] mb-4 relative z-10">
                Frekuensi Hashtag
            </h3>

            <p class="text-[18px] leading-[1.8] text-slate-500 mb-8 relative z-10">
                Melacak penggunaan hashtag populer seperti #SaveSurabayaRiver untuk mengukur
                volume percakapan publik dari waktu ke waktu.
            </p>

            <div class="mt-8">
                <div class="w-full h-[8px] rounded-full bg-slate-200 overflow-hidden">
                    <div class="w-[68%] h-full bg-[#2E7D32] rounded-full"></div>
                </div>
            </div>
        </div>

        <div class="relative pt-10">
            <div class="absolute left-0 top-0 text-[92px] leading-none font-extrabold text-slate-200/60 tracking-[-0.05em]">
                02
            </div>

            <h3 class="text-[30px] font-extrabold text-[#083B6E] tracking-[-0.03em] mb-4 relative z-10">
                Keyword Caption
            </h3>

            <p class="text-[18px] leading-[1.8] text-slate-500 mb-8 relative z-10">
                Menggunakan Natural Language Processing sederhana untuk mengekstrak kata kunci
                dominan dalam setiap caption postingan terkait.
            </p>

            <div class="flex flex-wrap gap-3 mt-8">
                <span class="inline-flex items-center h-[30px] px-4 rounded-full bg-[#DCE5EE] text-[#325E86] text-[13px] font-extrabold">
                    Limbah
                </span>
                <span class="inline-flex items-center h-[30px] px-4 rounded-full bg-[#CFEFCB] text-[#2E7D32] text-[13px] font-extrabold">
                    Konservasi
                </span>
                <span class="inline-flex items-center h-[30px] px-4 rounded-full bg-[#DCE5EE] text-[#325E86] text-[13px] font-extrabold">
                    Pencemaran
                </span>
            </div>
        </div>

        <div class="relative pt-10">
            <div class="absolute left-0 top-0 text-[92px] leading-none font-extrabold text-slate-200/60 tracking-[-0.05em]">
                03
            </div>

            <h3 class="text-[30px] font-extrabold text-[#083B6E] tracking-[-0.03em] mb-4 relative z-10">
                Tren Waktu
            </h3>

            <p class="text-[18px] leading-[1.8] text-slate-500 mb-8 relative z-10">
                Menganalisis periode puncak aktivitas postingan untuk mengidentifikasi momen
                krisis atau kejadian lingkungan tertentu.
            </p>

            <div class="mt-8 h-[90px] flex items-end gap-3">
                <div class="w-full h-[18%] bg-[#C7D7E5] rounded-t-[4px]"></div>
                <div class="w-full h-[34%] bg-[#94B1C8] rounded-t-[4px]"></div>
                <div class="w-full h-[58%] bg-[#0B5B94] rounded-t-[4px]"></div>
                <div class="w-full h-[26%] bg-[#7F9DB7] rounded-t-[4px]"></div>
            </div>
        </div>
    </div>
</section>

<section class="mb-10">
    <div class="rounded-[34px] bg-[#063A67] px-10 py-10 xl:px-12 xl:py-12 flex flex-col xl:flex-row xl:items-center xl:justify-between gap-8">
        <div class="max-w-[650px]">
            <h2 class="text-[42px] leading-[1.12] font-extrabold text-white tracking-[-0.04em] mb-5">
                Mulai Eksplorasi Data Sekarang
            </h2>

            <p class="text-[20px] leading-[1.8] text-white/75">
                Dapatkan wawasan mendalam tentang pergerakan isu lingkungan di
                Surabaya melalui dashboard interaktif kami.
            </p>
        </div>

        <div>
            <a href="{{ route('dashboard') }}"
               class="inline-flex items-center justify-center h-[62px] px-10 rounded-full bg-[#2E9F43] text-white text-[20px] font-extrabold hover:opacity-95 transition shadow-[0_12px_24px_rgba(46,159,67,0.22)]">
                Buka Dashboard
            </a>
        </div>
    </div>
</section>

@endsection