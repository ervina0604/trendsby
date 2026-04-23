@extends('layouts.admin')

@section('title', 'Filter & Pencarian')

@section('content')

<div class="p-8">

    <!-- Judul -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-[#083B6E]">Filter & Pencarian</h2>
        <p class="text-gray-500 text-sm">
            Telusuri arsip data lingkungan berdasarkan parameter spesifik.
            Gunakan filter lanjutan untuk menyempitkan hasil pencarian tren ekosistem sungai.
        </p>
    </div>


    <!-- Statistik -->
    <div class="grid grid-cols-3 gap-6 mb-8">

        <div class="bg-white shadow rounded-xl p-6">
            <p class="text-gray-500 text-sm">TOTAL DITEMUKAN</p>
            <h3 class="text-2xl font-bold text-[#083B6E]">
                {{ $filteredData->count() ?? '1,248' }}
                <span class="text-sm text-gray-400">Konten</span>
            </h3>
        </div>

        <div class="bg-white shadow rounded-xl p-6">
            <p class="text-gray-500 text-sm">AVG ENGAGEMENT</p>
            <h3 class="text-2xl font-bold text-green-600">
                4.8%
            </h3>
        </div>

        <div class="bg-white shadow rounded-xl p-6">
            <p class="text-gray-500 text-sm">PERIODE AKTIF</p>
            <h3 class="text-lg font-bold text-[#083B6E]">
                Mei - Juni 2024
            </h3>
        </div>

    </div>


    <!-- Grid Filter + Table -->
    <div class="grid grid-cols-4 gap-6">


        <!-- PANEL FILTER -->
        <div class="bg-white rounded-xl shadow p-6">

            <div class="flex justify-between mb-4">
                <h4 class="font-bold text-gray-700">Panel Filter</h4>
                <a href="#" class="text-sm text-gray-400">Reset All</a>
            </div>

            <form method="GET" action="{{ route('admin.filter') }}">

                <!-- Date Range -->
                <div class="mb-5">
                    <label class="text-sm font-semibold">Rentang Tanggal</label>

                    <input type="text"
                        name="start_date"
                        id="start_date"
                        placeholder="mm/dd/yyyy"
                        class="w-full border rounded-lg p-2 mt-2 text-sm">

                    <span class="text-sm text-gray-400">s/d</span>

                    <input type="text"
                        name="end_date"
                        id="end_date"
                        placeholder="mm/dd/yyyy"
                        class="w-full border rounded-lg p-2 mt-2 text-sm">
                </div>


                <!-- Akun -->
                <div class="mb-5">
                    <label class="text-sm font-semibold">Akun Sumber</label>

                    <div class="mt-2 space-y-2 text-sm">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="account[]" value="Peduli Sungai Surabaya">
                            Peduli Sungai Surabaya
                        </label>

                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="account[]" value="Ecoton Foundation">
                            Ecoton Foundation
                        </label>
                    </div>
                </div>


                <!-- Hashtag -->
                <div class="mb-6">
                    <label class="text-sm font-semibold">Hashtag Populer</label>

                    <div class="flex flex-wrap gap-2 mt-2">

                        <label class="bg-gray-100 px-3 py-1 rounded-full text-xs">
                            <input type="checkbox" name="hashtag[]" value="#BrantasResik">
                            #BrantasResik
                        </label>

                        <label class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                            <input type="checkbox" name="hashtag[]" value="#SaveSurabayaRiver">
                            #SaveSurabayaRiver
                        </label>

                        <label class="bg-gray-100 px-3 py-1 rounded-full text-xs">
                            <input type="checkbox" name="hashtag[]" value="#ZeroWaste">
                            #ZeroWaste
                        </label>

                    </div>
                </div>


                <button type="submit"
                    class="w-full bg-[#083B6E] text-white py-3 rounded-full font-semibold">
                    Terapkan Filter
                </button>

            </form>

        </div>



        <!-- HASIL PENCARIAN -->
        <div class="col-span-3 bg-white rounded-xl shadow p-6">

            <h3 class="font-bold text-[#083B6E] mb-4">
                Hasil Pencarian Terperinci
            </h3>

            <table class="w-full text-sm">

                <thead class="text-gray-500 border-b">
                    <tr>
                        <th class="text-left py-3">Tanggal</th>
                        <th class="text-left py-3">Akun</th>
                        <th class="text-left py-3">Caption</th>
                        <th class="text-left py-3">Engagement</th>
                    </tr>
                </thead>

                <tbody>

                @forelse ($filteredData as $data)

                    <tr class="border-b">
                        <td class="py-3">{{ $data->date }}</td>
                        <td class="py-3">{{ $data->account }}</td>
                        <td class="py-3 text-gray-600">
                            {{ Str::limit($data->caption, 80) }}
                        </td>
                        <td class="py-3 font-semibold text-gray-700">
                            {{ $data->engagement }}
                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="text-center py-6 text-gray-400">
                            Data tidak ditemukan
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>


            <!-- Pagination -->
            <div class="mt-5">
                {{ $filteredData->links() }}
            </div>

        </div>

    </div>

</div>

@endsection



@section('scripts')

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script>
$(function() {
    $("#start_date, #end_date").datepicker({
        dateFormat: 'mm/dd/yy'
    });
});
</script>

@endsection