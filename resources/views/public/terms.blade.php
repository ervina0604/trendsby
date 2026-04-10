@extends('layouts.app')

@section('title','Syarat dan Ketentuan')

@section('content')

<section class="mb-12">
    <div class="grid grid-cols-1 xl:grid-cols-[1fr_420px] gap-8 items-center">
        <div>
            <h1 class="text-[72px] leading-[1.02] font-extrabold text-[#083B6E] tracking-[-0.05em] mb-6">
                Syarat & Ketentuan
            </h1>

            <p class="text-[24px] leading-[1.65] text-slate-600 max-w-[760px]">
                Dengan mengakses dan menggunakan SuraTrend, pengguna dianggap telah
                memahami serta menyetujui ketentuan penggunaan sistem berikut ini.
            </p>
        </div>

        <div class="flex items-center justify-end gap-6">
            <div class="hidden xl:block w-[260px] h-[1px] bg-slate-200"></div>

            <div class="inline-flex items-center gap-2 h-[44px] px-5 rounded-full bg-[#97E082] text-[#255F4D] font-extrabold text-[15px] whitespace-nowrap">
                <img src="{{ asset('storage/privacy.png') }}" alt="Rilis terbaru" class="w-4 h-4 object-contain">
                Rilis Terbaru
            </div>
        </div>
    </div>
</section>

<section class="grid grid-cols-1 xl:grid-cols-[1.8fr_.85fr] gap-6 mb-8 items-start">
    <div class="glass-card p-0 overflow-hidden">
        <div class="h-[4px] w-full bg-[#083B6E]"></div>

        <div class="p-8 xl:p-10">
            <div class="flex items-center gap-5 mb-10">
                <div class="w-[58px] h-[58px] rounded-full bg-[#D9E9FB] flex items-center justify-center">
                    <img src="{{ asset('storage/terms.png') }}" alt="Terms of Use" class="w-6 h-6 object-contain">
                </div>

                <h2 class="text-[38px] font-extrabold text-[#083B6E] tracking-[-0.03em]">
                    Ketentuan Penggunaan
                </h2>
            </div>

            <div class="space-y-7">
                <div class="flex items-start gap-5">
                    <img src="{{ asset('storage/acc.png') }}" alt="Diizinkan" class="w-6 h-6 object-contain mt-1">
                    <p class="text-[18px] leading-[1.85] text-slate-600">
                        Data yang ditampilkan pada website ini ditujukan untuk kepentingan informasi dan edukasi.
                    </p>
                </div>

                <div class="flex items-start gap-5">
                    <img src="{{ asset('storage/acc.png') }}" alt="Diizinkan" class="w-6 h-6 object-contain mt-1">
                    <p class="text-[18px] leading-[1.85] text-slate-600">
                        Pengguna tidak diperkenankan menyalin, menggandakan, atau menyebarluaskan data secara massal dari website ini.
                    </p>
                </div>

                <div class="flex items-start gap-5">
                    <img src="{{ asset('storage/acc.png') }}" alt="Diizinkan" class="w-6 h-6 object-contain mt-1">
                    <p class="text-[18px] leading-[1.85] text-slate-600">
                        Pengguna publik diperbolehkan melihat dan menjadikan data sebagai referensi pribadi dengan penyebutan sumber yang wajar.
                    </p>
                </div>

                <div class="flex items-start gap-5">
                    <img src="{{ asset('storage/dont.png') }}" alt="Dilarang" class="w-6 h-6 object-contain mt-1">
                    <p class="text-[18px] leading-[1.85] text-slate-600">
                        Pengambilan data otomatis seperti scraping, crawling, maupun caching tanpa izin tidak diperbolehkan.
                    </p>
                </div>

                <div class="flex items-start gap-5">
                    <img src="{{ asset('storage/dont.png') }}" alt="Dilarang" class="w-6 h-6 object-contain mt-1">
                    <p class="text-[18px] leading-[1.85] text-slate-600">
                        Pengguna tidak diperkenankan menggunakan ulang atau menanamkan data SuraTrend ke dalam platform atau sistem lain tanpa izin.
                    </p>
                </div>

                <div class="flex items-start gap-5">
                    <img src="{{ asset('storage/system.png') }}" alt="Admin" class="w-6 h-6 object-contain mt-1">
                    <p class="text-[18px] leading-[1.85] text-slate-600">
                        Admin bertanggung jawab memastikan bahwa data yang diinput ke dalam sistem tetap relevan, akurat, dan sesuai konteks.
                    </p>
                </div>

                <div class="flex items-start gap-5">
                    <img src="{{ asset('storage/dont.png') }}" alt="Dilarang" class="w-6 h-6 object-contain mt-1">
                    <p class="text-[18px] leading-[1.85] text-slate-600">
                        Sistem ini tidak boleh digunakan untuk tujuan yang merugikan, melanggar hukum, atau bertentangan dengan etika.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="glass-card p-8 xl:p-9">
        <div class="flex items-center gap-4 mb-7">
            <div class="w-[52px] h-[52px] rounded-[14px] bg-[#EFF3F8] flex items-center justify-center">
                <img src="{{ asset('storage/system.png') }}" alt="Ruang lingkup" class="w-5 h-5 object-contain">
            </div>

            <h2 class="text-[28px] font-extrabold text-[#083B6E] tracking-[-0.03em]">
                Ruang Lingkup Sistem
            </h2>
        </div>

        <div class="text-[14px] uppercase tracking-[.14em] text-slate-400 font-extrabold mb-5">
            PEMBERITAHUAN
        </div>

        <div class="space-y-5 text-[18px] leading-[1.85] text-slate-600 mb-8">
            <p>
                SuraTrend tidak menggunakan integrasi API resmi Instagram.
                Seluruh data saat ini diinput secara manual oleh admin.
            </p>

            <p>
                Sistem ini berfokus pada <span class="text-[#2E7D32] font-extrabold">dokumentasi tren dan analisis</span>,
                bukan untuk prediksi atau otomatisasi keputusan.
            </p>
        </div>

        <div class="rounded-[14px] overflow-hidden">
            <img src="{{ asset('storage/grafik.png') }}" alt="Visual grafik" class="w-full h-[160px] object-cover">
        </div>
    </div>
