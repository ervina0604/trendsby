@extends('layouts.app')

@section('title','Prioritas Sungai')

@section('content')

<section class="max-w-7xl mx-auto px-8">

<h1 class="text-5xl font-bold text-[#04543D]">
Prioritas Penanganan Sungai
</h1>

<p class="text-gray-500 mt-3">
Daftar sungai yang membutuhkan perhatian lebih.
</p>

<div class="card overflow-hidden mt-10">

<div class="grid lg:grid-cols-[1.5fr_1fr]">

<img src="{{ asset('images/sungai.png') }}"
     class="w-full h-full object-cover">

<div class="p-8">

<div class="flex justify-between">

<div>
<div class="uppercase tracking-[3px] text-sm text-gray-500">
Sungai Teratas
</div>

<h2 class="text-4xl text-[#04543D] font-bold">
Kalimas
</h2>
</div>

<div class="text-center">
<div class="text-6xl font-bold text-red-600">
8
</div>
<div>Priority Score</div>
</div>

</div>

<div class="bg-gray-100 rounded-xl p-6 mt-8">

<h3 class="font-bold text-[#04543D]">
Rekomendasi
</h3>

<ul class="mt-4 space-y-3 text-gray-600">
<li>• Pengerukan sedimen</li>
<li>• Penambahan trash rack</li>
<li>• Restorasi vegetasi</li>
</ul>

</div>

</div>

</div>

</div>

<h2 class="text-4xl font-bold text-[#04543D] mt-12">
Analisis Visual Top 5
</h2>

<div class="grid md:grid-cols-5 gap-5 mt-6">

@foreach([
['Kalimas','9','red'],
['Pegirian','9','red'],
['Kebon Dalem','9','yellow'],
['Jagir','9','yellow'],
['Wonokromo','9','green']
] as $item)

<div class="card p-5 border-t-4">
<div class="text-sm text-gray-500">
Rank
</div>

<div class="font-bold text-3xl mt-3">
{{ $item[0] }}
</div>

<div class="text-6xl font-bold mt-4">
{{ $item[1] }}
</div>
</div>

@endforeach

</div>

<div class="card mt-8 overflow-hidden">

<table class="w-full">

<thead class="bg-gray-100">
<tr>
<th class="text-left p-5">Rank</th>
<th class="text-left">Nama Sungai</th>
<th>Score</th>
<th>Status</th>
<th>Rekomendasi</th>
</tr>
</thead>

<tbody>

@for($i=1;$i<=10;$i++)

<tr class="border-t">
<td class="p-5">{{ str_pad($i,2,'0',STR_PAD_LEFT) }}</td>
<td>Sungai Kalimas</td>
<td class="text-center">9</td>
<td class="text-center">Kritis</td>
<td>Pembersihan dan pengerukan</td>
</tr>

@endfor

</tbody>

</table>

</div>

</section>

@endsection