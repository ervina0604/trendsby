<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>@yield('title', 'SuraTrend')</title>

    <script src="https://cdn.tailwindcss.com"></script>
<<<<<<< HEAD
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
=======

=======
    <title>@yield('title','SuraTrend')</title>
    <script src="https://cdn.tailwindcss.com"></script>
>>>>>>> 2180b4a22bd669af32b295b77ccd08b4ab241322
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
<<<<<<< HEAD
>>>>>>> 0f4e1d45621335f5591d9ba88f95c19b1bf03003

    <style>
        body{
            font-family:'Manrope',sans-serif;
            background:#F3F4F6;
            color:#0F172A;
        }

        .nav-shell{
            background:rgba(255,255,255,.96);
            backdrop-filter:blur(12px);
        }

        .glass-card{
            background:#F7F7F8;
            border-radius:28px;
            box-shadow:0 2px 10px rgba(15,23,42,.035);
        }

        .nav-link{
            color:#667085;
            position:relative;
            transition:.2s ease;
        }

        .nav-link:hover{
            color:#083B6E;
        }

        .nav-link.active{
            color:#083B6E;
            font-weight:700;
        }

        .nav-link.active::after{
            content:"";
            position:absolute;
            left:0;
            right:0;
            bottom:-18px;
            height:3px;
            background:#2E9F43;
            border-radius:999px;
        }

        .search-wrap{
            background:#F1F2F4;
            border-radius:999px;
        }

        .fade-in-panel{
            animation:panelFade .22s ease;
        }

        @keyframes panelFade{
            from{
                opacity:.55;
                transform:translateY(6px);
            }
            to{
                opacity:1;
                transform:translateY(0);
            }
=======
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
>>>>>>> 2180b4a22bd669af32b295b77ccd08b4ab241322
        }
    </style>

    @stack('styles')
</head>
<<<<<<< HEAD
<body>

    <nav class="fixed top-0 left-0 right-0 z-50 nav-shell border-b border-slate-200">
        <div class="max-w-[1280px] mx-auto px-7 xl:px-8 h-[76px] flex items-center justify-between gap-6">

            <div class="flex items-center gap-10 min-w-0">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 shrink-0">
                    <img src="{{ asset('storage/logo.png') }}" alt="Logo SuraTrend" class="w-[30px] h-[30px] object-contain">
                    <span class="text-[21px] font-extrabold text-[#083B6E] tracking-[-0.02em]">SuraTrend</span>
                </a>

                <div class="hidden lg:flex items-center gap-8 text-[15px] font-semibold">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('hashtag') }}" class="nav-link {{ request()->routeIs('hashtag') ? 'active' : '' }}">
                        Hashtag Populer
                    </a>

                    <a href="{{ route('keyword') }}" class="nav-link {{ request()->routeIs('keyword') ? 'active' : '' }}">
                        Keyword Dominan
                    </a>
                    <a href="{{ route('tentang') }}" class="nav-link {{ request()->routeIs('tentang') ? 'active' : '' }}">
                        Tentang
                    </a>
                </div>
            </div>

            <div class="hidden md:flex items-center search-wrap w-[260px] h-[42px] px-4 gap-3 shrink-0">
                <img src="{{ asset('storage/filter.png') }}" alt="Cari" class="w-[16px] h-[16px] opacity-55 object-contain">
                <input
                    type="text"
                    placeholder="Cari tren..."
                    class="w-full bg-transparent outline-none text-[14px] text-slate-500 placeholder:text-slate-400"
                >
=======

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

<<<<<<< HEAD
                <!-- Tentang -->
                <a href="{{ route('tentang') }}"
                   class="{{ request()->routeIs('tentang')
                        ? 'text-[#083B6E] font-bold relative after:absolute after:-bottom-3 after:left-0 after:w-full after:h-[3px] after:bg-[#2E9F43] after:rounded-full'
                        : 'text-slate-500 hover:text-[#083B6E] transition duration-200' }}">
                    Tentang
                </a>

>>>>>>> 0f4e1d45621335f5591d9ba88f95c19b1bf03003
            </div>
=======
>>>>>>> 2180b4a22bd669af32b295b77ccd08b4ab241322
        </div>
    </nav>

<<<<<<< HEAD
<<<<<<< HEAD
    <main class="max-w-[1280px] mx-auto px-7 xl:px-8 pt-[108px] pb-20">
        @yield('content')
    </main>

    <footer class="mt-12 border-t border-slate-200">
        <div class="max-w-[1280px] mx-auto px-7 xl:px-8 py-10 flex flex-col md:flex-row md:items-end md:justify-between gap-4">
            <div>
                <div class="text-[#083B6E] font-bold text-[15px] mb-3">SuraTrend Living Archive</div>
                <div class="text-slate-400 text-[14px]">
                    © 2026 SuraTrend Living Archive. All rights reserved. Environmental Data Analytics.
                </div>
            </div>

            <a href="{{ route('terms') }}" class="text-slate-400 text-[14px] hover:text-[#083B6E] transition">
                Terms and Conditions
            </a>
=======
        <!-- Search -->
        <div class="relative hidden md:block">

            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-[22px]">
=======
        {{-- Search --}}
        <div class="relative hidden md:block shrink-0">
            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-[20px]">
>>>>>>> 2180b4a22bd669af32b295b77ccd08b4ab241322
                search
            </span>
            <input
                type="text"
                placeholder="Cari tren..."
                class="w-56 h-11 rounded-full bg-slate-100 border-0 pl-11 pr-4 text-sm focus:outline-none focus:ring-2 focus:ring-sky-200"
            >
<<<<<<< HEAD

>>>>>>> 0f4e1d45621335f5591d9ba88f95c19b1bf03003
=======
>>>>>>> 2180b4a22bd669af32b295b77ccd08b4ab241322
        </div>
    </footer>

<<<<<<< HEAD
    @stack('scripts')
=======
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

>>>>>>> 0f4e1d45621335f5591d9ba88f95c19b1bf03003
</body>
</html>