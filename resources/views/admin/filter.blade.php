@extends('layouts.app')

@section('content')
<div class="flex">

    <!-- SIDEBAR FILTER -->
    <div class="w-80 bg-white p-6 rounded-xl shadow-sm">

        <h3 class="font-bold text-lg mb-4">
            Panel Filter
            <a href="{{ route('filter.index') }}" class="text-xs text-green-600 ml-2">RESET ALL</a>
        </h3>

        <form method="GET">

            <!-- TANGGAL -->
            <label class="text-xs font-semibold">Rentang Tanggal</label>
            <input type="date" name="start" class="w-full border rounded-lg p-2 mt-1">
            <input type="date" name="end" class="w-full border rounded-lg p-2 mt-2">

            <!-- AKUN -->
            <div class="mt-4">
                <label class="text-xs font-semibold">Akun Sumber</label>

                <div class="mt-2 space-y-2">
                    <label><input type="checkbox" name="akun" value="Peduli Sungai"> Peduli Sungai</label><br>
                    <label><input type="checkbox" name="akun" value="Ecoton"> Ecoton Foundation</label>
                </div>
            </div>

            <!-- HASHTAG -->
            <div class="mt-4">
                <label class="text-xs font-semibold">Hashtag Populer</label>

                <div class="flex flex-wrap gap-2 mt-2">
                    <button name="hashtag" value="#BrantasResik" class="px-3 py-1 bg-gray-100 rounded-full text-xs">#BrantasResik</button>
                    <button name="hashtag" value="#SaveSurabayaRiver" class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs">#SaveSurabayaRiver</button>
                </div>
            </div>

            <button class="mt-6 w-full bg-blue-900 text-white py-3 rounded-full">
                Terapkan Filter
            </button>

        </form>
    </div>

    <!-- CONTENT -->
    <div class="flex-1 ml-6">

        <!-- STATS -->
        <div class="grid grid-cols-3 gap-4 mb-6">

            <div class="bg-white p-4 rounded-xl shadow">
                <p class="text-xs text-gray-500">TOTAL DITEMUKAN</p>
                <h2 class="text-2xl font-bold">{{ $total }}</h2>
            </div>

            <div class="bg-white p-4 rounded-xl shadow">
                <p class="text-xs text-gray-500">AVG ENGAGEMENT</p>
                <h2 class="text-2xl font-bold text-green-600">
                    {{ $avgEngagement }}%
                </h2>
            </div>

            <div class="bg-white p-4 rounded-xl shadow">
                <p class="text-xs text-gray-500">PERIODE AKTIF</p>
                <h2 class="text-lg font-semibold">
                    {{ request('start') }} - {{ request('end') }}
                </h2>
            </div>

        </div>

        <!-- TABLE -->
        <div class="bg-white rounded-xl shadow">

            <div class="p-4 border-b font-semibold">
                Hasil Pencarian Terperinci
            </div>

            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-xs text-gray-500">
                    <tr>
                        <th class="p-3 text-left">Tanggal</th>
                        <th>Akun</th>
                        <th>Caption</th>
                        <th>Engagement</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($posts as $post)
                    <tr class="border-t">
                        <td class="p-3">
                            {{ \Carbon\Carbon::parse($post->tanggal)->format('d M Y') }}
                        </td>

                        <td>{{ $post->akun }}</td>

                        <td class="max-w-xs truncate">
                            {{ $post->caption }}
                        </td>

                        <td>
                            ❤️ {{ $post->likes }}
                            💬 {{ $post->comments }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- PAGINATION -->
            <div class="p-4">
                {{ $posts->links() }}
            </div>

        </div>
    </div>
</div>
@endsection