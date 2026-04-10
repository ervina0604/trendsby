@extends('layouts.admin')

@section('title','Dashboard Admin')

@section('content')

@php
    $summaryCards = [
        [
            'title' => 'TOTAL POSTINGAN',
            'value' => '245',
            'note'  => '+12%',
            'note_color' => 'text-[#2E7D32]',
            'top_line' => 'bg-[#0B5B94]',
            'icon' => 'postingan.png',
            'icon_opacity' => 'opacity-10'
        ],
        [
            'title' => 'TOTAL HASHTAG',
            'value' => '89',
            'note'  => 'Stable',
            'note_color' => 'text-[#2E7D32]',
            'top_line' => 'bg-[#7EDC8A]',
            'icon' => 'tag.png',
            'icon_opacity' => 'opacity-10'
        ],
        [
            'title' => 'TOTAL KEYWORD',
            'value' => '143',
            'note'  => '+5',
            'note_color' => 'text-[#8B5A2B]',
            'top_line' => 'bg-[#E6C8A8]',
            'icon' => 'keyword_.png',
            'icon_opacity' => 'opacity-10'
        ],
    ];

    $topHashtags = [
        ['label' => '#sungaisurabaya', 'value' => 420, 'width' => '100%'],
        ['label' => '#pedulisungai', 'value' => 380, 'width' => '90%'],
        ['label' => '#ecoton', 'value' => 310, 'width' => '74%'],
        ['label' => '#aksibersih', 'value' => 290, 'width' => '69%'],
        ['label' => '#lingkungan', 'value' => 250, 'width' => '60%'],
    ];
@endphp

<section class="mb-8">
    <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-5">
        <div>
            <div class="text-[18px] uppercase tracking-[.16em] font-extrabold text-[#2E7D32] mb-4">
                MARCH 2026 OVERVIEW
            </div>

            <h2 class="text-[64px] leading-[1.02] font-extrabold text-[#083B6E] tracking-[-0.05em]">
                Dashboard Ringkasan
            </h2>
        </div>

        <div class="inline-flex items-center gap-3 h-[54px] px-6 rounded-full bg-white shadow-[0_2px_10px_rgba(15,23,42,.035)]">
            <img src="{{ asset('storage/calender.png') }}" alt="Last Update" class="w-5 h-5 object-contain">
            <span class="text-[16px] font-bold text-[#083B6E]">Last Update: 12 Maret 2026</span>
        </div>
    </div>
</section>

<section class="grid grid-cols-1 xl:grid-cols-[1fr_1fr_1fr_.95fr] gap-6 mb-8">
    @foreach($summaryCards as $card)
        <div class="admin-card min-h-[220px] overflow-hidden relative">
            <div class="h-[4px] w-full {{ $card['top_line'] }}"></div>

            <div class="p-8 h-full relative">
                <div class="text-[14px] uppercase tracking-[.14em] font-extrabold text-[#7C8AA0] mb-8">
                    {{ $card['title'] }}
                </div>

                <div class="flex items-end gap-3">
                    <div class="text-[62px] leading-none font-extrabold text-[#083B6E] tracking-[-0.05em]">
                        {{ $card['value'] }}
                    </div>
                    <div class="text-[20px] font-extrabold {{ $card['note_color'] }} pb-2">
                        {{ $card['note'] }}
                    </div>
                </div>

                <img src="{{ asset('storage/' . $card['icon']) }}"
                     alt="{{ $card['title'] }}"
                     class="absolute right-7 bottom-6 w-[46px] h-[46px] object-contain {{ $card['icon_opacity'] }}">
            </div>
        </div>
    @endforeach

    <div class="rounded-[28px] bg-[#063A67] p-8 text-white min-h-[220px] flex flex-col justify-between">
        <div>
            <div class="text-[14px] uppercase tracking-[.16em] font-extrabold text-[#7FA8CE] mb-5">
                ENGAGEMENT TERTINGGI
            </div>

            <div class="text-[68px] leading-none font-extrabold tracking-[-0.05em]">
                8.4%
            </div>
        </div>

        <div>
            <div class="w-full h-[6px] bg-[#174E7A] rounded-full overflow-hidden">
                <div class="w-[68%] h-full bg-[#2E9F43] rounded-full"></div>
            </div>
        </div>
    </div>
</section>

