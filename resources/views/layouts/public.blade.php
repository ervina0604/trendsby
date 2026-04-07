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

<!-- NAVBAR -->
<nav class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur border-b border-slate-200">
    <div class="max-w-[1280px] mx-auto px-8 h-20 flex items-center justify-between">

        <div class="flex items-center gap-12">

            <!-- LOGO -->
            <a href="/dashboard" class="flex items-center gap-3 group">
                <img src="{{ asset('storage/logo.png') }}"
                     class="w-9 h-9 object-contain"
                     alt="SuraTrend Logo">

                <span class="font-black text-[32px] text-[#083B6E] tracking-tight group-hover:opacity-80 transition">
                    SuraTrend
                </span>
            </a>

            <!-- MENU -->
            <div class="hidden lg:flex items-center gap-8 text-[18px] font-semibold">

                <a href="/dashboard"
                   class="{{ request()->is('dashboard') ? 'text-[#083B6E] relative after:absolute after:-bottom-3 after:left-0 after:w-full after:h-[3px] after:bg-[#2E9F43] after:rounded-full' : 'text-slate-500 hover:text-[#083B6E]' }}">
                    Dashboard
                </a>

                <a href="/hashtag-populer"
                   class="{{ request()->is('hashtag-populer') ? 'text-[#083B6E] relative after:absolute after:-bottom-3 after:left-0 after:w-full after:h-[3px] after:bg-[#2E9F43] after:rounded-full' : 'text-slate-500 hover:text-[#083B6E]' }}">
                    Hashtag Populer
                </a>

                <a href="/keyword-dominan"
                   class="{{ request()->is('keyword-dominan') ? 'text-[#083B6E] relative after:absolute after:-bottom-3 after:left-0 after:w-full after:h-[3px] after:bg-[#2E9F43] after:rounded-full' : 'text-slate-500 hover:text-[#083B6E]' }}">
                    Keyword Dominan
                </a>

                <a href="/tentang"
                   class="{{ request()->is('tentang') ? 'text-[#083B6E] relative after:absolute after:-bottom-3 after:left-0 after:w-full after:h-[3px] after:bg-[#2E9F43] after:rounded-full' : 'text-slate-500 hover:text-[#083B6E]' }}">
                    Tentang
                </a>

            </div>
        </div>

        <!-- SEARCH -->
        <div class="relative hidden md:block">
            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-[22px]">search</span>
            <input
                type="text"
                placeholder="Cari tren..."
                class="w-72 h-12 rounded-full bg-slate-100 border-0 pl-12 pr-5 text-sm focus:outline-none focus:ring-2 focus:ring-sky-200"
            >
        </div>

    </div>
</nav>

<!-- CONTENT -->
<main class="max-w-[1280px] mx-auto px-8 pt-36 pb-20">
    @yield('content')
</main>

<!-- FOOTER -->
<footer class="border-t border-slate-200 mt-10 bg-white">
    <div class="max-w-[1280px] mx-auto px-8 py-10 flex flex-col md:flex-row md:items-center md:justify-between gap-4 text-slate-400 text-sm">

        <div>
            <h3 class="font-bold text-[#083B6E] text-xl mb-2">
                SuraTrend Living Archive
            </h3>
            <p>
                © 2026 SuraTrend Living Archive. All rights reserved. Environmental Data Analytics.
            </p>
        </div>

        <!-- LINK FOOTER -->
        <a href="/terms" class="hover:text-[#083B6E] transition">
            Terms and Conditions
        </a>

    </div>
</footer>

</body>
</html>