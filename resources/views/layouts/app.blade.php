<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','SuraTrend')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

    <style>
        body{
            font-family:'Manrope',sans-serif;
            background:#f3f4f6;
        }

        .glass-card{
            background:white;
            border-radius:28px;
            box-shadow:0 2px 12px rgba(15,23,42,.04);
        }
    </style>
</head>

<body class="text-slate-800">

<!-- Navbar -->
<nav class="fixed top-0 left-0 right-0 z-[9999] bg-white/95 backdrop-blur border-b border-slate-200 shadow-sm">

    <div class="max-w-[1280px] mx-auto px-8 h-20 flex items-center justify-between">

        <!-- Left -->
        <div class="flex items-center gap-12">

            <!-- Logo -->
            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 font-black text-[38px] text-[#083B6E] tracking-tight">

                <img src="{{ asset('storage/logo.png') }}"
                     class="w-8 h-8"
                     alt="logo">

                <span>SuraTrend</span>
            </a>

            <!-- Menu -->
            <div class="hidden lg:flex items-center gap-8 text-[18px] font-semibold relative z-[9999]">

                <!-- Dashboard -->
                <a href="{{ route('dashboard') }}"
                   class="{{ request()->routeIs('dashboard')
                        ? 'text-[#083B6E] font-bold relative after:absolute after:-bottom-3 after:left-0 after:w-full after:h-[3px] after:bg-[#2E9F43] after:rounded-full'
                        : 'text-slate-500 hover:text-[#083B6E] transition duration-200' }}">
                    Dashboard
                </a>

                <!-- Hashtag -->
                <a href="{{ route('hashtag') }}"
                   class="{{ request()->routeIs('hashtag')
                        ? 'text-[#083B6E] font-bold relative after:absolute after:-bottom-3 after:left-0 after:w-full after:h-[3px] after:bg-[#2E9F43] after:rounded-full'
                        : 'text-slate-500 hover:text-[#083B6E] transition duration-200' }}">
                    Hashtag Populer
                </a>

                <!-- Keyword -->
                <a href="{{ route('keyword') }}"
                   class="{{ request()->routeIs('keyword')
                        ? 'text-[#083B6E] font-bold relative after:absolute after:-bottom-3 after:left-0 after:w-full after:h-[3px] after:bg-[#2E9F43] after:rounded-full'
                        : 'text-slate-500 hover:text-[#083B6E] transition duration-200' }}">
                    Keyword Dominan
                </a>

                <!-- Tentang -->
                <a href="{{ route('tentang') }}"
                   class="{{ request()->routeIs('tentang')
                        ? 'text-[#083B6E] font-bold relative after:absolute after:-bottom-3 after:left-0 after:w-full after:h-[3px] after:bg-[#2E9F43] after:rounded-full'
                        : 'text-slate-500 hover:text-[#083B6E] transition duration-200' }}">
                    Tentang
                </a>

            </div>
        </div>

        <!-- Search -->
        <div class="relative hidden md:block">

            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-[22px]">
                search
            </span>

            <input
                type="text"
                placeholder="Cari tren..."
                class="w-72 h-12 rounded-full bg-slate-100 border-0 pl-12 pr-5 text-sm focus:outline-none focus:ring-2 focus:ring-sky-200"
            >

        </div>

    </div>

</nav>

<!-- Content -->
<main class="max-w-[1280px] mx-auto px-8 pt-36 pb-20">
    @yield('content')
</main>

<!-- Footer -->
<footer class="border-t border-slate-200 mt-10 bg-white">

    <div class="max-w-[1280px] mx-auto px-8 py-10 flex flex-col md:flex-row md:items-center md:justify-between gap-4 text-slate-400 text-sm">

        <div>

            <h3 class="font-bold text-[#083B6E] text-xl mb-2">
                SuraTrend Living Archive
            </h3>

            <p>
                © 2026 SuraTrend Living Archive.
                All rights reserved.
                Environmental Data Analytics.
            </p>

        </div>

        <a href="#"
           class="hover:text-[#083B6E] transition">
            Terms and Conditions
        </a>

    </div>

</footer>

<!-- Script -->
<script>
    document.addEventListener('click', function(e){

        const btn = e.target.closest && e.target.closest('button[data-href]');

        if(!btn) return;

        const href = btn.getAttribute('data-href');

        if(!href) return;

        if(btn.type && btn.type.toLowerCase() === 'submit') return;

        window.location.href = href;
    });
</script>

</body>
</html>