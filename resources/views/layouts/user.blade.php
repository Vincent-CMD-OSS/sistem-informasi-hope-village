<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - User Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts & Styles (Gunakan Vite atau Mix) -->
    @vite(['resources/css/app.css', 'resources/js/app.js']) 
    {{-- Sesuaikan path CSS/JS Anda --}}

    <!-- Bisa tambahkan CSS/JS spesifik user di sini jika perlu -->
    @stack('styles')

</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        {{-- Include Header User --}}
        @include('layouts.partials.user._header') 
        {{-- Atau navigasi jika menyatu dengan header --}}
        @include('layouts.partials.user._navigation') 

        <!-- Page Content -->
        <main>
            <div class="container mx-auto px-4 py-8"> {{-- Contoh container, sesuaikan --}}
                @yield('content') {{-- Konten spesifik halaman akan masuk di sini --}}
            </div>
        </main>

        {{-- Include Footer User (jika ada) --}}
        @include('layouts.partials.user._footer') 

    </div>

    @stack('scripts')
</body>
</html>