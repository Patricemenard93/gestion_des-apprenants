<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CFTP-L2C') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="app-layout">
        {{-- Sidebar --}}
        @include('layouts.navigation')

        {{-- Main content --}}
        <div class="app-main">
            {{-- Top bar --}}
            @include('layouts.topbar')

            <main class="app-content">
                @include('partials.flash')
                {{ $slot }}
            </main>
        </div>
    </div>

    {{-- Mobile sidebar overlay --}}
    <div class="sidebar-overlay" onclick="document.body.classList.remove('sidebar-open')"></div>
</body>
</html>
