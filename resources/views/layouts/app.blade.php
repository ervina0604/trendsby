<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','SuraTrend')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>

        body{
            font-family:'Manrope',sans-serif;
            background:#f4f5f6;
            color:#1f2937;
        }

        .nav-link{
            position:relative;
            font-weight:600;
            color:#4b5563;
            transition:.2s;
        }

        .nav-link:hover{
            color:#065f46;
        }

        .nav-link.active{
            color:#065f46;
        }

        .nav-link.active::after{
            content:'';
            position:absolute;
            bottom:-18px;
            left:0;
            right:0;
            height:3px;
            border-radius:999px;
            background:#2bb673;
        }

        .card{
            background:white;
            border-radius:24px;
            box-shadow:0 4px 20px rgba(0,0,0,.04);
        }

    </style>

</head>

<body>

<nav class="fixed top-0 left-0 right-0 bg-white border-b z-50">

    <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">

        <a href="{{ route('home') }}" class="flex items-center gap-3">

            <img
                src="{{ asset('storage/logo.png') }}"
                alt="Logo SuraTrend"
                class="h-10">

        </a>

        <div class="hidden md:flex items-center gap-10">

            <a href="{{ route('home') }}"
               class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                Home
            </a>

            <a href="{{ route('peta') }}"
               class="nav-link {{ request()->routeIs('peta') ? 'active' : '' }}">
                Peta Sungai
            </a>

            <a href="{{ route('prioritas') }}"
               class="nav-link {{ request()->routeIs('prioritas') ? 'active' : '' }}">
                Prioritas Sungai
            </a>

            <a href="{{ route('tentang') }}"
               class="nav-link {{ request()->routeIs('tentang') ? 'active' : '' }}">
                Tentang
            </a>

        </div>

        <a href="{{ route('peta') }}"
           class="bg-[#04543D] hover:bg-[#03432f] text-white px-8 py-3 rounded-full font-semibold transition">

            Lihat Peta

        </a>

    </div>

</nav>

<main class="pt-28">

    @yield('content')

</main>

<footer class="mt-24 border-t bg-white">

    <div class="max-w-7xl mx-auto px-6 py-10 flex flex-col md:flex-row justify-between">

        <div>

            <div class="flex items-center gap-3">

                <img
                    src="{{ asset('storage/logo.png') }}"
                    alt="Logo SuraTrend"
                    class="h-8">

                <h3 class="font-bold text-3xl text-[#04543D]">
                    SuraTrend
                </h3>

            </div>

            <p class="text-gray-500 mt-3">
                © 2026 SuraTrend Environmental Intelligence.
            </p>

        </div>

        <div class="flex gap-8 mt-6 md:mt-0 text-sm font-semibold text-gray-500">

            <a href="{{ route('home') }}">Home</a>

            <a href="{{ route('peta') }}">Peta Sungai</a>

            <a href="{{ route('prioritas') }}">Prioritas Sungai</a>

            <a href="{{ route('tentang') }}">Tentang</a>

        </div>

    </div>

</footer>

</body>
</html>