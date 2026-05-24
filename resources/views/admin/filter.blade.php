@extends('layouts.admin')

@section('title', 'Filter & Pencarian')

@section('content')

<div class="p-8">

    <!-- Header -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-[#083B6E]">Filter & Pencarian</h2>
        <p class="text-gray-500 text-sm mt-2 max-w-2xl">
            Telusuri arsip data lingkungan berdasarkan parameter spesifik. Gunakan filter lanjutan untuk menyempitkan hasil pencarian tren ekosistem sungai.
        </p>
    </div>

    <div class="grid grid-cols-12 gap-6">

        <!-- Panel Filter -->
        <div class="col-span-12 xl:col-span-3 bg-white rounded-3xl shadow p-6">
            <div class="flex items-center justify-between mb-6">
                <h4 class="text-base font-bold text-[#083B6E]">Panel Filter</h4>
                <a href="{{ route('admin.filter') }}" class="text-sm text-gray-400 hover:text-[#083B6E]">Reset All</a>
            </div>

            <form method="GET" action="{{ route('admin.filter') }}">

                <div class="mb-6">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-400 mb-3">Rentang Tanggal</p>
                    <input type="text" name="start_date" id="start_date" placeholder="mm/dd/yyyy"
                        class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm text-gray-700 focus:ring-2 focus:ring-[#083B6E]/20 outline-none" />
                    <div class="my-3 text-center text-xs text-gray-400">s/d</div>
                    <input type="text" name="end_date" id="end_date" placeholder="mm/dd/yyyy"
                        class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm text-gray-700 focus:ring-2 focus:ring-[#083B6E]/20 outline-none" />
                </div>

                <div class="mb-6">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-400 mb-3">Akun Sumber</p>
                    <div class="space-y-3 text-sm text-gray-700">
                        <label class="flex items-center gap-3 rounded-2xl border border-gray-200 px-4 py-3 hover:border-[#083B6E] cursor-pointer">
                            <input type="checkbox" name="account[]" value="Peduli Sungai Surabaya" class="h-4 w-4 text-[#083B6E] focus:ring-[#083B6E]" />
                            Peduli Sungai Surabaya
                        </label>
                        <label class="flex items-center gap-3 rounded-2xl border border-gray-200 px-4 py-3 hover:border-[#083B6E] cursor-pointer">
                            <input type="checkbox" name="account[]" value="Ecoton Foundation" class="h-4 w-4 text-[#083B6E] focus:ring-[#083B6E]" />
                            Ecoton Foundation
                        </label>
                    </div>
                </div>

                <div class="mb-6">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-400 mb-3">Hashtag Populer</p>
                    <div class="flex flex-wrap gap-2">
                        <label class="inline-flex items-center gap-2 rounded-full border border-gray-200 bg-gray-50 px-3 py-2 text-xs font-semibold text-gray-700 cursor-pointer hover:border-[#083B6E]">
                            <input type="checkbox" name="hashtag[]" value="#BrantasResik" class="h-3 w-3 text-[#083B6E]" />
                            #BrantasResik
                        </label>
                        <label class="inline-flex items-center gap-2 rounded-full border border-[#d1fae5] bg-[#ecfdf5] px-3 py-2 text-xs font-semibold text-[#047857] cursor-pointer hover:bg-[#dcfce7]">
                            <input type="checkbox" name="hashtag[]" value="#SaveSurabayaRiver" class="h-3 w-3 text-[#047857]" />
                            #SaveSurabayaRiver
                        </label>
                        <label class="inline-flex items-center gap-2 rounded-full border border-gray-200 bg-gray-50 px-3 py-2 text-xs font-semibold text-gray-700 cursor-pointer hover:border-[#083B6E]">
                            <input type="checkbox" name="hashtag[]" value="#ZeroWaste" class="h-3 w-3 text-[#083B6E]" />
                            #ZeroWaste
                        </label>
                    </div>
                </div>

                <button type="submit" class="mt-4 w-full rounded-2xl bg-[#083B6E] px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-[#083B6E]/10 hover:bg-[#0b335f]">
                    Terapkan Filter
                </button>
            </form>
        </div>

        <!-- Konten Hasil -->
        <div class="col-span-12 xl:col-span-9 space-y-6">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="bg-white rounded-3xl p-5 shadow border border-gray-100">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-400">Total Ditemukan</p>
                    <p class="mt-4 text-3xl font-bold text-[#083B6E]">{{ $filteredData->total() }}</p>
                    <p class="text-sm text-gray-500 mt-1">Konten</p>
                </div>
                <div class="bg-white rounded-3xl p-5 shadow border border-gray-100">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-400">Avg Engagement</p>
                    <p class="mt-4 text-3xl font-bold text-green-600">4.8%</p>
                    <p class="text-sm text-gray-500 mt-1">Rata-rata per posting</p>
                </div>
                <div class="bg-white rounded-3xl p-5 shadow border border-gray-100">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-400">Periode Aktif</p>
                    <p class="mt-4 text-xl font-bold text-[#083B6E]">Mei - Juni 2024</p>
                    <p class="text-sm text-gray-500 mt-1">Tanggal laporan</p>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-xl font-bold text-[#083B6E]">Hasil Pencarian Terperinci</h3>
                        <p class="text-sm text-gray-500 mt-1">Menampilkan data yang sesuai dengan kondisi filter.</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <button class="inline-flex h-10 w-10 items-center justify-center rounded-2xl border border-gray-200 text-gray-500 hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v8m4-4H8" />
                            </svg>
                        </button>
                        <button class="inline-flex h-10 w-10 items-center justify-center rounded-2xl border border-gray-200 text-gray-500 hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm text-gray-600">
                        <thead class="border-b border-gray-200 bg-gray-50 text-xs uppercase tracking-[0.2em] text-gray-500">
                            <tr>
                                <th class="px-4 py-4">Tanggal</th>
                                <th class="px-4 py-4">Akun</th>
                                <th class="px-4 py-4">Caption</th>
                                <th class="px-4 py-4 text-right">Engagement</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($filteredData as $data)
                                <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-4 text-sm font-semibold text-[#083B6E]">{{ $data->tanggal_post }}</td>
                            <td class="px-4 py-4">
                                <div class="inline-flex items-center gap-3">
                                    <span class="h-8 w-8 rounded-full bg-green-100 text-green-700 grid place-items-center text-xs font-bold">PS</span>
                                    <span class="font-semibold text-gray-700">Dummy Account</span>
                                </div>
                            </td>
                                    <td class="px-4 py-4 text-sm text-gray-500">{{ Str::limit($data->caption, 80) }}</td>
                                    <td class="px-4 py-4 text-right font-semibold text-gray-700">{{ $data->engagement }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-8 text-center text-gray-400">Data tidak ditemukan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between text-sm text-gray-500">
                    <p>Menampilkan 1-{{ $filteredData->count() }} dari {{ $filteredData->total() }} konten</p>
                    <div class="flex items-center gap-2">
                        {{ $filteredData->links() }}
                    </div>
                </div>
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