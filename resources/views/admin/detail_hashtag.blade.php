@extends('layouts.admin')

@section('title', 'Detail Hashtag')

@section('content')

<div class="admin-card p-8 mb-8">
    <h3 class="text-[20px] font-extrabold text-[#083B6E] mb-5">Detail Hashtag</h3>

    <!-- Filter -->
    <div class="mb-5">
        <label class="block text-sm font-bold">Filter</label>
        <select name="hashtag_filter" id="hashtag_filter" class="p-3 border rounded">
            <option value="semua">Semua</option>
            <option value="lingkungan">Lingkungan</option>
            <option value="industri">Industri</option>
        </select>
    </div>

    <!-- Tabel Hashtag -->
    <table class="w-full table-auto border-collapse text-sm">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b text-left">Rank</th>
                <th class="px-4 py-2 border-b text-left">Hashtag</th>
                <th class="px-4 py-2 border-b text-left">Jumlah Kemunculan</th>
                <th class="px-4 py-2 border-b text-left">Trend</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hashtagData as $hashtag)
                <tr>
                    <td class="px-4 py-3 border-b">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3 border-b">{{ $hashtag->hashtag }}</td>
                    <td class="px-4 py-3 border-b">{{ $hashtag->jumlah_kemunculan }} konten</td>
                    <td class="px-4 py-3 border-b">
                        <span class="text-green-500">{{ $hashtag->trend }}</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection