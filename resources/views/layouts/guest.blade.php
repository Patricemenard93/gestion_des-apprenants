<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CFTP-L2C') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="auth-body">

    <div class="auth-wrap">

        {{-- ===== Panneau gauche ===== --}}
        <div class="auth-side d-none d-lg-flex">

            <div class="auth-side-brand auth-side-brand--logo">
                <img src="{{ asset('logo.png') }}" alt="Logo CFTP-L2C" class="auth-side-logo-img">
                <div class="auth-side-logo-name">CFTP-L2C</div>
                <div class="auth-side-logo-sub">Centre de Formation Technique et Professionnelle</div>
            </div>

            <div class="auth-side-body">
                <div class="auth-side-tag">Plateforme de gestion</div>
                <h1 class="auth-side-title">Gérez vos apprenants avec précision</h1>
                <p class="auth-side-desc">
                    Suivi administratif complet, gestion des notes, statistiques en temps réel et exports professionnels — tout dans un seul outil.
                </p>

                <ul class="auth-features">
                    <li class="auth-feature-item">
                        <span class="auth-feature-icon">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                        </span>
                        <span>Gestion des apprenants et filières</span>
                    </li>
                    <li class="auth-feature-item">
                        <span class="auth-feature-icon">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        </span>
                        <span>Notes, moyennes pondérées et décisions</span>
                    </li>
                    <li class="auth-feature-item">
                        <span class="auth-feature-icon">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                        </span>
                        <span>Statistiques et graphiques interactifs</span>
                    </li>
                    <li class="auth-feature-item">
                        <span class="auth-feature-icon">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                        </span>
                        <span>Exports PDF et Excel professionnels</span>
                    </li>
                    <li class="auth-feature-item">
                        <span class="auth-feature-icon">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        </span>
                        <span>Accès sécurisé par rôles (Admin / Consultation)</span>
                    </li>
                </ul>
            </div>

            <div class="auth-side-footer">
                <span>© {{ date('Y') }} CFTP-L2C</span>
                <span class="auth-side-footer-sep">·</span>
                <span>Tous droits réservés</span>
            </div>
        </div>

        {{-- ===== Panneau droit (formulaire) ===== --}}
        <div class="auth-main">
            <div class="auth-mobile-brand d-lg-none">
                <img src="{{ asset('logo.png') }}" alt="Logo CFTP-L2C" class="auth-mobile-logo-img">
                <span class="auth-side-logo-name" style="color: var(--text-main);">CFTP-L2C</span>
            </div>

            <div class="auth-form-wrap">
                {{ $slot }}
            </div>

            <p class="auth-main-footer">
                <a href="{{ route('home') }}">← Retour au site public</a>
            </p>
        </div>

    </div>

</body>
</html>
