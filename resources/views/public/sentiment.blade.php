@extends('layouts.app')

@section('title', 'Analisis Sentimen')

@section('content')

<section class="mb-12">
    <div class="inline-block bg-[#F4D7C1] text-[#7A4B15] text-xs font-bold px-4 py-2 rounded-full uppercase tracking-widest mb-6">
        AI Analysis
    </div>
    <h1 class="text-[42px] font-extrabold text-[#0A3A67] leading-tight mb-4">
        Detail Analisis Sentimen
    </h1>
    <p class="text-lg text-gray-500">
        Dataset caption dari <strong>{{ $totalPosts }}</strong> postingan Instagram.
    </p>
</section>

{{-- TAB CONTAINER --}}
<div class="mb-12">

    <div class="flex gap-3 mb-8 flex-wrap">
        <button onclick="openTab('positif')" id="tab-btn-positif" 
            class="px-5 py-2 rounded-full font-bold text-sm transition bg-white text-slate-500 border border-slate-200">
            Positif ({{ count($positif) }})
        </button>
        
        <button onclick="openTab('netral')" id="tab-btn-netral" 
            class="px-5 py-2 rounded-full font-bold text-sm transition bg-white text-slate-500 border border-slate-200">
            Netral ({{ count($netral) }})
        </button>
        
        <button onclick="openTab('negatif')" id="tab-btn-negatif" 
            class="px-5 py-2 rounded-full font-bold text-sm transition bg-red-500 text-white border border-red-500">
            Negatif ({{ count($negatif) }})
        </button>
    </div>

    <div id="tab-content-positif" class="hidden md:grid-cols-2 gap-4">
        @foreach($positif as $item)
        <div class="bg-white rounded-[20px] p-5 border border-green-100 shadow-sm">
            <div class="inline-block bg-green-100 text-green-600 text-xs font-bold px-3 py-1 rounded-full mb-3">
                POSITIF
            </div>
            <p class="text-slate-600 text-sm leading-7">
                {{ Str::limit($item['caption'], 200) }}
            </p>
        </div>
        @endforeach
    </div>

    <div id="tab-content-netral" class="hidden md:grid-cols-2 gap-4">
        @foreach($netral as $item)
        <div class="bg-white rounded-[20px] p-5 border border-slate-100 shadow-sm">
            <div class="inline-block bg-slate-100 text-slate-500 text-xs font-bold px-3 py-1 rounded-full mb-3">
                NETRAL
            </div>
            <p class="text-slate-600 text-sm leading-7">
                {{ Str::limit($item['caption'], 200) }}
            </p>
        </div>
        @endforeach
    </div>

    <div id="tab-content-negatif" class="grid md:grid-cols-2 gap-4">
        @foreach($negatif as $item)
        <div class="bg-white rounded-[20px] p-5 border border-red-100 shadow-sm">
            <div class="inline-block bg-red-100 text-red-500 text-xs font-bold px-3 py-1 rounded-full mb-3">
                NEGATIF
            </div>
            <p class="text-slate-600 text-sm leading-7">
                {{ Str::limit($item['caption'], 200) }}
            </p>
        </div>
        @endforeach
    </div>

</div>

<script>
    function openTab(tabName) {
        // 1. Sembunyikan semua konten
        document.getElementById('tab-content-positif').className = 'hidden md:grid-cols-2 gap-4';
        document.getElementById('tab-content-netral').className = 'hidden md:grid-cols-2 gap-4';
        document.getElementById('tab-content-negatif').className = 'hidden md:grid-cols-2 gap-4';

        // 2. Kembalikan semua tombol ke warna abu-abu (tidak aktif)
        const defaultBtnClass = "px-5 py-2 rounded-full font-bold text-sm transition bg-white text-slate-500 border border-slate-200";
        document.getElementById('tab-btn-positif').className = defaultBtnClass;
        document.getElementById('tab-btn-netral').className = defaultBtnClass;
        document.getElementById('tab-btn-negatif').className = defaultBtnClass;

        // 3. Tampilkan konten yang dipilih (ubah 'hidden' jadi 'grid')
        document.getElementById('tab-content-' + tabName).className = 'grid md:grid-cols-2 gap-4';

        // 4. Beri warna pada tombol yang sedang aktif sesuai kategori
        if(tabName === 'positif') {
            document.getElementById('tab-btn-positif').className = "px-5 py-2 rounded-full font-bold text-sm transition bg-green-500 text-white border border-green-500";
        } else if(tabName === 'netral') {
            document.getElementById('tab-btn-netral').className = "px-5 py-2 rounded-full font-bold text-sm transition bg-slate-500 text-white border border-slate-500";
        } else if(tabName === 'negatif') {
            document.getElementById('tab-btn-negatif').className = "px-5 py-2 rounded-full font-bold text-sm transition bg-red-500 text-white border border-red-500";
        }
    }
</script>

@endsection