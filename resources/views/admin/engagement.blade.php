<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Engagement Tertinggi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 flex">

{{-- SIDEBAR --}}
<aside class="w-64 h-screen bg-white shadow-md fixed">
    <div class="p-6 font-bold text-xl text-blue-900">
        SuraTrend
    </div>

    <nav class="space-y-2 px-4">
        <a href="#" class="block py-2 text-gray-600">Dashboard</a>
        <a href="#" class="block py-2 text-gray-600">Kelola Data</a>
        <a href="#" class="block py-2 text-gray-600">Analisis</a>

        <a href="/admin/engagement"
           class="block py-2 font-bold text-green-700 border-l-4 border-green-700 pl-2">
            Engagement Tertinggi
        </a>
    </nav>
</aside>

{{-- MAIN --}}
<main class="ml-64 w-full p-8 space-y-6">

    {{-- HEADER --}}
    <div>
        <h1 class="text-3xl font-bold text-blue-900">Engagement Tertinggi</h1>
        <p class="text-gray-500">Ranking berdasarkan Like + Comment</p>
    </div>

    {{-- TOP CARD --}}
    <div class="bg-white p-6 rounded-xl shadow flex justify-between items-center">
        <div>
            <p class="text-sm text-gray-400">Top Engagement</p>
            <h2 class="text-xl font-bold text-blue-900">{{ $top['akun'] }}</h2>
        </div>

        <div class="text-right">
            <p class="text-3xl font-bold text-green-600">
                {{ $top['engagement'] }}
            </p>
            <p class="text-xs text-gray-400">Total Interaction</p>
        </div>
    </div>

    {{-- TABLE --}}
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-gray-600 text-xs uppercase">
                <tr>
                    <th class="p-4 text-left">Rank</th>
                    <th>Akun</th>
                    <th>Caption</th>
                    <th>Like</th>
                    <th>Comment</th>
                    <th class="text-right pr-4">Engagement</th>
                </tr>
            </thead>

            <tbody>
                @foreach($data as $row)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-4 font-bold">{{ $row['rank'] }}</td>

                    <td class="font-semibold text-blue-900">
                        {{ $row['akun'] }}
                    </td>

                    <td class="text-gray-500">
                        {{ $row['caption'] }}
                    </td>

                    <td>{{ $row['like'] }}</td>
                    <td>{{ $row['comment'] }}</td>

                    <td class="text-right pr-4 font-bold text-green-600">
                        {{ $row['engagement'] }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- STATS --}}
    <div class="grid grid-cols-3 gap-4">
        <div class="bg-white p-4 rounded-xl shadow">
            <p class="text-xs text-gray-400">Like Leader</p>
            <p class="text-2xl font-bold">
                {{ collect($data)->max('like') }}
            </p>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            <p class="text-xs text-gray-400">Comment Leader</p>
            <p class="text-2xl font-bold">
                {{ collect($data)->max('comment') }}
            </p>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            <p class="text-xs text-gray-400">Total Engagement</p>
            <p class="text-2xl font-bold">
                {{ collect($data)->sum('engagement') }}
            </p>
        </div>
    </div>

</main>

</body>
</html>