@extends('layouts.admin')

@section('title','Input Data Konten')
@section('header_title','Input Data Konten')

@section('content')

<section class="mb-10">
    <div class="flex flex-col xl:flex-row xl:items-end xl:justify-between gap-5">
        <div>
            <div class="text-[18px] uppercase tracking-[.16em] font-extrabold text-[#2E7D32] mb-4">
                CONTENT ENTRY
            </div>

            <h2 class="text-[58px] leading-[1.04] font-extrabold text-[#083B6E] tracking-[-0.05em] mb-3">
                Tambah Data Konten
            </h2>

            <p class="text-[18px] text-slate-600 max-w-[700px]">
                Input data posting Instagram secara manual untuk analisis hashtag, keyword, dan engagement.
            </p>
        </div>

        <div class="inline-flex items-center gap-3 h-[54px] px-6 rounded-full bg-white shadow-[0_2px_10px_rgba(15,23,42,.035)]">
            <img src="{{ asset('storage/live.png') }}" alt="Info" class="w-4 h-4 object-contain">
            <span class="text-[16px] font-bold text-[#083B6E]">Mode Input Manual</span>
        </div>
    </div>
</section>

<section class="grid grid-cols-1 xl:grid-cols-[1.6fr_.7fr] gap-6 items-start">
    <div class="admin-card p-8 xl:p-10">
        <form class="space-y-7">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[14px] font-extrabold uppercase tracking-[.06em] text-[#083B6E] mb-3">
                        Akun Sumber
                    </label>
                    <select class="w-full h-[56px] rounded-[16px] bg-[#F4F6F8] px-5 outline-none border border-transparent focus:border-[#B8D4EA] text-[16px] text-slate-700">
                        <option>Peduli Sungai Surabaya</option>
                        <option>Ecoton</option>
                    </select>
                </div>

                <div>
                    <label class="block text-[14px] font-extrabold uppercase tracking-[.06em] text-[#083B6E] mb-3">
                        Tanggal Posting
                    </label>
                    <input type="date" class="w-full h-[56px] rounded-[16px] bg-[#F4F6F8] px-5 outline-none border border-transparent focus:border-[#B8D4EA] text-[16px] text-slate-700">
                </div>
            </div>

            <div>
                <label class="block text-[14px] font-extrabold uppercase tracking-[.06em] text-[#083B6E] mb-3">
                    Caption
                </label>
                <textarea rows="7" placeholder="Masukkan caption postingan..."
                          class="w-full rounded-[20px] bg-[#F4F6F8] px-5 py-4 outline-none border border-transparent focus:border-[#B8D4EA] text-[16px] text-slate-700 placeholder:text-slate-400 resize-none"></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[14px] font-extrabold uppercase tracking-[.06em] text-[#083B6E] mb-3">
                        Hashtag
                    </label>
                    <input type="text" placeholder="#sungaisurabaya, #plastik"
                           class="w-full h-[56px] rounded-[16px] bg-[#F4F6F8] px-5 outline-none border border-transparent focus:border-[#B8D4EA] text-[16px] text-slate-700 placeholder:text-slate-400">
                </div>

                <div>
                    <label class="block text-[14px] font-extrabold uppercase tracking-[.06em] text-[#083B6E] mb-3">
                        Keyword Dominan
                    </label>
                    <input type="text" placeholder="sampah, limbah, pencemaran"
                           class="w-full h-[56px] rounded-[16px] bg-[#F4F6F8] px-5 outline-none border border-transparent focus:border-[#B8D4EA] text-[16px] text-slate-700 placeholder:text-slate-400">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[14px] font-extrabold uppercase tracking-[.06em] text-[#083B6E] mb-3">
                        Jumlah Like
                    </label>
                    <input type="number" placeholder="0"
                           class="w-full h-[56px] rounded-[16px] bg-[#F4F6F8] px-5 outline-none border border-transparent focus:border-[#B8D4EA] text-[16px] text-slate-700">
                </div>

                <div>
                    <label class="block text-[14px] font-extrabold uppercase tracking-[.06em] text-[#083B6E] mb-3">
                        Jumlah Komentar
                    </label>
                    <input type="number" placeholder="0"
                           class="w-full h-[56px] rounded-[16px] bg-[#F4F6F8] px-5 outline-none border border-transparent focus:border-[#B8D4EA] text-[16px] text-slate-700">
                </div>
            </div>

            <div>
                <label class="block text-[14px] font-extrabold uppercase tracking-[.06em] text-[#083B6E] mb-3">
                    Link Postingan
                </label>
                <input type="url" placeholder="https://instagram.com/..."
                       class="w-full h-[56px] rounded-[16px] bg-[#F4F6F8] px-5 outline-none border border-transparent focus:border-[#B8D4EA] text-[16px] text-slate-700 placeholder:text-slate-400">
            </div>

            <div class="pt-3 flex flex-wrap gap-4">
                <button type="submit"
                        class="h-[56px] px-8 rounded-full bg-[#063A67] text-white text-[16px] font-extrabold shadow-[0_12px_24px_rgba(6,58,103,0.18)] hover:opacity-95 transition">
                    Simpan Data
                </button>

                <button type="reset"
                        class="h-[56px] px-8 rounded-full bg-white border border-slate-200 text-[#083B6E] text-[16px] font-extrabold hover:bg-slate-50 transition">
                    Reset Form
                </button>
            </div>
        </form>
    </div>

    <div class="space-y-6">
        <div class="admin-card p-8">
            <h3 class="text-[28px] font-extrabold text-[#083B6E] tracking-[-0.03em] mb-6">
                Panduan Input
            </h3>

            <div class="space-y-5">
                <div class="flex items-start gap-4">
                    <img src="{{ asset('storage/acc.png') }}" alt="Step" class="w-5 h-5 object-contain mt-1">
                    <p class="text-[16px] leading-[1.8] text-slate-600">
                        Pastikan akun sumber sesuai dengan asal postingan.
                    </p>
                </div>

                <div class="flex items-start gap-4">
                    <img src="{{ asset('storage/acc.png') }}" alt="Step" class="w-5 h-5 object-contain mt-1">
                    <p class="text-[16px] leading-[1.8] text-slate-600">
                        Hashtag dapat diisi lebih dari satu dan dipisahkan dengan koma.
                    </p>
                </div>

                <div class="flex items-start gap-4">
                    <img src="{{ asset('storage/acc.png') }}" alt="Step" class="w-5 h-5 object-contain mt-1">
                    <p class="text-[16px] leading-[1.8] text-slate-600">
                        Keyword dominan disarankan berupa kata penting dari caption.
                    </p>
                </div>
            </div>
        </div>

        <div class="rounded-[28px] bg-[#063A67] p-8 text-white">
            <div class="text-[14px] uppercase tracking-[.14em] font-extrabold text-[#7FA8CE] mb-5">
                STATUS FORM
            </div>

            <div class="text-[32px] leading-[1.2] font-extrabold tracking-[-0.03em] mb-4">
                Siap Input Data
            </div>

            <p class="text-[16px] leading-[1.8] text-slate-200">
                Gunakan form ini untuk menambahkan dataset baru secara manual ke sistem SuraTrend.
            </p>
        </div>
    </div>
</section>

@endsection