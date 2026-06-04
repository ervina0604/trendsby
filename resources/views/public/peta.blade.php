@extends('layouts.app')

@section('title','Peta Sungai')

@section('content')

<section class="max-w-[1600px] mx-auto">

<div class="grid lg:grid-cols-[1fr_360px]">

<div class="relative">

<img src="{{ asset('images/home sungai.png') }}"
     class="w-full h-[850px] object-cover">

<div class="absolute top-10 left-10 space-y-3">

<button class="bg-white w-14 h-14 rounded-xl shadow text-3xl">
+
</button>

<button class="bg-white w-14 h-14 rounded-xl shadow text-3xl">
−
</button>

</div>

</div>

<div class="bg-white border-l p-6">

<img src="{{ asset('images/home sungai.png') }}"
     class="rounded-xl">

<div class="mt-5 flex items-center justify-between">

<div>
<h2 class="text-5xl font-bold text-[#04543D]">
Kalimas
</h2>

<p class="text-gray-500">
Surabaya, Jawa Timur
</p>
</div>

<div>
<div class="text-red-600 text-5xl font-bold">
72
</div>
<div>/100</div>
</div>

</div>

<div class="card p-5 mt-6">

<div class="font-semibold">
Status Debit
</div>

<div class="text-red-600 font-bold">
Tinggi
</div>

<p class="mt-4 text-gray-500">
Hulu sungai Kalimas menunjukkan peningkatan sedimen dan limbah rumah tangga.
</p>

</div>

<div class="mt-8 space-y-5">

<div>
<div class="flex justify-between">
<span>Sampah Plastik</span>
<span>85%</span>
</div>
<div class="h-2 bg-gray-200 rounded-full mt-2">
<div class="h-2 bg-red-600 rounded-full w-[85%]"></div>
</div>
</div>

<div>
<div class="flex justify-between">
<span>Air Keruh</span>
<span>60%</span>
</div>
<div class="h-2 bg-gray-200 rounded-full mt-2">
<div class="h-2 bg-yellow-500 rounded-full w-[60%]"></div>
</div>
</div>

<div>
<div class="flex justify-between">
<span>Limbah Kimia</span>
<span>32%</span>
</div>
<div class="h-2 bg-gray-200 rounded-full mt-2">
<div class="h-2 bg-green-700 rounded-full w-[32%]"></div>
</div>
</div>

</div>

<button class="mt-10 w-full bg-[#04543D] text-white py-4 rounded-xl font-bold">
Lihat Detail →
</button>

</div>

</div>

</section>

@endsection