<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'CFTP-L2C - Centre de Formation Professionnelle')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="public-page">

    {{-- Navbar --}}
    <nav class="pub-navbar">
        <div class="container">
            <div class="pub-navbar-inner">
                <a class="pub-brand" href="{{ route('home') }}">
                    <span class="pub-brand-icon">C</span>
                    <span>
                        <span class="pub-brand-name">CFTP-L2C</span>
                        <span class="pub-brand-tagline">Centre de Formation</span>
                    </span>
                </a>

                <div class="pub-nav-links d-none d-lg-flex">
                    <a href="{{ route('home') }}" class="pub-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a>
                    <a href="{{ route('formations') }}" class="pub-nav-link {{ request()->routeIs('formations') ? 'active' : '' }}">Formations</a>
                    <a href="{{ route('about') }}" class="pub-nav-link {{ request()->routeIs('about') ? 'active' : '' }}">A propos</a>
                    <a href="{{ route('contact') }}" class="pub-nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                </div>

                <div class="pub-nav-actions">
                    @if ($isAuthenticated ?? false)
                        <a href="{{ route('dashboard') }}" class="btn btn-light btn-sm">Tableau de bord</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Connexion</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-light btn-sm">Inscription</a>
                        @endif
                    @endif

                    <button class="pub-nav-toggle d-lg-none" onclick="document.querySelector('.pub-mobile-menu').classList.toggle('open')">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 12h18M3 6h18M3 18h18"/></svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile menu --}}
        <div class="pub-mobile-menu d-lg-none">
            <div class="container">
                <a href="{{ route('home') }}" class="pub-mobile-link">Accueil</a>
                <a href="{{ route('formations') }}" class="pub-mobile-link">Formations</a>
                <a href="{{ route('about') }}" class="pub-mobile-link">A propos</a>
                <a href="{{ route('contact') }}" class="pub-mobile-link">Contact</a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="pub-footer">
        <div class="container">
            <div class="row g-4 g-lg-5">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <span class="pub-brand-icon">C</span>
                        <div>
                            <strong class="d-block text-white">CFTP-L2C</strong>
                            <span class="pub-footer-muted">Centre de Formation Professionnelle</span>
                        </div>
                    </div>
                    <p class="pub-footer-muted small">Application web de gestion des apprenants pour le suivi administratif et pedagogique du centre de formation CFTP-L2C.</p>
                </div>
                <div class="col-6 col-lg-2">
                    <h6 class="pub-footer-heading">Navigation</h6>
                    <ul class="pub-footer-list">
                        <li><a href="{{ route('home') }}">Accueil</a></li>
                        <li><a href="{{ route('formations') }}">Formations</a></li>
                        <li><a href="{{ route('about') }}">A propos</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <h6 class="pub-footer-heading">Espace gestion</h6>
                    <ul class="pub-footer-list">
                        <li><a href="{{ route('login') }}">Connexion</a></li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">Inscription</a></li>
                        @endif
                        @if ($isAuthenticated ?? false)
                            <li><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                            <li><a href="{{ route('filieres.index') }}">Filieres</a></li>
                            <li><a href="{{ route('apprenants.index') }}">Apprenants</a></li>
                        @endif
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h6 class="pub-footer-heading">Informations</h6>
                    <ul class="pub-footer-list">
                        <li><span>Module : Developpement Web avec Laravel</span></li>
                        <li><span>Filiere : Dev. Web / Genie Logiciel</span></li>
                        <li><span>Centre : CFTP-L2C</span></li>
                    </ul>
                </div>
            </div>
            <div class="pub-footer-bottom">
                &copy; {{ date('Y') }} CFTP-L2C &mdash; Tous droits reserves
            </div>
        </div>
    </footer>
</body>
</html>
