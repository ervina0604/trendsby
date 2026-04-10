<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - SuraTrend</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body{
            font-family:'Manrope',sans-serif;
            background:#EEF1F3;
        }
    </style>
</head>
<body class="min-h-screen text-slate-800">

    <div class="min-h-screen flex flex-col">
        <main class="flex-1 flex items-center justify-center px-6 py-12">
            <div class="w-full max-w-[460px]">
                
                <div class="text-center mb-10">
                    <div class="flex justify-center mb-6">
                        <img src="{{ asset('storage/logo.png') }}" alt="Logo SuraTrend" class="w-[96px] h-[96px] object-contain">
                    </div>

                    <h1 class="text-[32px] font-extrabold text-[#083B6E] tracking-[-0.03em] mb-2">
                        SuraTrend Admin
                    </h1>

                    <p class="text-[16px] text-slate-600">
                        Environmental Data Intelligence
                    </p>
                </div>

                <div class="bg-white rounded-[30px] shadow-[0_10px_24px_rgba(15,23,42,0.08)] px-10 py-10">
                    <form action="#" method="POST" class="space-y-7">
                        @csrf

                        <div>
                            <label class="block text-[14px] font-extrabold text-[#083B6E] uppercase tracking-[.03em] mb-3">
                                Username
                            </label>

                            <div class="h-[58px] rounded-[12px] bg-[#F1F3F5] px-5 flex items-center gap-4 border border-transparent focus-within:border-[#B8D4EA] focus-within:bg-white transition">
                                <img src="{{ asset('storage/username.png') }}" alt="Username" class="w-5 h-5 object-contain opacity-70">
                                <input
                                    type="text"
                                    name="username"
                                    placeholder="Enter admin username"
                                    class="w-full bg-transparent outline-none text-[16px] text-slate-700 placeholder:text-slate-400"
                                >
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <label class="block text-[14px] font-extrabold text-[#083B6E] uppercase tracking-[.03em]">
                                    Password
                                </label>

                                <a href="#" class="text-[14px] font-semibold text-[#2E9F43] hover:underline">
                                    Lupa Password?
                                </a>
                            </div>

                            <div class="h-[58px] rounded-[12px] bg-[#F1F3F5] px-5 flex items-center gap-4 border border-transparent focus-within:border-[#B8D4EA] focus-within:bg-white transition">
                                <img src="{{ asset('storage/password.png') }}" alt="Password" class="w-5 h-5 object-contain opacity-70">
                                <input
                                    type="password"
                                    name="password"
                                    placeholder="••••••••"
                                    class="w-full bg-transparent outline-none text-[16px] text-slate-700 placeholder:text-slate-400"
                                >
                            </div>
                        </div>

                        <div class="pt-2">
                            <button
                                type="submit"
                                class="w-full h-[58px] rounded-full bg-[#063A67] text-white text-[18px] font-extrabold shadow-[0_12px_24px_rgba(6,58,103,0.18)] hover:opacity-95 transition"
                            >
                                Masuk ke Dashboard
                            </button>
                        </div>
                    </form>

                    <div class="mt-10 pt-8 border-t border-slate-200">
                        <div class="flex items-start gap-4">
                            <div class="w-[44px] h-[44px] rounded-[12px] bg-[#F4D8C1] flex items-center justify-center shrink-0">
                                <img src="{{ asset('storage/secure.png') }}" alt="Secure Access" class="w-5 h-5 object-contain">
                            </div>

                            <div>
                                <h2 class="text-[20px] font-extrabold text-[#083B6E] tracking-[-0.02em] mb-2">
                                    Secure Access
                                </h2>

                                <p class="text-[15px] leading-[1.8] text-slate-500">
                                    Terminal ini dibatasi hanya untuk analis lingkungan SuraTrend yang berwenang.
                                    Akses tanpa izin akan tercatat oleh sistem.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="pb-10 text-center px-6">
            <p class="text-[13px] uppercase text-slate-500 tracking-[.01em]">
                © 2026 Suratrend Environmental Analytics. All Rights Reserved.
            </p>
        </footer>
    </div>

</body>
</html>