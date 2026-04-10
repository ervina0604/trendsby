@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<section class="mb-10">
    <div class="inline-flex items-center gap-2 bg-[#97E082] text-[#143A19] text-[12px] font-extrabold px-4 h-[34px] rounded-full uppercase tracking-[.08em] mb-10">
        <span class="w-[8px] h-[8px] rounded-full bg-[#111827]"></span>
        LIVE ANALYTICS
    </div>

    <div class="max-w-[930px]">
        <h1 class="text-[58px] leading-[1.06] font-extrabold text-[#083B6E] tracking-[-0.04em] mb-4">
            Tren Konten Instagram Sungai Surabaya
        </h1>
        <p class="text-[18px] leading-[1.55] text-slate-600 max-w-[760px]">
            Ringkasan analisis hashtag, keyword, dan tren posting dari akun Peduli Sungai Surabaya dan Ecoton.
        </p>
    </div>
</section>

<section class="grid grid-cols-1 xl:grid-cols-[1fr_1fr_1fr] gap-5 mb-11">
    <div class="glass-card min-h-[122px] px-7 py-7 relative overflow-hidden">
        <div class="absolute left-0 top-[12px] bottom-[12px] w-[4px] bg-[#2E9F43] rounded-full"></div>
        <div class="text-[12px] uppercase tracking-[.18em] font-extrabold text-slate-500 mb-4">
            HASHTAG TERPOPULER
        </div>
        <div class="text-[28px] leading-none font-extrabold text-[#083B6E] mb-2 tracking-[-0.03em]">
            #sungaisurabaya
        </div>
        <div class="text-[#2E7D32] text-[14px] font-bold">
            Dominasi 42% Konten
        </div>
        <div class="absolute right-6 bottom-[-14px] text-[96px] font-extrabold text-slate-200 leading-none">#</div>
    </div>

    <div class="glass-card min-h-[122px] px-7 py-7 relative overflow-hidden">
        <div class="text-[12px] uppercase tracking-[.18em] font-extrabold text-slate-500 mb-4">
            KEYWORD DOMINAN
        </div>
        <div class="text-[28px] leading-none font-extrabold text-[#083B6E] mb-2 tracking-[-0.03em]">
            "sampah"
        </div>
        <div class="text-[#2E7D32] text-[14px] font-bold">
            Urgensi Lingkungan Tinggi
        </div>

        <div class="absolute right-7 bottom-6 grid grid-cols-4 gap-2 opacity-[.07]">
            @for($i=0;$i<12;$i++)
                <span class="w-[11px] h-[11px] bg-slate-700 rounded-[2px]"></span>
            @endfor
        </div>
    </div>

    <div class="rounded-[28px] bg-[#063A67] min-h-[122px] px-7 py-7 text-white relative overflow-hidden">
        <div class="text-[12px] uppercase tracking-[.18em] font-extrabold text-[#78A9D2] mb-4">
            PERIODE TERTINGGI
        </div>
        <div class="text-[22px] leading-[1.25] font-extrabold tracking-[-0.02em] mb-2 max-w-[250px]">
            Minggu ke-2 Maret 2026
        </div>
        <div class="text-[#9CE38C] text-[14px] font-bold">
            Puncak Kampanye Clean-up
        </div>

        <img src="{{ asset('storage/grafik.png') }}" alt="Grafik tren" class="absolute right-4 bottom-2 w-[128px] opacity-[.12] object-contain">
    </div>
</section>

<section class="grid grid-cols-1 xl:grid-cols-[1.82fr_.88fr] gap-6 mb-10 items-stretch">
    <div class="glass-card p-6 min-h-[500px]">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 mb-7">
            <div class="flex flex-wrap gap-4">
                <button type="button" class="dashboard-tab h-[42px] px-6 rounded-full text-[15px] font-bold transition" data-view="timeline">
                    Timeline
                </button>
                <button type="button" class="dashboard-tab h-[42px] px-6 rounded-full text-[15px] font-bold transition" data-view="tagcloud">
                    Tag Cloud
                </button>
                <button type="button" class="dashboard-tab h-[42px] px-6 rounded-full text-[15px] font-bold transition" data-view="ranking">
                    Ranking Table
                </button>
            </div>

            <div class="bg-[#DCDDDF] p-[4px] rounded-full inline-flex gap-[3px] w-fit">
                <button type="button" class="period-tab h-[32px] px-4 rounded-full text-[12px] font-bold transition" data-period="weekly">
                    Mingguan
                </button>
                <button type="button" class="period-tab h-[32px] px-4 rounded-full text-[12px] font-bold transition" data-period="monthly">
                    Bulanan
                </button>
            </div>
        </div>

        <div id="main-visual-panel" class="fade-in-panel bg-[#FCFCFC] rounded-[22px] min-h-[250px] px-7 pt-8 pb-5 relative overflow-hidden mb-5">
        </div>

        <div id="mini-cards-panel" class="grid grid-cols-1 md:grid-cols-3 gap-4">
        </div>
    </div>

    <div class="glass-card px-7 py-7 min-h-[500px]">
        <h2 id="side-title" class="text-[18px] font-extrabold text-[#083B6E] mb-10 tracking-[-0.02em]">
            Visual Keyword Cloud
        </h2>

        <div id="side-panel" class="h-[390px] flex items-center justify-center">
        </div>
    </div>
</section>

