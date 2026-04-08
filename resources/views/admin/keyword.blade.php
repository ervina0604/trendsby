@extends('layouts.app')

@section('content')
<main class="ml-64 pt-24 pb-12 px-8 min-h-screen">

<!-- HEADER -->
<div class="mb-12">
    <h2 class="text-4xl font-extrabold text-blue-900">Analisis Keyword Caption</h2>
    <p class="text-slate-500">
        Identifikasi topik utama dari caption Instagram
    </p>
</div>

<div class="grid grid-cols-3 gap-8">

    <!-- WORD CLOUD -->
    <div class="col-span-2 bg-white rounded-2xl p-8">

        <div class="flex justify-between mb-6">
            <h3 class="font-bold text-lg">Word Cloud</h3>
        </div>

        <div class="flex flex-wrap justify-center gap-6">

            @foreach($keywords as $item)
                @php
                    $size = match(true) {
                        $item['count'] > 140 => 'text-7xl',
                        $item['count'] > 120 => 'text-6xl',
                        $item['count'] > 90 => 'text-5xl',
                        $item['count'] > 70 => 'text-4xl',
                        default => 'text-3xl'
                    };
                @endphp

                <span class="{{ $size }} font-bold text-blue-900">
                    {{ $item['name'] }}
                </span>
            @endforeach

        </div>
    </div>

    <!-- SUMMARY -->
    <div class="bg-blue-900 text-white rounded-2xl p-6">
        <h4 class="font-bold text-xl mb-4">Executive Summary</h4>

        <p class="text-sm mb-6">
            Keyword dominan adalah <b>{{ $keywords[0]['name'] }}</b>
            dengan total {{ $keywords[0]['count'] }} kemunculan.
        </p>

        <div class="flex gap-4">
            <div>
                <p class="text-xs">Total Keyword</p>
                <p class="text-xl font-bold">{{ $totalKeyword }}</p>
            </div>
            <div>
                <p class="text-xs">Top Trend</p>
                <p class="text-xl font-bold">
                    +{{ collect($keywords)->max('trend') }}%
                </p>
            </div>
        </div>
    </div>

</div>

<!-- TABLE -->
<div class="mt-12 bg-white p-8 rounded-2xl">

    <h3 class="text-xl font-bold mb-6">Ranking Frekuensi Keyword</h3>

    <table class="w-full">
        <thead>
            <tr class="text-left text-xs text-gray-400 border-b">
                <th class="pb-3">Rank</th>
                <th>Keyword</th>
                <th>Jumlah</th>
                <th>Trend</th>
            </tr>
        </thead>

        <tbody>
            @foreach($keywords as $index => $item)
                <tr class="border-b hover:bg-gray-50">

                    <td class="py-4 font-bold">
                        {{ str_pad($index+1, 2, '0', STR_PAD_LEFT) }}
                    </td>

                    <td class="font-semibold">
                        {{ $item['name'] }}
                    </td>

                    <td>{{ $item['count'] }}</td>

                    <td>
                        @if($item['trend'] > 0)
                            <span class="text-green-600 font-bold">
                                ↑ {{ $item['trend'] }}%
                            </span>
                        @elseif($item['trend'] < 0)
                            <span class="text-red-600 font-bold">
                                ↓ {{ abs($item['trend']) }}%
                            </span>
                        @else
                            <span class="text-gray-400">
                                Stabil
                            </span>
                        @endif
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

</div>

</main>
@endsection