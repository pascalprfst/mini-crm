<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
<div class="min-h-screen relative flex flex-col justify-center items-center p-4">
    <div class="absolute inset-0 z-0">
        <img class="w-full h-full object-cover" src="{{ asset('assets/guest-background.png') }}" alt="Background">
    </div>

    <div class="w-full max-w-md mx-6 px-6 py-5 shadow-md overflow-hidden rounded-md relative z-10">
        <div class="absolute inset-0 bg-white/30 backdrop-blur-sm z-0 rounded-md pointer-events-none"></div>

        <div class="relative z-10">
            {{ $slot }}
        </div>
    </div>
</div>
</body>
</html>
