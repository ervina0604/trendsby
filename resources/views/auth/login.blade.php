<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuraTrend | Admin Login</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Manrope', sans-serif; }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

<!-- MAIN -->
<main class="flex-grow flex items-center justify-center p-6 relative overflow-hidden">

    <!-- Background Blur -->
    <div class="absolute top-0 left-0 w-full h-full opacity-10">
        <div class="absolute -top-20 -left-20 w-96 h-96 bg-blue-500 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-80 h-80 bg-green-500 rounded-full blur-3xl"></div>
    </div>

    <div class="w-full max-w-md z-10">

        <!-- LOGO + TITLE -->
        <div class="text-center mb-8">
            <img src="{{ asset('storage/logo.png') }}" class="h-14 mx-auto mb-4" alt="Logo">
            <h1 class="text-3xl font-bold text-blue-900">
                Sura<span class="text-green-600">Trend</span> Admin
            </h1>
            <p class="text-gray-500 text-sm">Environmental Data Intelligence</p>
        </div>

        <!-- CARD -->
        <div class="bg-white rounded-2xl p-8 shadow-lg">

            <h2 class="text-xl font-semibold text-gray-800 mb-6">
                Welcome Back
            </h2>

            <!-- ERROR -->
            @if(session('error'))
                <div class="mb-4 bg-red-100 text-red-600 p-3 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <!-- FORM -->
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- USERNAME -->
                <div>
                    <label class="text-sm font-semibold text-gray-700">Username</label>
                    <input type="text" name="username"
                        class="w-full mt-2 p-3 rounded-lg bg-gray-100 focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter username"
                        required>
                </div>

                <!-- PASSWORD -->
                <div>
                    <div class="flex justify-between">
                        <label class="text-sm font-semibold text-gray-700">Password</label>
                        <a href="#" class="text-xs text-green-600">Lupa Password?</a>
                    </div>

                    <input type="password" name="password"
                        class="w-full mt-2 p-3 rounded-lg bg-gray-100 focus:ring-2 focus:ring-blue-500"
                        placeholder="••••••••"
                        required>
                </div>

                <!-- BUTTON -->
                <button type="submit"
                    class="w-full bg-blue-800 text-white py-3 rounded-full font-semibold hover:scale-105 transition">
                    Masuk ke Dashboard →
                </button>
            </form>

            <!-- FOOTER CARD -->
            <div class="mt-6 text-center text-xs text-gray-500">
                Secure system for authorized analysts only
            </div>
        </div>

    </div>
</main>

<!-- FOOTER -->
<footer class="p-6 text-center text-xs text-gray-500">
    © {{ date('Y') }} SuraTrend Environmental Analytics
</footer>

</body>
</html>