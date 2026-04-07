@extends('layouts.app')

@section('title','Terms and Conditions')

@section('content')

<!-- HERO FULL BACKGROUND -->
<section class="relative w-full min-h-[700px] rounded-[28px] overflow-hidden mb-16">

    <!-- BACKGROUND IMAGE -->
    <img src="{{ asset('storage/hero.png') }}"
         class="absolute inset-0 w-full h-full object-cover">

    <!-- OVERLAY -->
    <div class="absolute inset-0 bg-black/40"></div>

    <!-- CONTENT -->
    <div class="relative z-10 p-8 flex flex-col lg:flex-row gap-6 items-end h-full">

        <!-- LEFT CARD -->
        <div class="bg-[#F4D7C1] text-[#5A3A1A] p-6 rounded-2xl max-w-sm shadow-md">
            <h3 class="font-bold text-lg mb-3">
                Disclaimer
            </h3>

            <p class="text-sm leading-6 mb-3">
                All data and analysis results are provided "as is" without warranty of any kind.
            </p>

            <p class="text-sm leading-6">
                SuraTrend is not responsible for any inaccuracies or misuse of the data.
            </p>
        </div>

        <!-- RIGHT CARD -->
        <div class="bg-white p-6 rounded-2xl max-w-md shadow-md">

            <div class="flex items-center gap-2 mb-3">
                <span class="bg-green-100 text-green-600 px-2 py-1 rounded-lg text-sm">🔒</span>
                <h3 class="font-bold text-gray-800">
                    Privacy Policy
                </h3>
            </div>

            <ul class="text-sm text-gray-600 space-y-2 leading-6">
                <li class="flex gap-2">
                    <span class="text-green-500">•</span>
                    SuraTrend does not collect sensitive personal data from public users.
                </li>
                <li class="flex gap-2">
                    <span class="text-green-500">•</span>
                    Basic usage data may be collected to improve system performance.
                </li>
                <li class="flex gap-2">
                    <span class="text-green-500">•</span>
                    All analytics are derived from publicly available social media content.
                </li>
            </ul>

        </div>

    </div>

</section>


<!-- CONTENT TEXT -->
<section class="mb-16">

    <h2 class="text-[32px] font-extrabold text-[#083B6E] mb-6">
        Terms & Conditions
    </h2>

    <div class="space-y-6 text-gray-600 leading-8 max-w-3xl">

        <p>
            By accessing and using SuraTrend, you agree to comply with and be bound by the following terms and conditions. This platform is designed for environmental data analysis and public awareness.
        </p>

        <p>
            The data presented is collected from publicly available social media sources and processed using analytical models. While we strive for accuracy, we do not guarantee completeness or reliability.
        </p>

        <p>
            Users are responsible for how they interpret and use the data. SuraTrend shall not be held liable for any decisions made based on the provided insights.
        </p>

    </div>

</section>


<!-- GRAPH SECTION -->
<section class="bg-white rounded-[28px] p-8 shadow-sm border border-gray-100 text-center">

    <h3 class="text-[24px] font-bold text-[#083B6E] mb-6">
        Data Transparency Overview
    </h3>

    <img src="{{ asset('storage/grafik.png') }}"
         alt="Grafik Analisis"
         class="mx-auto rounded-xl shadow-md">

</section>

@endsection