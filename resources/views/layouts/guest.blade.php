<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CFTP-L2C') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Merriweather:wght@700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="auth-wrap d-flex align-items-stretch">
        <div class="auth-side d-none d-lg-flex col-lg-5 p-5 flex-column justify-content-between">
            <div>
                <div class="brand-mark mb-4">C</div>
                <p class="section-label text-white-50 mb-2">Centre de Formation</p>
                <h1 class="display-6 mb-3">Gestion professionnelle des apprenants</h1>
                <p class="mb-0 text-white-50">Authentification sécurisée, suivi administratif, notes et statistiques dans une application Laravel structurée.</p>
            </div>
            <div class="small text-white-50">
                CFTP-L2C
            </div>
        </div>
        <div class="col-12 col-lg-7 d-flex align-items-center justify-content-center p-4 p-lg-5">
            <div class="auth-card p-4 p-lg-5 w-100" style="max-width: 34rem;">
                @include('partials.flash')
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
