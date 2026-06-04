@extends('layouts.app')

@section('title','Prioritas Sungai')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

@php

$sungai = [

['slug'=>'kalimas','nama'=>'Kalimas','score'=>92,'status'=>'Kritis'],
['slug'=>'kalianak','nama'=>'Kalianak','score'=>88,'status'=>'Kritis'],
['slug'=>'greges','nama'=>'Greges','score'=>84,'status'=>'Kritis'],
['slug'=>'jagir','nama'=>'Jagir','score'=>76,'status'=>'Perhatian'],
['slug'=>'tambak-wedi','nama'=>'Tambak Wedi','score'=>72,'status'=>'Perhatian'],
['slug'=>'kedung-cowek','nama'=>'Kedung Cowek','score'=>70,'status'=>'Perhatian'],
['slug'=>'bosem-kalianak','nama'=>'Bosem Kalianak','score'=>68,'status'=>'Perhatian'],
['slug'=>'gunung-anyar','nama'=>'Gunung Anyar','score'=>65,'status'=>'Perhatian'],
['slug'=>'dadapan','nama'=>'Dadapan','score'=>62,'status'=>'Perhatian'],
['slug'=>'kebon-agung','nama'=>'Kebon Agung','score'=>60,'status'=>'Perhatian'],
['slug'=>'manukan','nama'=>'Manukan','score'=>58,'status'=>'Perhatian'],
['slug'=>'tambak-langon','nama'=>'Tambak Langon','score'=>56,'status'=>'Baik'],
['slug'=>'keputih','nama'=>'Keputih','score'=>55,'status'=>'Baik'],
['slug'=>'kalisari','nama'=>'Kalisari','score'=>52,'status'=>'Baik'],
['slug'=>'damean','nama'=>'Damean','score'=>50,'status'=>'Baik'],
['slug'=>'sememi','nama'=>'Sememi','score'=>48,'status'=>'Baik'],
['slug'=>'kali-lamong','nama'=>'Kali Lamong','score'=>45,'status'=>'Baik'],

];

$top = $sungai[0];

@endphp

<section class="max-w-7xl mx-auto px-6 pb-16">

    {{-- HEADER --}}
    <div class="flex flex-col lg:flex-row justify-between gap-6 items-start lg:items-center">

        <div>
            <h1 class="text-5xl font-bold text-[#04543D]">
                Prioritas Penanganan Sungai
            </h1>

            <p class="text-gray-500 mt-3 text-lg">
                Ranking sungai berdasarkan hasil analisis media sosial,
                dokumentasi lapangan, dan skor prioritas penanganan.
            </p>
        </div>

        <div class="bg-[#04543D] text-white px-8 py-5 rounded-3xl shadow-lg">

            <div class="text-sm opacity-80">
                Total Sungai Dipantau
            </div>

            <div class="text-5xl font-bold">
                17
            </div>

        </div>

    </div>

    {{-- HERO --}}
    <div class="bg-white rounded-[32px] overflow-hidden shadow-xl mt-10">

        <div class="grid lg:grid-cols-[1.3fr_1fr]">

            <img
                id="heroImage"
                src="{{ asset('images/sungai.png') }}"
                class="w-full h-full object-cover">

            <div class="p-8">

                <div class="flex justify-between items-start">

                    <div>

                        <div class="uppercase text-sm tracking-[4px] text-gray-500">
                            Sungai Prioritas Utama
                        </div>

                        <h2
                            id="heroName"
                            class="text-5xl font-bold text-[#04543D] mt-2">
                            {{ $top['nama'] }}
                        </h2>

                    </div>

                    <div>

                        <div
                            id="heroScore"
                            class="text-7xl font-black text-red-600">
                            {{ $top['score'] }}
                        </div>

                        <div class="text-center text-gray-500">
                            Score
                        </div>

                    </div>

                </div>

                <span
                    id="heroStatus"
                    class="inline-block mt-6 px-4 py-2 rounded-full bg-red-100 text-red-600 font-bold">
                    {{ $top['status'] }}
                </span>

                <p class="mt-6 text-gray-600 leading-relaxed">
                    Sungai dengan tingkat prioritas tertinggi yang memerlukan
                    perhatian lebih lanjut berdasarkan hasil pemantauan.
                </p>

                <div class="grid grid-cols-3 gap-4 mt-8">

                    <div>
                        <div class="text-sm text-gray-500">Sampah</div>
                        <div class="text-3xl font-bold text-red-600">85%</div>
                    </div>

                    <div>
                        <div class="text-sm text-gray-500">Sedimen</div>
                        <div class="text-3xl font-bold text-yellow-500">70%</div>
                    </div>

                    <div>
                        <div class="text-sm text-gray-500">Limbah</div>
                        <div class="text-3xl font-bold text-purple-600">50%</div>
                    </div>

                </div>

                <a
                    id="heroButton"
                    href="{{ route('detail.sungai',$top['slug']) }}"
                    class="block mt-8 bg-[#04543D] text-white text-center py-4 rounded-2xl font-bold hover:bg-[#02392b]">

                    Lihat Detail Sungai →

                </a>

            </div>

        </div>

    </div>

    {{-- TOP 5 --}}
    <h2 class="text-4xl font-bold text-[#04543D] mt-14">
        Top 5 Prioritas
    </h2>

    <div class="grid md:grid-cols-5 gap-5 mt-6">

        @foreach(array_slice($sungai,0,5) as $item)

        <a
            href="{{ route('detail.sungai',$item['slug']) }}"
            class="bg-white rounded-3xl p-6 shadow-lg hover:-translate-y-2 transition">

            <div class="text-sm text-gray-500">
                Priority Score
            </div>

            <div class="font-bold text-2xl mt-3">
                {{ $item['nama'] }}
            </div>

            <div class="text-6xl font-black mt-4 text-[#04543D]">
                {{ $item['score'] }}
            </div>

        </a>

        @endforeach

    </div>

    {{-- CHART + TABLE --}}
    <div class="grid lg:grid-cols-[350px_1fr] gap-8 mt-10">

        <div class="bg-white rounded-3xl p-6 shadow-lg">

            <h3 class="font-bold text-2xl mb-5">
                Distribusi Prioritas
            </h3>

            <div id="priorityChart"></div>

        </div>

        <div class="bg-white rounded-3xl overflow-hidden shadow-lg">

            <div class="p-5 border-b">

                <input
                    type="text"
                    id="searchRiver"
                    placeholder="Cari sungai..."
                    class="w-full border rounded-xl px-4 py-3">

            </div>

            <table class="w-full">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="text-left p-5">Rank</th>
                        <th class="text-left">Nama Sungai</th>
                        <th class="text-center">Score</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Detail</th>

                    </tr>

                </thead>

                <tbody id="riverTable">

                @foreach($sungai as $index => $item)

                <tr class="border-t hover:bg-gray-50">

                    <td class="p-5">
                        {{ str_pad($index+1,2,'0',STR_PAD_LEFT) }}
                    </td>

                    <td class="font-semibold">
                        {{ $item['nama'] }}
                    </td>

                    <td class="text-center font-bold">
                        {{ $item['score'] }}
                    </td>

                    <td class="text-center">

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
                            class="text-[#04543D] font-bold">

                            Detail

                        </a>

                    </td>

                </tr>

                @endforeach

                </tbody>

            </table>

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