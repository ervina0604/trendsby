@extends('layouts.admin')

@section('title', 'Import Otomatis')

@section('content')
public function index()
{
    $logs = [
        [
            'tanggal' => '04 April 2026',
            'akun' => 'Peduli Sungai Surabaya',
            'username' => '@pedulisungaisurabaya',
            'jumlah' => 3,
            'status' => 'berhasil'
        ],
        [
            'tanggal' => '03 April 2026',
            'akun' => 'Ecoton',
            'username' => '@ecoton',
            'jumlah' => 2,
            'status' => 'berhasil'
        ],
        [
            'tanggal' => '02 April 2026',
            'akun' => 'Peduli Sungai Surabaya',
            'username' => '@pedulisungaisurabaya',
            'jumlah' => 0,
            'status' => 'berhasil'
        ],
    ];

    return view('admin.import', [
        'logs' => $logs,
        'lastUpdate' => '4 April 2026, 08:00',
        'newPosts' => 5,
        'accuracy' => '94%'
    ]);
}
<!-- STATUS -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">

    <!-- STATUS CARD -->
    <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow">

        <div class="flex justify-between items-center">
            <div>
                <span class="text-xs bg-green-100 text-green-600 px-3 py-1 rounded-full">
                    ● Sistem Berjalan Normal
                </span>

                <h2 class="text-2xl font-bold text-blue-900 mt-3">
                    Status Sinkronisasi Instagram
                </h2>

                <p class="text-sm text-gray-500 mt-2">
                    Terakhir update: <b>{{ $lastUpdate ?? '4 April 2026, 08:00' }}</b>
                </p>

                <p class="text-sm text-green-600 mt-1">
                    {{ $newPosts ?? 5 }} posting baru berhasil ditambahkan
                </p>
            </div>

            <form method="POST" action="#">
                @csrf
                <button class="bg-blue-900 text-white px-6 py-3 rounded-full shadow hover:scale-105 transition">
                    🔄 Ambil Data
                </button>
            </form>
        </div>

    </div>

    <!-- METRIK -->
    <div class="bg-white p-6 rounded-2xl shadow">
        <p class="text-xs text-gray-400 mb-2">Metrik Terkini</p>

        <h2 class="text-4xl font-bold text-blue-900">
            {{ $accuracy ?? '94%' }}
        </h2>

        <p class="text-green-600 text-sm">+2%</p>

        <p class="text-sm text-gray-500 mt-3">
            Keandalan scheduler dalam 30 hari terakhir.
        </p>

        <div class="mt-6 text-xs text-gray-400 flex justify-between">
            <span>SCHEDULER V2.4</span>
            <span class="text-green-600">ACTIVE</span>
        </div>
    </div>

</div>

<!-- RIWAYAT -->
<div class="bg-white p-6 rounded-2xl shadow">

    <div class="flex justify-between mb-4">
        <div>
            <h3 class="text-xl font-bold text-blue-900">Riwayat Import</h3>
            <p class="text-sm text-gray-500">
                Log sinkronisasi data Instagram
            </p>
        </div>

        <a href="#" class="text-blue-700 text-sm font-semibold">
            Lihat Semua →
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">

            <thead class="text-gray-400 border-b">
                <tr>
                    <th class="py-3 text-left">Tanggal</th>
                    <th class="text-left">Akun</th>
                    <th class="text-center">Post Baru</th>
                    <th class="text-right">Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse($logs ?? [] as $log)
                <tr class="border-b hover:bg-gray-50">

                    <td class="py-4 font-semibold text-blue-900">
                        {{ $log['tanggal'] }}
                    </td>

                    <td>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-gray-200 rounded flex items-center justify-center text-xs font-bold">
                                {{ strtoupper(substr($log['akun'],0,1)) }}
                            </div>
                            <div>
                                <p class="font-semibold">{{ $log['akun'] }}</p>
                                <p class="text-xs text-gray-400">{{ $log['username'] }}</p>
                            </div>
                        </div>
                    </td>

                    <td class="text-center">
                        <span class="bg-gray-200 px-3 py-1 rounded-full">
                            {{ $log['jumlah'] }}
                        </span>
                    </td>

                    <td class="text-right">
                        @if($log['status'] == 'berhasil')
                            <span class="text-green-600 font-semibold">✔ Berhasil</span>
                        @else
                            <span class="text-red-500 font-semibold">✖ Gagal</span>
                        @endif
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-6 text-gray-400">
                        Tidak ada data
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>
</div>

<!-- FOOTER INFO -->
<div class="mt-6 text-sm text-gray-500 flex justify-between items-center">
    <p>⚠ Sistem mengambil data otomatis 1x sehari</p>
    <p>© {{ date('Y') }} SuraTrend</p>
</div>

@endsection