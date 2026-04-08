@extends('layout.admin')

@section('title', 'Input Data Konten')

@section('content')

<div class="space-y-8">

    <!-- HEADER -->
    <div>
        <p class="text-xs font-bold text-green-600 uppercase tracking-widest mb-2">
            DATA ARCHIVE
        </p>

        <h1 class="text-3xl font-bold text-slate-800 mb-4">
            Input Data Konten
        </h1>

        <div class="bg-green-100 border-l-4 border-green-600 p-4 rounded-xl text-sm text-green-800">
            Gunakan form ini jika ada data yang belum masuk dari proses import otomatis.
        </div>
    </div>

    <!-- GRID -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- FORM -->
        <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm">

            <form action="{{ route('admin.content.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <!-- AKUN -->
                    <div>
                        <label class="text-xs font-semibold text-gray-500">Akun Instagram</label>
                        <select name="account_id" class="w-full mt-2 p-3 bg-gray-100 rounded-lg">
                            <option value="">Pilih Akun</option>
                            @foreach($accounts as $acc)
                                <option value="{{ $acc->id }}">
                                    {{ $acc->username }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- TANGGAL -->
                    <div>
                        <label class="text-xs font-semibold text-gray-500">Tanggal Posting</label>
                        <input type="date" name="tanggal"
                            class="w-full mt-2 p-3 bg-gray-100 rounded-lg"
                            value="{{ old('tanggal') }}">
                    </div>

                </div>

                <!-- CAPTION -->
                <div>
                    <label class="text-xs font-semibold text-gray-500">Caption</label>
                    <textarea name="caption" rows="5"
                        class="w-full mt-2 p-3 bg-gray-100 rounded-lg"
                        placeholder="Masukkan caption...">{{ old('caption') }}</textarea>
                </div>

                <!-- HASHTAG -->
                <div>
                    <label class="text-xs font-semibold text-gray-500">Hashtag</label>
                    <textarea name="hashtag" rows="3"
                        class="w-full mt-2 p-3 bg-gray-100 rounded-lg"
                        placeholder="#surabaya #lingkungan">{{ old('hashtag') }}</textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">

                    <!-- LIKE -->
                    <div>
                        <label class="text-xs font-semibold text-gray-500">Jumlah Like</label>
                        <input type="number" name="like"
                            class="w-full mt-2 p-3 bg-gray-100 rounded-lg"
                            value="{{ old('like', 0) }}">
                    </div>

                    <!-- COMMENT -->
                    <div>
                        <label class="text-xs font-semibold text-gray-500">Jumlah Comment</label>
                        <input type="number" name="comment"
                            class="w-full mt-2 p-3 bg-gray-100 rounded-lg"
                            value="{{ old('comment', 0) }}">
                    </div>

                </div>

                <!-- BUTTON -->
                <div class="flex justify-end gap-3 pt-4">
                    <button type="reset" class="px-6 py-2 text-gray-500">
                        Reset
                    </button>

                    <button type="submit"
                        class="bg-blue-800 text-white px-6 py-2 rounded-full shadow hover:scale-105 transition">
                        Simpan Data
                    </button>
                </div>

            </form>
        </div>

        <!-- SIDE PANEL -->
        <div class="space-y-4">

            <!-- INFO -->
            <div class="bg-blue-900 text-white p-6 rounded-2xl">
                <h3 class="font-semibold mb-3">Editorial Context</h3>
                <p class="text-sm opacity-80">
                    Data manual membantu analisis tren lingkungan di Surabaya.
                </p>
            </div>

            <!-- IMAGE -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm">
                <img src="https://images.unsplash.com/photo-1508780709619-79562169bc64"
                     class="w-full h-40 object-cover">

                <div class="p-4 text-sm">
                    <p class="font-semibold">Sungai Surabaya</p>
                    <div class="w-full bg-gray-200 h-1 mt-2 rounded">
                        <div class="bg-green-600 h-1 w-4/5 rounded"></div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection