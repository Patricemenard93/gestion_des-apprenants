<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CFTP-L2C Gestion') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Merriweather:wght@700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="home-page">
    <nav class="home-navbar">
        <div class="container">
            <div class="home-navbar-inner">
                <a class="home-brand" href="{{ route('home') }}">
                    <span class="brand-mark">C</span>
                    <span>
                        <span class="home-brand-title">CFTP-L2C</span>
                        <span class="home-brand-subtitle">Gestion des apprenants</span>
                    </span>
                </a>

                <div class="home-actions">
                    @if ($isAuthenticated)
                        <a href="{{ route('dashboard') }}" class="btn btn-light">Tableau de bord</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-light">Connexion</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-light">Inscription</a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main>
        <section class="home-hero">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <p class="home-eyebrow">Centre de formation CFTP-L2C</p>
                        <h1>CFTP-L2C Gestion des apprenants</h1>
                        <p class="home-lead">
                            Une plateforme Laravel claire et professionnelle pour suivre les filieres,
                            les dossiers des apprenants, les notes, les statistiques et les exports.
                        </p>
                        <div class="home-cta">
                            @if ($isAuthenticated)
                                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">Acceder au tableau de bord</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Acceder a l'espace de gestion</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">Creer un compte</a>
                                @endif
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="home-preview" aria-label="Apercu de l'interface de gestion">
                            <div class="home-preview-header">
                                <span>Tableau de bord</span>
                                <span class="home-status">Operationnel</span>
                            </div>
                            <div class="home-preview-grid">
                                <div>
                                    <span>Apprenants</span>
                                    <strong>128</strong>
                                </div>
                                <div>
                                    <span>Filieres</span>
                                    <strong>12</strong>
                                </div>
                                <div>
                                    <span>Moyenne</span>
                                    <strong>14,7</strong>
                                </div>
                            </div>
                            <div class="home-preview-table">
                                <div class="home-preview-row home-preview-row-head">
                                    <span>Apprenant</span>
                                    <span>Filiere</span>
                                    <span>Decision</span>
                                </div>
                                <div class="home-preview-row">
                                    <span>Aminata Diallo</span>
                                    <span>Developpement Web</span>
                                    <span class="home-badge success">Admis</span>
                                </div>
                                <div class="home-preview-row">
                                    <span>Moussa Sow</span>
                                    <span>Genie Logiciel</span>
                                    <span class="home-badge warning">Suivi</span>
                                </div>
                                <div class="home-preview-row">
                                    <span>Fatou Ba</span>
                                    <span>Informatique</span>
                                    <span class="home-badge success">Admis</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="home-section">
            <div class="container">
                <div class="home-section-header">
                    <p class="section-label mb-2">Modules principaux</p>
                    <h2>Une organisation simple pour gerer le centre au quotidien</h2>
                </div>

                <div class="row g-3 g-lg-4">
                    <div class="col-md-6 col-xl-3">
                        <article class="home-feature">
                            <span class="home-feature-index">01</span>
                            <h3>Filieres</h3>
                            <p>Creation des parcours, durees, descriptions et consultation rapide des effectifs.</p>
                        </article>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <article class="home-feature">
                            <span class="home-feature-index">02</span>
                            <h3>Apprenants</h3>
                            <p>Dossiers complets avec matricule, photo, contact, filiere et date d'inscription.</p>
                        </article>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <article class="home-feature">
                            <span class="home-feature-index">03</span>
                            <h3>Notes</h3>
                            <p>Saisie des modules, coefficients, moyennes et decisions de suivi pedagogique.</p>
                        </article>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <article class="home-feature">
                            <span class="home-feature-index">04</span>
                            <h3>Exports</h3>
                            <p>Generation de documents PDF et Excel pour faciliter le reporting administratif.</p>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section class="home-tech">
            <div class="container">
                <div class="home-tech-inner">
                    <span>Laravel</span>
                    <span>Blade</span>
                    <span>Bootstrap</span>
                    <span>MySQL</span>
                    <span>Eloquent ORM</span>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