<section class="grid grid-cols-1 xl:grid-cols-[1.04fr_1fr] gap-6 items-center">
    <div class="relative min-h-[245px] rounded-[28px] overflow-hidden">
        <img src="{{ asset('storage/visual.png') }}" alt="Visual report" class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0A4360]/95 via-[#0A4360]/78 to-[#0A4360]/25"></div>

        <div class="absolute left-7 bottom-7 z-10 text-white max-w-[520px]">
            <div class="inline-flex items-center h-[30px] px-4 rounded-full bg-[#8A4D12] text-[12px] font-extrabold uppercase tracking-[.09em] mb-5">
                LAPORAN TERKINI
            </div>

            <h2 class="text-[22px] sm:text-[24px] xl:text-[25px] leading-[1.26] font-extrabold tracking-[-0.03em]">
                Analisis Visual Dampak Pencemaran terhadap Volume Konten Edukasi.
            </h2>
        </div>
    </div>

    <div class="pl-0 xl:pl-4">
        <div class="text-[#2E7D32] uppercase tracking-[.28em] text-[12px] font-extrabold mb-5">
            DATA INSIGHT
        </div>

        <h2 class="text-[24px] sm:text-[28px] xl:text-[26px] leading-[1.35] font-extrabold text-[#083B6E] max-w-[560px] mb-8 tracking-[-0.03em]">
            Kampanye digital meningkat 3x lipat selama periode banjir di hulu sungai.
        </h2>

        <div class="bg-[#E9E9EB] rounded-[22px] px-7 py-7 text-slate-600 text-[15px] leading-[1.8] relative">
            <div class="absolute left-4 top-6 bottom-6 w-[4px] bg-[#083B6E] rounded-full"></div>
            <div class="pl-3">
                "Pola keyword 'plastik' dan 'limbah' memiliki korelasi 89% dengan laporan publik di akun Peduli Sungai Surabaya."
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
const dashboardState = {
    currentView: 'timeline',
    currentPeriod: 'weekly'
};

const dashboardData = {
    weekly: {
        timeline: {
            visualType: 'bars',
            overlayText: 'POST TREND ANALYSIS',
            bars: [
                { h: 68, c: '#9EE294' },
                { h: 118, c: '#9EE294' },
                { h: 96, c: '#9EE294' },
                { h: 140, c: '#1F669A' },
                { h: 112, c: '#9EE294' },
                { h: 76, c: '#9EE294' },
                { h: 124, c: '#9EE294' }
            ],
            groups: [
                {
                    label: '2 HARI LALU',
                    highlight: false,
                    items: [
                        { tag: '#surabaya', count: '420 posts', line: true, primary: false },
                        { tag: '#kuliner', count: '315 posts', line: false, primary: false }
                    ]
                },
                {
                    label: '1 HARI LALU',
                    highlight: false,
                    items: [
                        { tag: '#eventsurabaya', count: '580 posts', line: true, primary: false },
                        { tag: '#sungaisurabaya', count: '510 posts', line: true, primary: false }
                    ]
                },
                {
                    label: 'HARI INI',
                    highlight: true,
                    items: [
                        { tag: '#limbahplastik', count: '720 posts', line: false, primary: true },
                        { tag: '#pencemaran', count: '440 posts', line: true, primary: false }
                    ]
                }
            ],
            sideTitle: 'Visual Keyword Cloud',
            sideType: 'cloud',
            words: [
                { text: '#sungaisurabaya', cls: 'text-[32px] xl:text-[36px] font-extrabold text-[#083B6E] tracking-[-0.04em]' },
                { text: 'sampah', cls: 'bg-[#D9F2D2] px-4 h-[38px] inline-flex items-center rounded-full text-[#2E7D32] text-[19px] font-bold' },
                { text: 'limbah', cls: 'text-[#8B4E0E] text-[24px] font-extrabold' },
                { text: 'pencemaran', cls: 'text-slate-500 text-[18px] font-medium' },
                { text: 'plastik', cls: 'text-[#083B6E] text-[22px] font-extrabold' },
                { text: 'banjir', cls: 'text-[#C62828] text-[16px] font-semibold' },
                { text: 'Ecoton', cls: 'text-[#2E7D32] text-[20px] font-extrabold' },
                { text: 'mikroplastik', cls: 'text-[#0B5B94] text-[18px] font-extrabold' },
                { text: 'air bersih', cls: 'text-slate-400 text-[16px]' }
            ]
        },
        tagcloud: {
            visualType: 'image',
            image: '{{ asset('storage/tagcloud.png') }}',
            groups: [
                {
                    label: '2 HARI LALU',
                    highlight: false,
                    items: [
                        { tag: '#surabaya', count: '420 posts', line: true, primary: false },
                        { tag: '#kuliner', count: '315 posts', line: false, primary: false }
                    ]
                },
                {
                    label: '1 HARI LALU',
                    highlight: false,
                    items: [
                        { tag: '#eventsurabaya', count: '580 posts', line: true, primary: false },
                        { tag: '#sungaisurabaya', count: '720 posts', line: false, primary: true }
                    ]
                },
                {
                    label: 'HARI INI',
                    highlight: true,
                    items: [
                        { tag: '#limbahplastik', count: '510 posts', line: true, primary: false },
                        { tag: '#pencemaran', count: '440 posts', line: true, primary: false }
                    ]
                }
            ],
            sideTitle: 'Visual Keyword Cloud',
            sideType: 'cloud',
            words: [
                { text: '#sungaisurabaya', cls: 'text-[32px] xl:text-[36px] font-extrabold text-[#083B6E] tracking-[-0.04em]' },
                { text: 'sampah', cls: 'bg-[#D9F2D2] px-4 h-[38px] inline-flex items-center rounded-full text-[#2E7D32] text-[19px] font-bold' },
                { text: 'limbah', cls: 'text-[#8B4E0E] text-[24px] font-extrabold' },
                { text: 'pencemaran', cls: 'text-slate-500 text-[18px] font-medium' },
                { text: 'plastik', cls: 'text-[#083B6E] text-[22px] font-extrabold' },
                { text: 'banjir', cls: 'text-[#C62828] text-[16px] font-semibold' },
                { text: 'Ecoton', cls: 'text-[#2E7D32] text-[20px] font-extrabold' },
                { text: 'mikroplastik', cls: 'text-[#0B5B94] text-[18px] font-extrabold' },
                { text: 'air bersih', cls: 'text-slate-400 text-[16px]' }
            ]
        },
        ranking: {
            visualType: 'table',
            rows: [
                { rank: '1', tag: '#limbahplastik', posts: '720', growth: '+129%', color: '#204E7B' },
                { rank: '2', tag: '#eventsurabaya', posts: '580', growth: '+96%', color: '#4F7E49' },
                { rank: '3', tag: '#sungaisurabaya', posts: '510', growth: '+65%', color: '#3870A2' },
                { rank: '4', tag: '#pencemaran', posts: '440', growth: '+40%', color: '#E79D2B' },
                { rank: '5', tag: '#surabaya', posts: '420', growth: '+31%', color: '#A8B67F' },
                { rank: '6', tag: '#kuliner', posts: '315', growth: '+11%', color: '#B8C37A' }
            ],
            groups: [
                {
                    label: '2 HARI LALU',
                    highlight: false,
                    items: [
                        { tag: '#surabaya', count: '420 posts', line: true, primary: false },
                        { tag: '#kuliner', count: '315 posts', line: false, primary: false }
                    ]
                },
                {
                    label: '1 HARI LALU',
                    highlight: false,
                    items: [
                        { tag: '#eventsurabaya', count: '580 posts', line: true, primary: false },
                        { tag: '#sungaisurabaya', count: '510 posts', line: true, primary: false }
                    ]
                },
                {
                    label: 'HARI INI',
                    highlight: true,
                    items: [
                        { tag: '#limbahplastik', count: '720 posts', line: false, primary: true },
                        { tag: '#pencemaran', count: '440 posts', line: true, primary: false }
                    ]
                }
            ],
            sideTitle: 'Visual Keyword Cloud',
            sideType: 'cloud',
            words: [
                { text: '#sungaisurabaya', cls: 'text-[32px] xl:text-[36px] font-extrabold text-[#083B6E] tracking-[-0.04em]' },
                { text: 'sampah', cls: 'bg-[#D9F2D2] px-4 h-[38px] inline-flex items-center rounded-full text-[#2E7D32] text-[19px] font-bold' },
                { text: 'limbah', cls: 'text-[#8B4E0E] text-[24px] font-extrabold' },
                { text: 'pencemaran', cls: 'text-slate-500 text-[18px] font-medium' },
                { text: 'plastik', cls: 'text-[#083B6E] text-[22px] font-extrabold' },
                { text: 'banjir', cls: 'text-[#C62828] text-[16px] font-semibold' },
                { text: 'Ecoton', cls: 'text-[#2E7D32] text-[20px] font-extrabold' },
                { text: 'mikroplastik', cls: 'text-[#0B5B94] text-[18px] font-extrabold' },
                { text: 'air bersih', cls: 'text-slate-400 text-[16px]' }
            ]
        }
    },

    monthly: {
        timeline: {
            visualType: 'bars',
            overlayText: 'POST TREND ANALYSIS',
            bars: [
                { h: 76, c: '#FB9B3B' },
                { h: 118, c: '#FB9B3B' },
                { h: 88, c: '#FB9B3B' },
                { h: 142, c: '#4DCB64' },
                { h: 104, c: '#FB9B3B' },
                { h: 84, c: '#FB9B3B' },
                { h: 124, c: '#FB9B3B' }
            ],
            groups: [
                {
                    label: 'JANUARI',
                    highlight: false,
                    items: [
                        { tag: '#surabaya', count: '420 posts', line: true, primary: false },
                        { tag: '#kuliner', count: '315 posts', line: false, primary: false }
                    ]
                },
                {
                    label: 'FEBRUARI',
                    highlight: false,
                    items: [
                        { tag: '#eventsurabaya', count: '580 posts', line: true, primary: false },
                        { tag: '#sungaisurabaya', count: '510 posts', line: true, primary: false }
                    ]
                },
                {
                    label: 'MARET',
                    highlight: true,
                    items: [
                        { tag: '#pencemaran', count: '720 posts', line: false, primary: true },
                        { tag: '#sungaisurabaya', count: '440 posts', line: true, primary: false }
                    ]
                }
            ],
            sideTitle: 'Visual Keyword Cloud',
            sideType: 'cloud',
            words: [
                { text: '#sungaisurabaya', cls: 'text-[32px] xl:text-[36px] font-extrabold text-[#083B6E] tracking-[-0.04em]' },
                { text: 'sampah', cls: 'text-[#8B4E0E] text-[24px] font-extrabold' },
                { text: 'limbah', cls: 'text-[#375A31] text-[24px] font-extrabold' },
                { text: 'mikroplastik', cls: 'text-[#2E7D32] text-[18px] font-extrabold' },
                { text: 'pencemaran', cls: 'text-[#083B6E] text-[18px] font-semibold' },
                { text: 'plastik', cls: 'text-[#8B4E0E] text-[18px] font-semibold' },
                { text: 'banjir', cls: 'text-[#9F2D20] text-[16px] font-semibold' },
                { text: 'EcotonID', cls: 'text-[#355C2D] text-[20px] font-semibold' }
            ]
        },
        tagcloud: {
            visualType: 'image',
            image: '{{ asset('storage/tagcloud.png') }}',
            groups: [
                {
                    label: 'JANUARI',
                    highlight: false,
                    items: [
                        { tag: '#surabaya', count: '420 posts', line: true, primary: false },
                        { tag: '#kuliner', count: '315 posts', line: false, primary: false }
                    ]
                },
                {
                    label: 'FEBRUARI',
                    highlight: false,
                    items: [
                        { tag: '#eventsurabaya', count: '580 posts', line: true, primary: false },
                        { tag: '#sungaisurabaya', count: '510 posts', line: true, primary: false }
                    ]
                },
                {
                    label: 'MARET',
                    highlight: true,
                    items: [
                        { tag: '#limbahplastik', count: '720 posts', line: false, primary: true },
                        { tag: '#pencemaran', count: '440 posts', line: true, primary: false }
                    ]
                }
            ],
            sideTitle: 'Visual Keyword Cloud',
            sideType: 'cloud',
            words: [
                { text: '#sungaisurabaya', cls: 'text-[32px] xl:text-[36px] font-extrabold text-[#083B6E] tracking-[-0.04em]' },
                { text: 'sampah', cls: 'text-[#8B4E0E] text-[24px] font-extrabold' },
                { text: 'limbah', cls: 'text-[#375A31] text-[24px] font-extrabold' },
                { text: 'mikroplastik', cls: 'text-[#2E7D32] text-[18px] font-extrabold' },
                { text: 'pencemaran', cls: 'text-[#083B6E] text-[18px] font-semibold' },
                { text: 'plastik', cls: 'text-[#8B4E0E] text-[18px] font-semibold' },
                { text: 'banjir', cls: 'text-[#9F2D20] text-[16px] font-semibold' },
                { text: 'EcotonID', cls: 'text-[#355C2D] text-[20px] font-semibold' }
            ]
        },
        ranking: {
            visualType: 'table',
            rows: [
                { rank: '1', tag: '#limbahplastik', posts: '720', growth: '+129%', color: '#204E7B' },
                { rank: '2', tag: '#eventsurabaya', posts: '580', growth: '+96%', color: '#4F7E49' },
                { rank: '3', tag: '#sungaisurabaya', posts: '510', growth: '+65%', color: '#3870A2' },
                { rank: '4', tag: '#pencemaran', posts: '440', growth: '+40%', color: '#E79D2B' },
                { rank: '5', tag: '#surabaya', posts: '420', growth: '+31%', color: '#A8B67F' },
                { rank: '6', tag: '#kuliner', posts: '315', growth: '+11%', color: '#B8C37A' }
            ],
            groups: [
                {
                    label: 'JANUARI',
                    highlight: false,
                    items: [
                        { tag: '#surabaya', count: '420 posts', line: true, primary: false },
                        { tag: '#kuliner', count: '315 posts', line: false, primary: false }
                    ]
                },
                {
                    label: 'FEBRUARI',
                    highlight: false,
                    items: [
                        { tag: '#eventsurabaya', count: '580 posts', line: true, primary: false },
                        { tag: '#sungaisurabaya', count: '510 posts', line: true, primary: false }
                    ]
                },
                {
                    label: 'MARET',
                    highlight: true,
                    items: [
                        { tag: '#limbahplastik', count: '720 posts', line: false, primary: true },
                        { tag: '#pencemaran', count: '440 posts', line: true, primary: false }
                    ]
                }
            ],
            sideTitle: 'Visual Keyword Cloud',
            sideType: 'cloud',
            words: [
                { text: '#sungaisurabaya', cls: 'text-[32px] xl:text-[36px] font-extrabold text-[#083B6E] tracking-[-0.04em]' },
                { text: 'sampah', cls: 'text-[#8B4E0E] text-[24px] font-extrabold' },
                { text: 'limbah', cls: 'text-[#375A31] text-[24px] font-extrabold' },
                { text: 'mikroplastik', cls: 'text-[#2E7D32] text-[18px] font-extrabold' },
                { text: 'pencemaran', cls: 'text-[#083B6E] text-[18px] font-semibold' },
                { text: 'plastik', cls: 'text-[#8B4E0E] text-[18px] font-semibold' },
                { text: 'banjir', cls: 'text-[#9F2D20] text-[16px] font-semibold' },
                { text: 'EcotonID', cls: 'text-[#355C2D] text-[20px] font-semibold' }
            ]
        }
    }
};

const mainVisualPanel = document.getElementById('main-visual-panel');
const miniCardsPanel = document.getElementById('mini-cards-panel');
const sideTitle = document.getElementById('side-title');
const sidePanel = document.getElementById('side-panel');
const tabs = document.querySelectorAll('.dashboard-tab');
const periodTabs = document.querySelectorAll('.period-tab');

function setActiveButtons() {
    tabs.forEach(btn => {
        if (btn.dataset.view === dashboardState.currentView) {
            btn.className = 'dashboard-tab h-[42px] px-6 rounded-full text-[15px] font-bold transition bg-[#063A67] text-white shadow-[0_8px_20px_rgba(6,58,103,0.18)]';
        } else {
            btn.className = 'dashboard-tab h-[42px] px-6 rounded-full text-[15px] font-bold transition text-[#083B6E] hover:bg-white';
        }
    });

    periodTabs.forEach(btn => {
        if (btn.dataset.period === dashboardState.currentPeriod) {
            btn.className = 'period-tab h-[32px] px-4 rounded-full text-[12px] font-bold transition bg-white text-slate-700 shadow';
        } else {
            btn.className = 'period-tab h-[32px] px-4 rounded-full text-[12px] font-bold transition text-slate-500';
        }
    });
}

function renderBars(data) {
    return `
        <div class="h-[205px] flex items-end gap-0">
            ${data.bars.map(bar => `
                <div class="w-full rounded-t-[10px] sm:rounded-t-[12px] transition-all duration-300 hover:opacity-90" style="height:${bar.h}px;background:${bar.c}"></div>
            `).join('')}
        </div>
        <div class="absolute inset-0 flex items-center justify-center text-[#4A6E90] text-[18px] sm:text-[22px] font-bold opacity-[.45] pointer-events-none tracking-[-0.03em]">
            ${data.overlayText}
        </div>
    `;
}

function renderImage(data) {
    return `
        <div class="h-[205px] rounded-[16px] overflow-hidden bg-white">
            <img src="${data.image}" alt="Tag cloud" class="w-full h-full object-cover">
        </div>
    `;
}

function renderTable(data) {
    return `
        <div class="h-[205px] overflow-x-auto rounded-[16px] bg-white border border-slate-100">
            <table class="w-full min-w-[620px] text-left">
                <thead>
                    <tr class="text-[11px] uppercase text-slate-400 border-b border-slate-100">
                        <th class="px-4 py-3 font-extrabold">Rank</th>
                        <th class="px-4 py-3 font-extrabold">Hashtag</th>
                        <th class="px-4 py-3 font-extrabold">Posts</th>
                        <th class="px-4 py-3 font-extrabold">1 Week Growth</th>
                    </tr>
                </thead>
                <tbody>
                    ${data.rows.map((row, index) => `
                        <tr class="${index % 2 === 0 ? 'bg-[#FBFBFC]' : 'bg-white'} border-b border-slate-100">
                            <td class="px-4 py-3">
                                <span class="w-[30px] h-[30px] rounded-[6px] inline-flex items-center justify-center text-white font-extrabold text-[18px]" style="background:${row.color}">
                                    ${row.rank}
                                </span>
                            </td>
                            <td class="px-4 py-3 font-bold text-[#083B6E]">${row.tag}</td>
                            <td class="px-4 py-3 text-slate-700">${row.posts}</td>
                            <td class="px-4 py-3 text-[#2E7D32] font-bold">${row.growth}</td>
                        </tr>
                    `).join('')}
                </tbody>
            </table>
        </div>
    `;
}

function renderMiniGroups(groups) {
    miniCardsPanel.innerHTML = groups.map(group => `
        <div>
            <div class="text-[11px] uppercase tracking-[.16em] font-extrabold mb-3 ${group.highlight ? 'text-[#2E7D32]' : 'text-slate-300'}">
                ${group.label}
            </div>

            <div class="space-y-3">
                ${group.items.map(item => `
                    <div class="relative rounded-[15px] px-4 py-4 min-h-[56px] transition duration-200 hover:-translate-y-[2px] 
                        ${item.primary ? 'bg-[#063A67] text-white shadow-[0_10px_18px_rgba(6,58,103,0.12)]' : 'bg-white text-[#083B6E] border border-slate-200'}">
                        
                        ${item.line ? `<div class="absolute left-0 top-[9px] bottom-[9px] w-[3px] bg-[#2E9F43] rounded-full"></div>` : ''}

                        <div class="font-extrabold text-[14px] leading-none break-words">${item.tag}</div>
                        <div class="text-[12px] mt-2 ${item.primary ? 'text-slate-300' : 'text-slate-400'}">${item.count}</div>
                    </div>
                `).join('')}
            </div>
        </div>
    `).join('');
}

function renderCloud(words) {
    const line1 = words[0] ? `<div class="${words[0].cls}">${words[0].text}</div>` : '';
    const line2 = words[1] || words[2] ? `
        <div class="flex flex-wrap justify-center items-end gap-4">
            ${words[1] ? `<span class="${words[1].cls}">${words[1].text}</span>` : ''}
            ${words[2] ? `<span class="${words[2].cls}">${words[2].text}</span>` : ''}
        </div>` : '';
    const line3 = words[3] || words[4] || words[5] ? `
        <div class="flex flex-wrap justify-center items-end gap-4">
            ${words[3] ? `<span class="${words[3].cls}">${words[3].text}</span>` : ''}
            ${words[4] ? `<span class="${words[4].cls}">${words[4].text}</span>` : ''}
            ${words[5] ? `<span class="${words[5].cls}">${words[5].text}</span>` : ''}
        </div>` : '';
    const line4 = words[6] || words[7] || words[8] ? `
        <div class="flex flex-wrap justify-center items-end gap-4">
            ${words[6] ? `<span class="${words[6].cls}">${words[6].text}</span>` : ''}
            ${words[7] ? `<span class="${words[7].cls}">${words[7].text}</span>` : ''}
            ${words[8] ? `<span class="${words[8].cls}">${words[8].text}</span>` : ''}
        </div>` : '';

    return `
        <div class="w-full h-full flex items-center justify-center">
            <div class="flex flex-col items-center justify-center text-center gap-6">
                ${line1}
                ${line2}
                ${line3}
                ${line4}
            </div>
        </div>
    `;
}

function renderDashboard() {
    const data = dashboardData[dashboardState.currentPeriod][dashboardState.currentView];

    mainVisualPanel.classList.remove('fade-in-panel');
    sidePanel.classList.remove('fade-in-panel');
    void mainVisualPanel.offsetWidth;
    void sidePanel.offsetWidth;
    mainVisualPanel.classList.add('fade-in-panel');
    sidePanel.classList.add('fade-in-panel');

    if (data.visualType === 'bars') {
        mainVisualPanel.innerHTML = renderBars(data);
    } else if (data.visualType === 'image') {
        mainVisualPanel.innerHTML = renderImage(data);
    } else if (data.visualType === 'table') {
        mainVisualPanel.innerHTML = renderTable(data);
    }

    renderMiniGroups(data.groups);
    sideTitle.textContent = data.sideTitle;
    sidePanel.innerHTML = renderCloud(data.words);
    setActiveButtons();
}

tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        dashboardState.currentView = tab.dataset.view;
        renderDashboard();
    });
});

periodTabs.forEach(tab => {
    tab.addEventListener('click', () => {
        dashboardState.currentPeriod = tab.dataset.period;
        renderDashboard();
    });
});

renderDashboard();
</script>
@endpush