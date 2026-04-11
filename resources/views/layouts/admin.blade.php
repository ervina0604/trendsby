<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin SuraTrend')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Manrope', sans-serif;
            background: #F3F4F6;
            color: #0F172A;
        }
        .admin-card {
            background: #FFFFFF;
            border-radius: 28px;
            box-shadow: 0 2px 10px rgba(15,23,42,.035);
        }
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 14px;
            min-height: 54px;
            padding: 0 16px;
            border-radius: 16px;
            color: #64748B;
            font-weight: 600;
            transition: .2s ease;
        }
        .sidebar-link:hover {
            background: #F8FAFC;
            color: #083B6E;
        }
        .sidebar-link.active {
            background: #F1F5F9;
            color: #083B6E;
            position: relative;
            font-weight: 800;
        }
        .sidebar-link.active::after {
            content: "";
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            border-radius: 999px;
            background: #2E9F43;
        }
        .sidebar-icon {
            width: 22px;
            height: 22px;
            object-fit: contain;
            flex-shrink: 0;
        }
        .search-admin {
            background: #ECEDEF;
            border-radius: 999px;
        }
    </style>
</head>
<body>

<div class="min-h-screen flex">
    <!-- Sidebar -->
    <aside class="w-[320px] bg-[#F7F8FA] border-r border-slate-200 flex flex-col">
        <div class="px-8 pt-8 pb-7 border-b border-slate-200">
            <div class="flex items-center gap-4 mb-3">
                <img src="{{ asset('storage/logo.png') }}" alt="Logo SuraTrend" class="w-[44px] h-[44px] object-contain">
                <div>
                    <div class="text-[20px] font-extrabold text-[#083B6E] leading-none">SURATREND</div>
                    <div class="text-[13px] tracking-[.10em] uppercase text-[#7C8AA0] mt-2">Environmental Analytics</div>
                </div>
            </div>
        </div>

        <div class="px-4 py-6 flex-1">
            <nav class="space-y-2">
                <!-- Sidebar Links -->
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <img src="{{ asset('storage/dashboard.png') }}" alt="Dashboard" class="sidebar-icon">
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.import') }}" class="sidebar-link {{ request()->routeIs('admin.import') ? 'active' : '' }}">
                    <img src="{{ asset('storage/import.png') }}" alt="Import Otomatis" class="sidebar-icon">
                    <span>Import Otomatis</span>
                </a>
                <a href="{{ route('admin.input') }}" class="sidebar-link {{ request()->routeIs('admin.input') ? 'active' : '' }}">
                    <img src="{{ asset('storage/input.png') }}" alt="Input Data Konten" class="sidebar-icon">
                    <span>Input Data Konten</span>
                </a>
                <a href="{{ route('admin.kelola') }}" class="sidebar-link {{ request()->routeIs('admin.kelola') ? 'active' : '' }}">
                    <img src="{{ asset('storage/kelola.png') }}" alt="Kelola Data Konten" class="sidebar-icon">
                    <span>Kelola Data Konten</span>
                </a>
                <a href="{{ route('admin.hashtag') }}" class="sidebar-link {{ request()->routeIs('admin.hashtag') ? 'active' : '' }}">
                    <img src="{{ asset('storage/hashtag.png') }}" alt="Analisis Hashtag" class="sidebar-icon">
                    <span>Analisis Hashtag</span>
                </a>
                <a href="{{ route('admin.keyword') }}" class="sidebar-link {{ request()->routeIs('admin.keyword') ? 'active' : '' }}">
                    <img src="{{ asset('storage/keyword_.png') }}" alt="Analisis Keyword" class="sidebar-icon">
                    <span>Analisis Keyword</span>
                </a>
                <a href="{{ route('admin.filter') }}" class="sidebar-link {{ request()->routeIs('admin.filter') ? 'active' : '' }}">
                    <img src="{{ asset('storage/pencarian.png') }}" alt="Filter dan Pencarian" class="sidebar-icon">
                    <span>Filter & Pencarian</span>
                </a>
                <a href="{{ route('admin.engagement') }}" class="sidebar-link {{ request()->routeIs('admin.engagement') ? 'active' : '' }}">
                    <img src="{{ asset('storage/engagement.png') }}" alt="Engagement Tertinggi" class="sidebar-icon">
                    <span>Engagement Tertinggi</span>
                </a>
            </nav>
        </div>

        <!-- Logout -->
        <div class="px-4 py-6 border-t border-slate-200">
            <a href="{{ route('admin.login') }}" class="sidebar-link text-[#DC2626] hover:bg-red-50 hover:text-[#DC2626]">
                <img src="{{ asset('storage/export.png') }}" alt="Logout" class="sidebar-icon">
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 min-w-0 flex flex-col">
        <header class="h-[92px] bg-white border-b border-slate-200 px-8 flex items-center justify-between">
            <div class="flex items-center gap-5">
                <div class="w-[4px] h-[42px] rounded-full bg-[#083B6E]"></div>
                <h1 class="text-[20px] font-extrabold text-[#083B6E]">@yield('header_title', 'Dashboard')</h1>
            </div>

            <div class="flex items-center gap-5">
                <div class="w-[54px] h-[54px] rounded-full overflow-hidden border border-slate-200 bg-white">
                    <img src="{{ asset('storage/akun.png') }}" alt="Admin" class="w-full h-full object-cover">
                </div>
            </div>
        </header>

        <main class="flex-1 px-8 py-8">
            @yield('content')
        </main>

        <footer class="px-8 py-5 border-t border-slate-200 text-[13px] text-slate-500 bg-white">
            © 2026 SuraTrend Admin Panel. All rights reserved.
        </footer>
    </div>
</div>

@stack('scripts')
</body>
</html>