<section class="grid grid-cols-1 xl:grid-cols-[1.65fr_.75fr] gap-6 mb-8 items-stretch">
    <div class="admin-card p-8 min-h-[540px]">
        <div class="flex items-start justify-between gap-4 mb-6">
            <div>
                <h3 id="chart-title" class="text-[42px] leading-none font-extrabold text-[#083B6E] tracking-[-0.04em] mb-3">
                    Trend Posting Mingguan
                </h3>
                <p class="text-[18px] text-[#7C8AA0] max-w-[500px]">
                    Visualisasi aktivitas konten lingkungan di Surabaya
                </p>
            </div>

            <div class="bg-[#F4F6F8] rounded-full p-[4px] inline-flex gap-[4px]">
                <button type="button"
                        class="chart-period-btn h-[38px] px-5 rounded-full text-[12px] font-extrabold transition"
                        data-mode="weekly">
                    WEEKLY
                </button>
                <button type="button"
                        class="chart-period-btn h-[38px] px-5 rounded-full text-[12px] font-extrabold transition"
                        data-mode="monthly">
                    MONTHLY
                </button>
            </div>
        </div>

        <div id="chart-container" class="h-[380px] flex items-end gap-3 pt-6">
        </div>

        <div id="chart-labels" class="grid grid-cols-7 gap-3 mt-5">
        </div>
    </div>

    <div class="space-y-6">
        <div class="admin-card p-8 min-h-[540px]">
            <h3 class="text-[40px] leading-none font-extrabold text-[#083B6E] tracking-[-0.04em] mb-3">
                Top 5 Hashtags
            </h3>
            <p class="text-[18px] text-[#7C8AA0] mb-10">
                Dominasi diskusi lingkungan
            </p>

            <div class="space-y-8">
                @foreach($topHashtags as $item)
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-[18px] font-extrabold text-[#083B6E]">{{ $item['label'] }}</span>
                            <span class="text-[18px] font-bold text-[#7C8AA0]">{{ $item['value'] }}</span>
                        </div>

                        <div class="w-full h-[10px] bg-[#E7ECF1] rounded-full overflow-hidden">
                            <div class="h-full bg-[#2E7D32] rounded-full" style="width: {{ $item['width'] }}"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="grid grid-cols-1 xl:grid-cols-[1.55fr_.45fr] gap-6 items-stretch">
    <div class="admin-card p-10 min-h-[520px] relative overflow-hidden">
        <h3 class="text-[42px] leading-none font-extrabold text-[#083B6E] tracking-[-0.04em] mb-10">
            Top Keywords Frequency
        </h3>

        <div class="min-h-[340px] flex items-center justify-center">
            <div class="flex flex-col items-center gap-10 text-center">
                <div class="flex flex-wrap justify-center items-end gap-8">
                    <span class="text-[84px] font-extrabold text-[#083B6E] tracking-[-0.05em]">sampah</span>
                    <span class="text-[50px] font-extrabold text-[#2E7D32]">plastik</span>
                </div>

                <div class="flex flex-wrap justify-center items-end gap-8">
                    <span class="text-[70px] font-extrabold text-[#3F7AA7] tracking-[-0.04em]">pencemaran</span>
                    <span class="text-[44px] font-extrabold text-[#6B3F11]">banjir</span>
                    <span class="text-[52px] font-extrabold text-[#8AE77C]">limbah</span>
                </div>

                <div class="flex flex-wrap justify-center items-end gap-10">
                    <span class="text-[26px] text-[#8A9AB3]">ekosistem</span>
                    <span class="text-[26px] text-[#8A9AB3]">sungai</span>
                    <span class="text-[26px] text-[#8A9AB3]">audit</span>
                </div>
            </div>
        </div>

        <img src="{{ asset('storage/archive.png') }}" alt="Archive" class="absolute right-6 bottom-6 w-[84px] opacity-[.10] object-contain">
    </div>

    <div class="space-y-6">
        <div class="rounded-[28px] bg-[#063A67] p-8 min-h-[240px] text-white">
            <div class="text-[12px] uppercase tracking-[.16em] font-extrabold text-[#7FA8CE] mb-6">
                AKUN TERAKTIF
            </div>

            <div class="text-[34px] leading-[1.2] font-extrabold tracking-[-0.03em] mb-6">
                Peduli Sungai<br>Surabaya
            </div>

            <div class="flex items-center gap-3">
                <img src="{{ asset('storage/environmental.png') }}" alt="Environmental Leader" class="w-5 h-5 object-contain">
                <span class="text-[16px] text-slate-200">Environmental Leader</span>
            </div>
        </div>

        <div class="admin-card p-8 min-h-[240px]">
            <div class="text-[12px] uppercase tracking-[.16em] font-extrabold text-[#7C8AA0] mb-5">
                UPDATE TERAKHIR
            </div>
            <div class="text-[30px] leading-none font-extrabold text-[#083B6E] tracking-[-0.03em] mb-8">
                12 Maret 2026
            </div>

            <div class="text-[12px] uppercase tracking-[.16em] font-extrabold text-[#7C8AA0] mb-5">
                TOTAL DATA TERINPUT
            </div>
            <div class="text-[30px] leading-none font-extrabold text-[#083B6E] tracking-[-0.03em]">
                1,245 Record
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    const chartState = {
        mode: 'weekly'
    };

    const chartData = {
        weekly: {
            title: 'Trend Posting Mingguan',
            labels: ['MON', 'TUE', 'WED', 'TODAY', 'FRI', 'SAT', 'SUN'],
            bars: [
                { value: 34, color: '#C6D6E3' },
                { value: 52, color: '#C6D6E3' },
                { value: 74, color: '#97B5CA' },
                { value: 88, color: '#A8C7A8' },
                { value: 60, color: '#C6D6E3' },
                { value: 44, color: '#C6D6E3' },
                { value: 26, color: '#C6D6E3' }
            ],
            labelHighlight: 'TODAY'
        },
        monthly: {
            title: 'Trend Posting Bulanan',
            labels: ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL', 'AGS', 'SEP', 'OKT', 'NOV', 'DES'],
            bars: [
                { value: 24, color: '#F4CFA7' },
                { value: 30, color: '#F4CFA7' },
                { value: 42, color: '#E6C29A' },
                { value: 58, color: '#B6CAD9' },
                { value: 76, color: '#8FB0C8' },
                { value: 92, color: '#A8C7A8' },
                { value: 62, color: '#B6CAD9' },
                { value: 48, color: '#C8D8E4' },
                { value: 34, color: '#D8E2EA' },
                { value: 44, color: '#B6CAD9' },
                { value: 52, color: '#8FB0C8' },
                { value: 64, color: '#A8C7A8' }
            ],
            labelHighlight: 'MEI'
        }
    };

    const chartContainer = document.getElementById('chart-container');
    const chartLabels = document.getElementById('chart-labels');
    const chartTitle = document.getElementById('chart-title');
    const periodButtons = document.querySelectorAll('.chart-period-btn');

    function renderChart() {
        const config = chartData[chartState.mode];
        chartTitle.textContent = config.title;

        chartContainer.className = chartState.mode === 'weekly'
            ? 'h-[380px] flex items-end gap-3 pt-6'
            : 'h-[380px] flex items-end gap-2 pt-6';

        chartContainer.innerHTML = config.bars.map((bar) => `
            <div class="flex-1 rounded-t-[18px] transition-all duration-300 hover:opacity-90"
                 style="height:${bar.value}%; background:${bar.color}; min-width:0;">
            </div>
        `).join('');

        chartLabels.className = chartState.mode === 'weekly'
            ? 'grid grid-cols-7 gap-3 mt-5'
            : 'grid grid-cols-12 gap-2 mt-5';

        chartLabels.innerHTML = config.labels.map(label => `
            <div class="text-center text-[12px] font-extrabold ${label === config.labelHighlight ? 'text-[#2E7D32]' : 'text-[#8A9AB3]'}">
                ${label}
            </div>
        `).join('');

        periodButtons.forEach(btn => {
            if (btn.dataset.mode === chartState.mode) {
                btn.className = 'chart-period-btn h-[38px] px-5 rounded-full text-[12px] font-extrabold transition bg-[#063A67] text-white shadow';
            } else {
                btn.className = 'chart-period-btn h-[38px] px-5 rounded-full text-[12px] font-extrabold transition text-[#8A9AB3]';
            }
        });
    }

    periodButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            chartState.mode = this.dataset.mode;
            renderChart();
        });
    });

    renderChart();
</script>
@endpush