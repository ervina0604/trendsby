@extends('layouts.app')

<<<<<<< HEAD
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
=======
@section('title','Tentang SuraTrend')

@section('content')

<div class="space-y-16">

    <!-- Hero -->
    <section class="relative overflow-hidden rounded-[34px] min-h-[500px] flex items-center px-10 py-16">

        <!-- Background -->
        <img src="{{ asset('storage/about-bg.png') }}"
             alt="Tentang SuraTrend"
             class="absolute inset-0 w-full h-full object-cover">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-[#063A67]/85"></div>

        <!-- Content -->
        <div class="relative z-10 max-w-3xl text-white">

            <div class="uppercase tracking-[.25em] text-xs font-bold text-[#B9D7F0] mb-6">
                The Living Archive
            </div>

            <h1 class="text-[64px] leading-none font-extrabold mb-6">
                Tentang SuraTrend
            </h1>

            <p class="text-xl leading-9 text-slate-200 max-w-2xl">
                Mendokumentasikan narasi digital untuk penyelamatan ekosistem Sungai Surabaya melalui analisis data media sosial yang presisi.
            </p>
>>>>>>> 0f4e1d45621335f5591d9ba88f95c19b1bf03003

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

<<<<<<< HEAD
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
=======
    </section>

    <!-- About -->
    <section class="grid lg:grid-cols-[1fr_.8fr] gap-10 items-center">

        <!-- Left -->
        <div>

            <h2 class="text-[38px] font-extrabold text-[#083B6E] mb-6">
                Misi Kami
            </h2>

            <p class="text-slate-500 text-lg leading-9 mb-10">
                SuraTrend hadir sebagai jembatan antara aktivitas digital dan kesadaran lingkungan.
                Kami percaya bahwa setiap postingan, hashtag, dan diskusi di lingkungan digital
                membawa pengaruh besar terhadap persepsi masyarakat.
            </p>

            <!-- Cards -->
            <div class="grid md:grid-cols-2 gap-5">

                <div class="glass-card p-6">

                    <div class="text-[#2E9F43] text-2xl mb-4">
                        ◈
                    </div>

                    <h3 class="font-bold text-[#083B6E] mb-3">
                        Dokumentasi Isu
                    </h3>

                    <p class="text-slate-500 leading-7 text-sm">
                        Mengarsipkan setiap percakapan lingkungan secara sistematis.
                    </p>

                </div>

                <div class="glass-card p-6">

                    <div class="text-[#2E9F43] text-2xl mb-4">
                        ▣
                    </div>

                    <h3 class="font-bold text-[#083B6E] mb-3">
                        Analisis Tren
                    </h3>

                    <p class="text-slate-500 leading-7 text-sm">
                        Memetakan pola diskusi melalui data visual dan statistik.
                    </p>

                </div>

            </div>

        </div>

        <!-- Right -->
        <div class="relative">

            <div class="relative rounded-[32px] overflow-hidden shadow-xl h-[520px] bg-[#0B2D1F]">

                <img src="/storage/safe.png"
                    alt="safe"
                    class="absolute inset-0 w-full h-full object-contain">

            </div>

            <!-- Floating Card -->
            <div class="absolute -bottom-5 -left-5 bg-[#EBC9A8] rounded-2xl px-5 py-4 shadow-lg">

                <div class="text-xs uppercase tracking-[.2em] text-[#7A4B15] font-bold mb-2">
                    Rising Awareness
                </div>

                <div class="text-[#7A4B15] font-extrabold text-xl">
                    +23%
                </div>

                <div class="text-[#7A4B15] text-sm">
                    social interaction growth
                </div>

            </div>

        </div>

    </section>

    <!-- Methodology -->
    <section>

        <div class="text-center mb-14">

            <h2 class="text-[42px] font-extrabold text-[#083B6E] mb-4">
                Metodologi Analisis
            </h2>

            <p class="text-slate-500 text-lg">
                Pendekatan data yang digunakan dalam SuraTrend
            </p>

        </div>

        <div class="grid lg:grid-cols-3 gap-8">

            <!-- Card -->
            <div class="glass-card p-7 relative overflow-hidden">

                <div class="absolute right-5 top-2 text-[90px] font-black text-slate-100">
                    01
                </div>

                <h3 class="text-[#083B6E] font-extrabold text-xl mb-5">
                    Analisis Hashtag
                </h3>

                <p class="text-slate-500 leading-8 mb-8">
                    Melacak penggunaan hashtag populer terkait lingkungan dan konservasi sungai.
                </p>

                <div class="h-2 rounded-full bg-slate-100 overflow-hidden">
                    <div class="h-full w-[78%] bg-[#2E9F43]"></div>
                </div>

            </div>

            <!-- Card -->
            <div class="glass-card p-7 relative overflow-hidden">

                <div class="absolute right-5 top-2 text-[90px] font-black text-slate-100">
                    02
                </div>

                <h3 class="text-[#083B6E] font-extrabold text-xl mb-5">
                    Keyword Clustering
                </h3>

                <p class="text-slate-500 leading-8 mb-8">
                    Menggunakan Natural Language Processing untuk mengelompokkan kata kunci dominan.
                </p>

                <div class="flex gap-2 flex-wrap">

                    <span class="bg-slate-100 px-4 py-2 rounded-full text-sm text-slate-500">
                        Insight
                    </span>

                    <span class="bg-[#DDF7E3] text-[#2E9F43] px-4 py-2 rounded-full text-sm font-bold">
                        Narrative
                    </span>

                    <span class="bg-slate-100 px-4 py-2 rounded-full text-sm text-slate-500">
                        Processing
                    </span>

                </div>

            </div>

            <!-- Card -->
            <div class="glass-card p-7 relative overflow-hidden">

                <div class="absolute right-5 top-2 text-[90px] font-black text-slate-100">
                    03
                </div>

                <h3 class="text-[#083B6E] font-extrabold text-xl mb-5">
                    Trend Visual
                </h3>

                <p class="text-slate-500 leading-8 mb-8">
                    Menghasilkan visualisasi data interaktif untuk eksplorasi insight lingkungan.
                </p>

                <div class="flex items-end gap-2 h-20">

                    <div class="w-8 bg-[#DCEFFD] h-[35%]"></div>
                    <div class="w-8 bg-[#0B5B94] h-[70%]"></div>
                    <div class="w-8 bg-[#5C8DB7] h-[48%]"></div>
                    <div class="w-8 bg-[#A7C7E3] h-[25%]"></div>

                </div>

            </div>

        </div>

    </section>

    <!-- CTA -->
    <section class="rounded-[30px] bg-[#063A67] px-10 py-10 flex flex-col lg:flex-row items-center justify-between gap-8">

        <div>

            <h2 class="text-[38px] font-extrabold text-white mb-4">
                Mulai Eksplorasi Data Sekarang
            </h2>

            <p class="text-slate-300 text-lg leading-8 max-w-2xl">
                Dapatkan wawasan mendalam tentang percakapan lingkungan di Sungai Surabaya melalui dashboard interaktif kami.
            </p>

        </div>

        <a href="{{ route('dashboard') }}"
           class="bg-[#7AD66A] hover:bg-[#8AE67B] transition px-8 py-4 rounded-full font-bold text-[#063A67] whitespace-nowrap">

            Buka Dashboard

        </a>

    </section>

</div>
>>>>>>> 0f4e1d45621335f5591d9ba88f95c19b1bf03003

@endsection