@extends('layouts.app')

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

        </div>

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

@endsection