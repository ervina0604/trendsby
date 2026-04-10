<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuraTrend Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Manrope', sans-serif; }
    </style>
</head>

<body class="bg-gray-100">

<div class="flex">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white min-h-screen p-6 shadow-sm">

        <div class="mb-10">
            <h1 class="text-xl font-bold text-blue-900">SURATREND</h1>
            <p class="text-xs text-gray-400">ENVIRONMENTAL ANALYTICS</p>
        </div>

        <nav class="space-y-4 text-sm">

            <a href="/dashboard" class="block text-blue-800 font-semibold border-l-4 border-green-600 pl-3">
                Dashboard
            </a>

            <a href="#" class="block text-gray-600 hover:text-blue-800">Import Otomatis</a>
            <a href="#" class="block text-gray-600 hover:text-blue-800">Input Data Konten</a>
            <a href="#" class="block text-gray-600 hover:text-blue-800">Kelola Data Konten</a>
            <a href="#" class="block text-gray-600 hover:text-blue-800">Analisis Hashtag</a>
            <a href="#" class="block text-gray-600 hover:text-blue-800">Analisis Keyword</a>
            <a href="#" class="block text-gray-600 hover:text-blue-800">Filter & Pencarian</a>
            <a href="#" class="block text-gray-600 hover:text-blue-800">Engagement Tertinggi</a>

        </nav>

        <div class="mt-10 text-red-500 text-sm">
            Logout
        </div>

    </aside>

    <!-- MAIN -->
    <div class="flex-1 p-6">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">

            <h2 class="text-xl font-semibold text-gray-800">
                @yield('title')
            </h2>

            <div class="flex items-center gap-4">
                <input type="text" placeholder="Cari data..."
                    class="px-4 py-2 rounded-full bg-gray-200 text-sm">

                <img src="https://i.pravatar.cc/40" class="rounded-full">
            </div>
        </div>

        <!-- CONTENT -->
        @yield('content')

    </div>

</div>

</body>
</html>