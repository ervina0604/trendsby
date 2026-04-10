<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SuraTrend')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

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
        }
    </style>

    @stack('styles')
</head>
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
            </div>
        </div>
    </nav>

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
        </div>
    </footer>

    @stack('scripts')
</body>
</html>