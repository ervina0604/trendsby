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
        body { font-family:'Manrope',sans-serif; background:#f3f4f6; }
        .glass-card { background:white; border-radius:28px; box-shadow:0 2px 12px rgba(15,23,42,.04); }
        .nav-link { position:relative; font-size:15px; font-weight:600; color:#64748b; transition:color .2s; white-space:nowrap; }
        .nav-link:hover { color:#083B6E; }
        .nav-link.active { color:#083B6E; font-weight:700; }
        .nav-link.active::after {
            content:'';
            position:absolute;
            bottom:-22px;
            left:0; right:0;
            height:3px;
            background:#2E9F43;
            border-radius:99px;
        }
    </style>
</head>

<body class="text-slate-800">

<nav class="fixed top-0 left-0 right-0 z-[9999] bg-white/95 backdrop-blur border-b border-slate-200 shadow-sm">
    <div class="max-w-[1280px] mx-auto px-6 h-18 flex items-center justify-between gap-6">

        {{-- Logo --}}
        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-2 font-black text-[26px] text-[#083B6E] tracking-tight shrink-0">
            <img src="{{ asset('storage/logo.png') }}" class="w-7 h-7" alt="logo">
            <span>SuraTrend</span>
        </a>

        {{-- Menu --}}
        <div class="hidden lg:flex items-center gap-6">

            <a href="{{ route('dashboard') }}"
               class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                Dashboard
            </a>

            <a href="{{ route('hashtag') }}"
               class="nav-link {{ request()->routeIs('hashtag') ? 'active' : '' }}">
                Hashtag
            </a>

            <a href="{{ route('keyword') }}"
               class="nav-link {{ request()->routeIs('keyword') ? 'active' : '' }}">
                Keyword
            </a>

            <a href="{{ route('sentiment') }}"
               class="nav-link {{ request()->routeIs('sentiment') ? 'active' : '' }}">
                Sentimen
            </a>

            <a href="{{ route('tentang') }}"
               class="nav-link {{ request()->routeIs('tentang') ? 'active' : '' }}">
                Tentang
            </a>

        </div>

        {{-- Search --}}
        <div class="relative hidden md:block shrink-0">
            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-[20px]">
                search
            </span>
            <input
                type="text"
                placeholder="Cari tren..."
                class="w-56 h-11 rounded-full bg-slate-100 border-0 pl-11 pr-4 text-sm focus:outline-none focus:ring-2 focus:ring-sky-200"
            >
        </div>

    </div>
</nav>

<main class="max-w-[1280px] mx-auto px-8 pt-36 pb-20">
    @yield('content')
</main>

<footer class="border-t border-slate-200 mt-10 bg-white">
    <div class="max-w-[1280px] mx-auto px-8 py-10 flex flex-col md:flex-row md:items-center md:justify-between gap-4 text-slate-400 text-sm">

        <div>
            <h3 class="font-bold text-[#083B6E] text-xl mb-2">SuraTrend Living Archive</h3>
            <p>© 2026 SuraTrend Living Archive. All rights reserved. Environmental Data Analytics.</p>
        </div>

        {{-- Footer links --}}
        <div class="flex items-center gap-6 text-sm font-semibold">
            <a href="{{ route('dashboard') }}" class="hover:text-[#083B6E] transition">Dashboard</a>
            <a href="{{ route('hashtag') }}"   class="hover:text-[#083B6E] transition">Hashtag</a>
            <a href="{{ route('keyword') }}"   class="hover:text-[#083B6E] transition">Keyword</a>
            <a href="{{ route('sentiment') }}" class="hover:text-[#083B6E] transition">Sentimen</a>
            <a href="{{ route('tentang') }}"   class="hover:text-[#083B6E] transition">Tentang</a>
        </div>

    </div>
</footer>

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