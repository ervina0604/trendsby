@extends('layouts.app')

@section('title', $sungai['nama'])

@section('content')

<link rel="stylesheet"
href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

<style>
body {
    background:
        radial-gradient(circle at top left, rgba(126,240,200,.12), transparent 35%),
        radial-gradient(circle at top right, rgba(255,255,255,.03), transparent 40%),
        #2B5748;
}

.glass-card {
    background: rgba(255,255,255,.06);
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
    border: 1px solid rgba(255,255,255,.10);
    border-radius: 32px;
    box-shadow: 0 20px 60px rgba(0,0,0,.12);
}

.text-muted {
    color: rgba(255,255,255,.72);
}

.text-soft {
    color: rgba(255,255,255,.85);
}

.btn-light {
    background: rgba(255,255,255,.10);
    color: white;
    border: 1px solid rgba(255,255,255,.15);
}

.btn-light:hover {
    background: rgba(255,255,255,.16);
}

.btn-accent {
    background: #04543D;
    color: white;
}

.btn-accent:hover {
    background: #0b5135;
}

.image-modal {
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
}

.image-modal.show {
    display: flex;
}
</style>

<section>

    {{-- HERO --}}
    <div class="relative">

        <img
            src="{{ $sungai['foto'] }}"
            alt="{{ $sungai['nama'] }}"
            class="w-full h-[550px] object-cover">

        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent"></div>

        <div class="absolute bottom-24 left-12 text-white">

            <span class="bg-yellow-500 px-5 py-2 rounded-full font-semibold">
                {{ $sungai['status'] }}
            </span>

            <h1 class="text-7xl font-black mt-4">
                {{ $sungai['nama'] }}
            </h1>

            <p class="text-xl mt-2 opacity-90">
                {{ $sungai['lokasi'] }}
            </p>

        </div>

    </div>

    <div class="max-w-7xl mx-auto px-6 -mt-16 relative z-20">

        {{-- INFO CARD --}}
        <div class="grid md:grid-cols-3 gap-6">

            <div class="glass-card p-6">

                <div class="text-white/60 text-sm">
                    STATUS ANALISIS
                </div>

                <div class="text-3xl font-bold text-yellow-400 mt-3">
                    {{ $sungai['status'] }}
                </div>

            </div>

            <div class="glass-card p-6">

                <div class="text-white/60 text-sm">
                    KOORDINAT
                </div>

                <div class="font-bold mt-3 text-white">
                    {{ $sungai['lat'] }},
                    {{ $sungai['lng'] }}
                </div>

            </div>

            <div class="glass-card p-6">

                <div class="text-white/60 text-sm">
                    KATEGORI DATA
                </div>

                <div class="font-bold mt-3 text-[#7EF0C8]">
                    Data Sungai Surabaya
                </div>

            </div>

        </div>

        {{-- CONTENT --}}
        <div class="grid lg:grid-cols-[1fr_420px] gap-8 mt-10">

            {{-- LEFT --}}
            <div class="space-y-8">

                <div class="glass-card p-8">

                    <h2 class="text-3xl font-bold text-white">
                        Deskripsi Sungai
                    </h2>

                    <p class="text-white/75 mt-6 leading-relaxed text-lg">
                        {{ $sungai['deskripsi'] }}
                    </p>

                </div>

                <div class="bg-gradient-to-r from-[#04543D] to-[#0f766e] rounded-3xl p-8 text-white">

                    <h2 class="text-3xl font-bold">
                        Insight AI
                    </h2>

                    <p class="mt-5 leading-relaxed">
                        Ringkasan analisis sentimen untuk <b>{{ $sungai['nama'] }}</b>
                        menunjukkan bahwa pembahasan terkait sungai ini
                        {{ $sungai['sentiment_summary']['negatif'] > 0 ? 'didominasi oleh isyarat kekhawatiran' : 'didukung oleh informasi monitoring yang konsisten' }}.
                        <br><br>
                        {{ $sungai['insight'] }}
                    </p>

                </div>

                <div class="glass-card p-8">

                    <h2 class="text-3xl font-bold text-white">
                        Informasi Monitoring
                    </h2>

                    <div class="mt-6 space-y-4 text-white/80">

                        <div class="flex justify-between">
                            <span>Dokumentasi Tersimpan</span>
                            <span class="font-bold text-white">
                                {{ $sungai['jumlah_galeri'] }}
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span>Pembahasan Media Sosial</span>
                            <span class="font-bold text-white">
                                {{ $sungai['jumlah_post'] }}
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span>Priority Score</span>
                            <span class="font-bold text-yellow-400">
                                {{ $sungai['score'] }}
                            </span>
                        </div>

                    </div>

                </div>

            </div>

            {{-- RIGHT --}}
            <div class="space-y-8">

<div class="glass-card p-5">

                    <div
                        id="map"
                        class="h-[400px] rounded-2xl">
                    </div>

                </div>

                <div class="glass-card p-8">

                    <h3 class="text-2xl font-bold text-white">
                        Detail Lokasi
                    </h3>

                    <div class="mt-6 space-y-5">

                        <div>
                            <div class="text-white/60 text-sm">
                                Nama Sungai
                            </div>

                            <div class="font-semibold text-white">
                                {{ $sungai['nama'] }}
                            </div>
                        </div>

                        <div>
                            <div class="text-white/60 text-sm">
                                Wilayah
                            </div>

                            <div class="font-semibold text-white">
                                {{ $sungai['lokasi'] }}
                            </div>
                        </div>

                        <div>
                            <div class="text-white/60 text-sm">
                                Latitude
                            </div>

                            <div class="font-semibold text-white">
                                {{ $sungai['lat'] }}
                            </div>
                        </div>

                        <div>
                            <div class="text-white/60 text-sm">
                                Longitude
                            </div>

                            <div class="font-semibold text-white">
                                {{ $sungai['lng'] }}
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- GALLERY --}}
        <h2 class="text-4xl font-bold mt-16 mb-8 text-[#04543D]">
            Dokumentasi
        </h2>

        @if(count($sungai['galleries']) > 0)

            <div class="grid md:grid-cols-3 gap-6">

                @foreach($sungai['galleries'] as $gallery)

                    <button
                        type="button"
                        class="glass-card overflow-hidden text-left group cursor-zoom-in"
                        data-image="{{ $gallery['image'] }}"
                        data-caption="{{ $gallery['caption'] ?: 'Dokumentasi sungai' }}"
                        onclick="openImageModal(this)">

                        <img
                            src="{{ $gallery['image'] }}"
                            alt="Dokumentasi {{ $sungai['nama'] }}"
                            class="w-full h-64 object-cover transition duration-300 group-hover:scale-105">

                        <div class="p-4 border-t border-white/10">
                            <div class="text-sm text-white/70">Klik untuk zoom</div>
                            <div class="text-white font-semibold mt-1 line-clamp-2">
                                {{ $gallery['caption'] ?: 'Dokumentasi sungai' }}
                            </div>
                        </div>

                    </button>

                @endforeach

            </div>

@else

<div class="glass-card p-12 text-center">

    <div class="text-6xl mb-4">
        📷
    </div>

    <h3 class="text-2xl font-bold text-white">
        Dokumentasi Belum Tersedia
    </h3>

</div>

@endif
        </div>

        <div class="flex justify-between mt-12 mb-20">

            <a
                href="{{ route('peta') }}"
                class="btn-light px-8 py-4 rounded-xl font-semibold">

                Kembali ke Peta

            </a>

            <a
                href="{{ route('prioritas') }}"
                class="btn-accent px-8 py-4 rounded-xl font-semibold">

                Lihat Prioritas

            </a>

        </div>

    </div>

</section>

<div id="imageModal" class="image-modal fixed inset-0 z-[999] hidden items-center justify-center bg-black/80 px-4">
    <div class="relative w-full max-w-5xl rounded-3xl bg-white/10 p-3 shadow-2xl">
        <button
            type="button"
            onclick="closeImageModal()"
            class="absolute right-4 top-4 z-10 rounded-full bg-black/60 px-3 py-2 text-white hover:bg-black/80">
            ✕
        </button>
        <img id="modalImage" src="" alt="Preview dokumentasi" class="max-h-[80vh] w-full rounded-2xl object-contain">
        <div id="modalCaption" class="mt-3 px-2 pb-2 text-center text-white/90"></div>
    </div>
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>

function openImageModal(button) {
    const modal = document.getElementById('imageModal');
    const image = document.getElementById('modalImage');
    const caption = document.getElementById('modalCaption');

    image.src = button.dataset.image;
    caption.textContent = button.dataset.caption;
    modal.classList.remove('hidden');
    modal.classList.add('show', 'flex');
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    modal.classList.add('hidden');
    modal.classList.remove('show', 'flex');
}

document.addEventListener('DOMContentLoaded', function(){
    document.getElementById('imageModal').addEventListener('click', function(event){
        if (event.target === this) {
            closeImageModal();
        }
    });

    document.addEventListener('keydown', function(event){
        if (event.key === 'Escape') {
            closeImageModal();
        }
    });

    const map = L.map('map').setView(
    [
        {{ $sungai['lat'] }},
        {{ $sungai['lng'] }}
    ],
    13
    );

    L.tileLayer(
    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    {
        attribution:'© OpenStreetMap'
    }
    ).addTo(map);

    L.marker(
    [
        {{ $sungai['lat'] }},
        {{ $sungai['lng'] }}
    ])
    .addTo(map)
    .bindPopup(`
        <b>{{ $sungai['nama'] }}</b><br>
        {{ $sungai['lokasi'] }}
    `)
    .openPopup();

    L.circle(
    [
        {{ $sungai['lat'] }},
        {{ $sungai['lng'] }}
    ],
    {
        radius:1000,
        color:'#04543D',
        fillColor:'#04543D',
        fillOpacity:0.15
    }
    ).addTo(map);

});

</script>

@endsection