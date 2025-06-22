<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="min-h-screen bg-gradient-to-br from-indigo-500 via-purple-600 to-pink-500 font-sans antialiased">

    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="w-full max-w-md bg-white/90 backdrop-blur-sm border border-white/20 shadow-xl rounded-2xl p-8">
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-indigo-700">{{ config('app.name', 'Laravel') }}</h1>
                <p class="text-gray-600 text-sm">Selamat datang! Silakan masuk untuk melanjutkan.</p>
            </div>

            {{-- Konten dari komponen akan tampil di sini --}}
            {{ $slot }}

            <p class="text-center text-xs text-gray-400 mt-6">
                &copy; {{ now()->year }} {{ config('app.name') }}. All rights reserved.
            </p>
        </div>
    </div>

    @livewireScripts
</body>
</html>
