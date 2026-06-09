@extends('layouts.app')

@section('title','SuraTrend')

@section('content')

<link rel="stylesheet"
href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

<style>

body{
    background:
    radial-gradient(
        circle at top left,
        rgba(0,255,200,.08),
        transparent 35%
    ),
    radial-gradient(
        circle at top right,
        rgba(255,255,255,.03),
        transparent 40%
    ),
    #2B5748;
}

#homeMap{
    height:700px;
    border-radius:32px;
}


/* CARD UTAMA */

.card-panel{

    position:relative;

    background:
        rgba(255,255,255,.08);

    backdrop-filter:blur(18px);
    -webkit-backdrop-filter:blur(18px);

    border:
        1px solid rgba(255,255,255,.12);

    border-radius:32px;

    overflow:hidden;

    box-shadow:
        0 20px 60px rgba(0,0,0,.15),
        inset 0 1px 0 rgba(255,255,255,.08);

    transition:.3s ease;
}

/* METRIC CARD */

.metric-card{

    background:
        rgba(255,255,255,.06);

    backdrop-filter:
        blur(18px);

    -webkit-backdrop-filter:
        blur(18px);

    border:
        1px solid rgba(255,255,255,.10);

    border-radius:
        28px;

    padding:
        28px;

    box-shadow:
        0 10px 40px rgba(0,0,0,.12);

    transition:
        .3s ease;
}

.metric-card:hover{

    transform:
        translateY(-4px);

    background:
        rgba(255,255,255,.09);
}

.metric-card p{

    color:
        rgba(255,255,255,.65);

    font-size:
        14px;

    text-transform:
        uppercase;

    letter-spacing:
        .08em;
}

.metric-card h3{

    color:white;
}

/* GLASS CARD */

.glass-card{

    background:
        rgba(255,255,255,.06);

    backdrop-filter:
        blur(18px);

    -webkit-backdrop-filter:
        blur(18px);

    border:
        1px solid rgba(255,255,255,.10);

    border-radius:
        32px;

    overflow:hidden;

    box-shadow:
        0 20px 60px rgba(0,0,0,.12);
}

/* STATUS BADGE */

.status-badge{

    display:inline-flex;

    align-items:center;

    padding:
        10px 18px;

    border-radius:
        999px;

    font-weight:
        600;

    font-size:
        14px;

    background:
        rgba(255,255,255,.08);

    color:white;

    border:
        1px solid rgba(255,255,255,.10);
}

.card-panel:hover{

    transform:translateY(-3px);

    box-shadow:
        0 30px 70px rgba(0,0,0,.20),
        inset 0 1px 0 rgba(255,255,255,.10);
}

/* BORDER GLOW */

.card-panel::before{

    content:"";

    position:absolute;

    inset:0;

    border-radius:32px;

    padding:1px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.18),
            rgba(255,255,255,.04)
        );

    -webkit-mask:
        linear-gradient(#fff 0 0) content-box,
        linear-gradient(#fff 0 0);

    -webkit-mask-composite:xor;

    pointer-events:none;
}

/* LEGEND */

.legend{

    background:
        rgba(255,255,255,.08);

    backdrop-filter:blur(16px);

    border:
        1px solid rgba(255,255,255,.12);

    color:white;

    padding:16px;

    border-radius:20px;

    box-shadow:
        0 10px 25px rgba(0,0,0,.15);
}

.dot{
    width:10px;
    height:10px;
    border-radius:50%;
    display:inline-block;
    margin-right:6px;
}

/* HERO */

.hero-title{

    color:white;

    font-size:64px;

    line-height:1.1;

    font-weight:800;
}

.hero-subtitle{

    color:
    rgba(255,255,255,.75);

    font-size:20px;
}

/* DETAIL PANEL */

#riverName{
    color:white;
}

#riverStatus{
    color:rgba(255,255,255,.70);
}

#riverScore{
    color:#86efac;
}

#riverDesc{
    color:rgba(255,255,255,.75);
}

/* BUTTON */

#detailLink{

    width:100%;

    display:block;

    text-align:center;

    background:
        rgba(255,255,255,.10);

    border:
        1px solid rgba(255,255,255,.15);

    color:white;

    padding:16px;

    border-radius:18px;

    backdrop-filter:blur(16px);

    transition:.3s;
}

#detailLink:hover{

    background:
        rgba(255,255,255,.18);
}

/* IMAGE */

#riverImage{

    border-radius:24px;

    border:
        1px solid rgba(255,255,255,.10);
}

</style>

<section class="max-w-7xl mx-auto px-6 py-16">

<div class="grid lg:grid-cols-2 gap-12 items-center">

    <div>

        <h1 class="hero-title">

            Pantau Kondisi Sungai
            <br>

            <span style="color:#7EF0C8">
                Surabaya
            </span>

        </h1>

        <p class="hero-subtitle mt-6">

             Temukan kondisi sungai, tingkat prioritas penanganan,
             dan dokumentasi lingkungan.

        </p>

    </div>

    <div>

        <img
            src="{{ asset('storage/home-sungai.png') }}"
            class="rounded-[32px] shadow-2xl h-[420px] w-full object-cover border border-white/10"
        >

    </div>

</div>

</section>

<section class="max-w-7xl mx-auto px-6 mb-10">

<div class="grid md:grid-cols-4 gap-6">

    <div class="metric-card">

        <p>Total Sungai</p>

        <h3 class="text-5xl font-bold mt-3">

            {{ count($rivers) }}

        </h3>

    </div>

    <div class="metric-card">

<p>Kritis</p>

            <h3
            class="text-5xl font-bold mt-3"
            style="color:#ff6b6b">

                {{
                    collect($rivers)
                    ->where('status','Kritis')
                ->count()
            }}

        </h3>

    </div>

    <div class="metric-card">

        <p>Perlu Perhatian</p>

        <h3
        class="text-5xl font-bold mt-3"
        style="color:#ffd166">

            {{
                collect($rivers)
                ->where('status','Perlu Perhatian')
                ->count()
            }}

        </h3>

    </div>

    <div class="metric-card">

        <p>Kondisi Baik</p>

        <h3
        class="text-5xl font-bold mt-3"
        style="color:#7EF0C8">

            {{
                collect($rivers)
                ->where('status','Baik')
                ->count()
            }}

        </h3>

    </div>

</div>

</section>

<section class="max-w-7xl mx-auto px-6 pb-20">

<div class="grid lg:grid-cols-[1fr_420px] gap-8">

    <div class="glass-card p-4 relative">
        <div class="absolute top-5 right-5 z-[999] bg-[#7EF0C8] text-[#16352C] font-semibold px-4 py-3 rounded-2xl shadow-lg">
            📍 Klik marker untuk melihat detail sungai
        </div>

        <div class="relative">
            <input
                id="searchRiver"
                type="text"
                placeholder="Cari sungai..."
                class="absolute top-5 left-5 z-[999] w-72 px-4 py-3 rounded-2xl bg-white/10 text-white backdrop-blur-lg border border-white/10 outline-none"
            >

            <div id="homeMap" class="h-[620px] rounded-[32px] border border-white/10"></div>
        </div>
    </div>
    <div class="glass-card p-7">

    <img
        id="riverImage"
        src="{{ asset('storage/home-sungai.png') }}"
        class="w-full h-56 object-cover rounded-3xl border border-white/10"
    >

    <div class="mt-6">

        <h2
        id="riverName"
        class="text-4xl font-bold text-white">

            Klik Sungai

        </h2>

        <div class="mt-4">

            <span
            id="statusBadge"
            class="status-badge">
                -
            </span>

        </div>

        <div class="mt-8">

            <div
            class="flex justify-between text-sm mb-2 text-white/70">

                <span>Risk Score</span>

                <span id="riverScore">
                    0%
                </span>

            </div>

            <div
            class="h-3 rounded-full bg-white/10">

                <div
                id="scoreBar"
                class="h-3 rounded-full bg-[#7EF0C8] transition-all duration-700"
                style="width:0%">
                </div>

            </div>

        </div>

        <p id="riverDesc" class="mt-6 text-white/70 leading-relaxed">
            Klik marker pada peta untuk melihat detail sungai.
        </p>

        <div id="aiSummary" class="mt-5 text-sm text-[#7EF0C8]">
            Pilih sungai untuk melihat analisis.
        </div>

        <a
            id="detailLink"
            href="#"
            class="block w-full mt-8 text-center text-white py-4 rounded-2xl font-semibold border border-white/10 bg-white/10 hover:bg-white/15 transition"
        >
            Lihat Detail Sungai
        </a>

    </div>

</div>

</section>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
const rivers = @json($rivers);
console.log(rivers);

function color(status) {
    if (status === 'Baik') return '#22c55e';
    if (status === 'Perlu Perhatian') return '#f59e0b';
    if (status === 'Kritis') return '#ef4444';
    return '#64748b';
}

function formatPopup(r) {
    return `
<div style="width:220px">
    <img
        src="${r.image}"
        style="width:100%;height:120px;object-fit:cover;border-radius:12px;margin-bottom:10px;"
    >
    <strong>${r.name}</strong>
    <br>
    ${r.status}
    <br>
    Score : <b>${r.score}%</b>
</div>
`;
}

function setRiverDetails(r) {
    document.getElementById('riverName').innerText = r.name;
    document.getElementById('riverDesc').innerText = r.desc;
    document.getElementById('riverImage').src = r.image;
    document.getElementById('riverScore').innerText = r.score + '%';
    document.getElementById('scoreBar').style.width = r.score + '%';

    const summary = document.getElementById('aiSummary');
    if (r.score >= 75) {
        summary.innerText = 'Sungai ini memiliki tingkat prioritas tinggi dan memerlukan penanganan segera.';
    } else if (r.score >= 50) {
        summary.innerText = 'Sungai perlu mendapatkan perhatian dan monitoring berkala.';
    } else {
        summary.innerText = 'Kondisi sungai relatif baik berdasarkan hasil analisis saat ini.';
    }

    const badge = document.getElementById('statusBadge');
    if (r.status === 'Baik') {
        badge.className = 'status-badge bg-green-100 text-green-700';
        badge.innerHTML = '🟢 Baik';
    } else if (r.status === 'Perlu Perhatian') {
        badge.className = 'status-badge bg-yellow-100 text-yellow-800';
        badge.innerHTML = '🟡 Perlu Perhatian';
    } else {
        badge.className = 'status-badge bg-red-100 text-red-800';
        badge.innerHTML = '🔴 Kritis';
    }

    document.getElementById('detailLink').href =
        '/sungai/' + r.slug;
}

const map = L.map('homeMap').setView([-7.2575,112.7521], 11);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap'
}).addTo(map);

if (rivers.length > 0) {
    setRiverDetails(rivers[0]);
}
const markers = [];

rivers.forEach(r => {
    const marker = L.circleMarker([r.lat, r.lng], {
        radius: 12,
        fillColor: color(r.status),
        color: '#fff',
        weight: 3,
        fillOpacity: 1
    }).addTo(map);

    marker.bindPopup(formatPopup(r));

markers.push({
    name: r.name.toLowerCase(),
    marker: marker,
    data: r
});

marker.on('mouseover', () =>
    marker.setStyle({ radius: 16 })
);
    marker.on('mouseout', () => marker.setStyle({ radius: 12 }));
    marker.on('click', () => {
        map.flyTo([r.lat, r.lng], 13, { duration: 1.5 });
        setRiverDetails(r);
    });
});

const searchInput =
    document.getElementById('searchRiver');

searchInput.addEventListener('keyup', function () {

    const keyword =
        this.value.toLowerCase();

    const found =
        markers.find(item =>
            item.name.includes(keyword)
        );

    if(found){

        map.flyTo(
            [
                found.data.lat,
                found.data.lng
            ],
            13,
            {
                duration: 1.5
            }
        );

        found.marker.openPopup();

        setRiverDetails(
            found.data
        );
    }

});
</script>

@endsection