</section>

<section class="grid grid-cols-1 xl:grid-cols-[.9fr_.9fr] gap-6 mb-10">
    <div class="rounded-[28px] bg-[#F4D2B7] p-8 xl:p-9 min-h-[330px]">
        <div class="flex items-center gap-4 mb-8">
            <div class="w-[52px] h-[52px] rounded-[14px] bg-[#6B3F11] flex items-center justify-center">
                <img src="{{ asset('storage/disclaimer.png') }}" alt="Disclaimer" class="w-6 h-6 object-contain brightness-0 invert">
            </div>

            <h2 class="text-[30px] font-extrabold text-[#4E2D18] tracking-[-0.03em]">
                Disclaimer
            </h2>
        </div>

        <div class="space-y-6 text-[18px] leading-[1.85] text-[#5B4233]">
            <p>
                Seluruh data dan hasil analisis disediakan “sebagaimana adanya” tanpa jaminan dalam bentuk apa pun.
            </p>

            <p>
                SuraTrend tidak bertanggung jawab atas ketidakakuratan data atau keputusan yang diambil berdasarkan data tersebut.
            </p>
        </div>

        <div class="mt-8 pt-6 border-t border-[#D9B89D] text-[17px] leading-[1.8] text-[#6B5648]">
            Sistem ini dirancang untuk mendukung proses analisis, bukan menggantikan penilaian profesional.
        </div>
    </div>

    <div class="glass-card p-8 xl:p-9 min-h-[330px]">
        <div class="flex items-center gap-4 mb-8">
            <div class="w-[52px] h-[52px] rounded-[14px] bg-[#97E082] flex items-center justify-center">
                <img src="{{ asset('storage/privacy.png') }}" alt="Privasi" class="w-6 h-6 object-contain">
            </div>

            <h2 class="text-[30px] font-extrabold text-[#2A2A2A] tracking-[-0.03em]">
                Kebijakan Privasi
            </h2>
        </div>

        <div class="space-y-6">
            <div class="flex items-start gap-4">
                <span class="w-2.5 h-2.5 rounded-full bg-[#2E7D32] mt-3 shrink-0"></span>
                <p class="text-[18px] leading-[1.8] text-slate-600">
                    SuraTrend tidak mengumpulkan data pribadi sensitif dari pengguna publik.
                </p>
            </div>

            <div class="flex items-start gap-4">
                <span class="w-2.5 h-2.5 rounded-full bg-[#2E7D32] mt-3 shrink-0"></span>
                <p class="text-[18px] leading-[1.8] text-slate-600">
                    Data penggunaan dasar dapat dicatat untuk membantu peningkatan performa sistem.
                </p>
            </div>

            <div class="flex items-start gap-4">
                <span class="w-2.5 h-2.5 rounded-full bg-[#2E7D32] mt-3 shrink-0"></span>
                <p class="text-[18px] leading-[1.8] text-slate-600">
                    Data login admin disimpan secara aman dan hanya digunakan untuk kebutuhan autentikasi.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection