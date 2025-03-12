<!DOCTYPE html>
<html class="overflow-hidden" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
        [x-cloak] {
            display: none !important;
            opacity: 0;
            visibility: hidden;
        }
    </style>
</head>
<body class="font-sans antialiased">
<x-toast/>
<div class="min-h-screen bg-gray-50 flex">
    @include('layouts.sidebar')
    <div class="w-full">
        @include('layouts.header')

        <main class="py-6 px-8 overflow-y-auto h-[calc(100vh-48px)]">
            {{ $slot }}
        </main>
    </div>
</div>
@livewireScripts
</body>
</html>
