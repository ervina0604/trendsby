@extends('layouts.app')

@section('title','Prioritas Sungai')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<style>
body {
    background:
        radial-gradient(circle at top left, rgba(126,240,200,.12), transparent 35%),
        radial-gradient(circle at top right, rgba(255,255,255,.03), transparent 40%),
        #2B5748;
}
.page-header h1 {
    color: #f8fafc;
}
.page-header p {
    color: rgba(248,250,252,.78);
}
.metric-card {
    background: rgba(255,255,255,.06);
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
    border: 1px solid rgba(255,255,255,.10);
    border-radius: 28px;
    padding: 28px;
    box-shadow: 0 10px 40px rgba(0,0,0,.12);
    transition: .3s ease;
}
.metric-card:hover {
    transform: translateY(-4px);
    background: rgba(255,255,255,.09);
}
.metric-card p {
    color: rgba(255,255,255,.65);
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: .08em;
}
.metric-card h3 {
    color: white;
}
.glass-card {
    background: rgba(255,255,255,.06);
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
    border: 1px solid rgba(255,255,255,.10);
    border-radius: 32px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0,0,0,.12);
}
.status-badge {
    display: inline-flex;
    align-items: center;
    padding: 10px 18px;
    border-radius: 999px;
    font-weight: 600;
    font-size: 14px;
    background: rgba(255,255,255,.08);
    color: white;
    border: 1px solid rgba(255,255,255,.10);
}
#heroButton {
    width: 100%;
    display: block;
    text-align: center;
    background: rgba(255,255,255,.10);
    border: 1px solid rgba(255,255,255,.15);
    color: white;
    padding: 16px;
    border-radius: 18px;
    backdrop-filter: blur(16px);
    transition: .3s;
}
#heroButton:hover {
    background: rgba(255,255,255,.18);
}
#priorityChart {
    min-height: 320px;
}
input#searchRiver {
    width: 100%;
    border: 1px solid rgba(148,163,184,.25);
    border-radius: 18px;
    background: rgba(255,255,255,.08);
    color: white;
    padding: 14px 18px;
}
input#searchRiver::placeholder {
    color: rgba(255,255,255,.55);
}
table {
    width: 100%;
    border-collapse: collapse;
    color: #e2e8f0;
}
thead tr {
    background: rgba(255,255,255,.08);
}
tbody tr {
    transition: background .2s ease;
}
tbody tr:hover {
    background: rgba(255,255,255,.06);
}
table th, table td {
    padding: 18px 12px;
}
.table-card {
    background: rgba(255,255,255,.06);
    border: 1px solid rgba(255,255,255,.10);
    border-radius: 32px;
    box-shadow: 0 20px 60px rgba(0,0,0,.12);
}
</style>

@php
    $top = $top ?? ($sungai[0] ?? [
        'slug' => '#',
        'nama' => '-',
        'score' => 0,
        'status' => '-',
    ]);

    $statusClass = 'inline-block mt-6 px-4 py-2 rounded-full font-bold ';

    if ($top['status'] === 'Baik') {
        $statusClass .= 'bg-emerald-100 text-emerald-700';
    } elseif ($top['status'] === 'Perhatian') {
        $statusClass .= 'bg-amber-100 text-amber-700';
    } else {
        $statusClass .= 'bg-red-100 text-red-600';
    }
@endphp

<section class="max-w-7xl mx-auto px-6 pb-16">

    {{-- HEADER --}}
    <div class="page-header flex flex-col lg:flex-row justify-between gap-6 items-start lg:items-center">

        <div>
            <h1 class="text-5xl font-bold text-white">
                Prioritas Penanganan Sungai
            </h1>

            <p class="text-white/70 mt-3 text-lg">
                Ranking sungai berdasarkan hasil analisis media sosial,
                dokumentasi lapangan, dan skor prioritas penanganan.
            </p>
        </div>

        <div class="bg-[#04543D] text-white px-8 py-5 rounded-3xl shadow-lg">

            <div class="text-sm opacity-80">
                Total Sungai Dipantau
            </div>

            <div class="text-5xl font-bold">
                {{ count($sungai) }}
            </div>

        </div>

    </div>

    {{-- HERO --}}
    <div class="glass-card mt-10">

        <div class="grid lg:grid-cols-[1.3fr_1fr]">

            <img
                id="heroImage"
                src="{{ asset('storage/sungai.png') }}"
                alt="Sungai Surabaya"
                class="w-full h-full object-cover">

            <div class="p-8">

                <div class="flex justify-between items-start">

                    <div>

                        <div class="uppercase text-sm tracking-[4px] text-white/70">
                            Sungai Prioritas Utama
                        </div>

                        <h2
                            id="heroName"
                            class="text-5xl font-bold text-white mt-2">
                            {{ $top['nama'] }}
                        </h2>

                    </div>

                    <div>

                        <div
                            id="heroScore"
                            class="text-7xl font-black text-red-500">
                            {{ $top['score'] }}
                        </div>

                        <div class="text-center text-white/70">
                            Score
                        </div>

                    </div>

                </div>

                <span
                    id="heroStatus"
                    class="{{ $statusClass }}">
                    {{ $top['status'] }}
                </span>

                <p class="mt-6 text-white/70 leading-relaxed">
                    Sungai dengan tingkat prioritas tertinggi yang memerlukan
                    perhatian lebih lanjut berdasarkan hasil pemantauan.
                </p>

                <div class="grid grid-cols-3 gap-4 mt-8">

                    <div>
                        <div class="text-sm text-white/70">Sampah</div>
                        <div class="text-3xl font-bold text-red-500">85%</div>
                    </div>

                    <div>
                        <div class="text-sm text-white/70">Sedimen</div>
                        <div class="text-3xl font-bold text-yellow-400">70%</div>
                    </div>

                    <div>
                        <div class="text-sm text-white/70">Limbah</div>
                        <div class="text-3xl font-bold text-purple-400">50%</div>
                    </div>

                </div>

                <a
                    id="heroButton"
                    href="{{ route('detail.sungai',$top['slug']) }}"
                    class="block mt-8 bg-[#04543D] text-white text-center py-4 rounded-2xl font-bold hover:bg-[#02392b] transition">

                    Lihat Detail Sungai →

                </a>

            </div>

        </div>

    </div>

    {{-- TOP 5 --}}
    <h2 class="text-4xl font-bold text-white mt-14">
        Top 5 Prioritas
    </h2>

    <div class="grid md:grid-cols-5 gap-5 mt-6">

        @foreach(array_slice($sungai,0,5) as $item)

        <a
            href="{{ route('detail.sungai',$item['slug']) }}"
            class="glass-card p-6 hover:-translate-y-2 transition">

            <div class="text-sm text-white/70">
                Priority Score
            </div>

            <div class="font-bold text-2xl mt-3 text-white">
                {{ $item['nama'] }}
            </div>

            <div class="text-6xl font-black mt-4 text-[#7EF0C8]">
                {{ $item['score'] }}
            </div>

        </a>

        @endforeach

    </div>

    {{-- CHART + TABLE --}}
    <div class="grid lg:grid-cols-[350px_1fr] gap-8 mt-10">

        <div class="glass-card p-6">

            <h3 class="font-bold text-2xl mb-5 text-white">
                Distribusi Prioritas
            </h3>

            <div id="priorityChart"></div>

        </div>

        <div class="table-card overflow-hidden">

            <div class="p-5 border-b border-white/10">

                <input
                    type="text"
                    id="searchRiver"
                    placeholder="Cari sungai..."
                    class="w-full bg-transparent focus:outline-none focus:ring-2 focus:ring-[#04543D]">

            </div>

            <div class="overflow-x-auto">

                <table class="w-full min-w-[700px]">

                    <thead class="bg-white/10">

                        <tr>
                            <th class="text-left p-5 text-white/70">Rank</th>
                            <th class="text-left text-white/70">Nama Sungai</th>
                            <th class="text-center text-white/70">Score</th>
                            <th class="text-center text-white/70">Status</th>
                            <th class="text-center text-white/70">Detail</th>
                        </tr>

                    </thead>

                    <tbody id="riverTable">

                    @foreach($sungai as $index => $item)

                    <tr class="border-t border-white/10 hover:bg-white/10">

                        <td class="p-5 text-white/80">
                            {{ str_pad($index+1,2,'0',STR_PAD_LEFT) }}
                        </td>

                        <td class="font-semibold text-white">
                            {{ $item['nama'] }}
                        </td>

                        <td class="text-center font-bold text-white">
                            {{ $item['score'] }}
                        </td>

                        <td class="text-center text-white/80">

                            @if($item['status']=='Kritis')
                                <span class="text-red-600 font-semibold">
                                    Kritis
                                </span>
                            @elseif($item['status']=='Perhatian')
                                <span class="text-yellow-500 font-semibold">
                                    Perhatian
                                </span>
                            @else
                                <span class="text-green-600 font-semibold">
                                    Baik
                                </span>
                            @endif

                        </td>

                        <td class="text-center">

                            <a
                                href="{{ route('detail.sungai',$item['slug']) }}"
                                class="text-[#7EF0C8] font-bold">

                                Detail

                            </a>

                        </td>

                    </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</section>

<script>

new ApexCharts(
document.querySelector("#priorityChart"),
{
series:[3,7,7],
labels:['Kritis','Perhatian','Baik'],
chart:{
type:'donut',
height:320
},
colors:[
'#dc2626',
'#f59e0b',
'#16a34a'
],
legend:{
position:'bottom'
}
}
).render();

document
.getElementById('searchRiver')
.addEventListener('keyup',function(){

let value=this.value.toLowerCase();

document
.querySelectorAll('#riverTable tr')
.forEach(row=>{

row.style.display=
row.innerText.toLowerCase().includes(value)
? ''
: 'none';

});

});

</script>

@endsection