@extends('layouts.public')

@section('title', 'CFTP-L2C - Gestion des Apprenants')

@section('content')

    {{-- ===== HERO ===== --}}
    <section class="pub-hero">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="pub-badge-label">Centre de Formation Professionnelle CFTP-L2C</span>
                    <h1 class="pub-hero-title">Formez-vous aux metiers du numerique</h1>
                    <p class="pub-hero-lead">
                        Le CFTP-L2C vous propose des formations professionnelles de qualite en developpement web,
                        genie logiciel et informatique. Rejoignez notre centre et construisez votre avenir.
                    </p>
                    <div class="d-flex flex-wrap gap-3 mt-4">
                        @if ($isAuthenticated)
                            <a href="{{ route('dashboard') }}" class="pub-btn pub-btn-primary">Tableau de bord</a>
                            <a href="{{ route('apprenants.index') }}" class="pub-btn pub-btn-outline">Voir les apprenants</a>
                        @else
                            <a href="{{ route('formations') }}" class="pub-btn pub-btn-primary">Decouvrir nos formations</a>
                            <a href="{{ route('login') }}" class="pub-btn pub-btn-outline">Espace de gestion</a>
                        @endif
                    </div>
                    <div class="pub-hero-badges mt-4">
                        <div class="pub-hero-badge">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#c89b3c" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span>Formations certifiantes</span>
                        </div>
                        <div class="pub-hero-badge">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#c89b3c" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            <span>Suivi personnalise</span>
                        </div>
                        <div class="pub-hero-badge">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#c89b3c" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                            <span>Plateforme securisee</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="pub-hero-card">
                        <div class="pub-hero-card-header">
                            <span>Tableau de bord</span>
                            <span class="pub-hero-card-status">En ligne</span>
                        </div>
                        <div class="pub-hero-card-stats">
                            <div class="pub-hero-card-stat">
                                <strong>{{ $totalApprenants }}</strong>
                                <span>Apprenants</span>
                            </div>
                            <div class="pub-hero-card-stat">
                                <strong>{{ $totalFilieres }}</strong>
                                <span>Filieres</span>
                            </div>
                            <div class="pub-hero-card-stat">
                                <strong>95%</strong>
                                <span>Reussite</span>
                            </div>
                        </div>
                        <div class="pub-hero-card-rows">
                            <div class="pub-hero-card-row head">
                                <span>Apprenant</span>
                                <span>Filiere</span>
                                <span>Statut</span>
                            </div>
                            <div class="pub-hero-card-row">
                                <span>Aminata Diallo</span>
                                <span>Dev. Web</span>
                                <span class="pub-tag pub-tag-success">Admis</span>
                            </div>
                            <div class="pub-hero-card-row">
                                <span>Moussa Sow</span>
                                <span>Genie Logiciel</span>
                                <span class="pub-tag pub-tag-warning">En cours</span>
                            </div>
                            <div class="pub-hero-card-row">
                                <span>Fatou Ba</span>
                                <span>Informatique</span>
                                <span class="pub-tag pub-tag-success">Admis</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== CHIFFRES ===== --}}
    <section class="pub-numbers">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-6 col-lg-3">
                    <div class="pub-number-card">
                        <div class="pub-number-value">{{ $totalFilieres }}</div>
                        <div class="pub-number-label">Filieres de formation</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="pub-number-card">
                        <div class="pub-number-value">{{ $totalApprenants ?: '150+' }}</div>
                        <div class="pub-number-label">Apprenants formes</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="pub-number-card">
                        <div class="pub-number-value">95%</div>
                        <div class="pub-number-label">Taux de reussite</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="pub-number-card">
                        <div class="pub-number-value">24/7</div>
                        <div class="pub-number-label">Acces plateforme</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== NOS FORMATIONS ===== --}}
    <section class="pub-section pub-section-light" id="formations">
        <div class="container">
            <div class="text-center mb-5">
                <span class="pub-badge-label">Nos formations</span>
                <h2 class="pub-section-title">Des parcours adaptes aux metiers du numerique</h2>
                <p class="pub-section-desc">Decouvrez les filieres proposees par le CFTP-L2C, conues pour repondre aux besoins du marche de l'emploi.</p>
            </div>

            @if($filieres->count() > 0)
                <div class="row g-4">
                    @foreach($filieres as $filiere)
                        <div class="col-md-6 col-lg-4">
                            <div class="pub-formation-card">
                                <div class="pub-formation-header">
                                    <span class="pub-formation-icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                                    </span>
                                    <span class="pub-formation-count">{{ $filiere->apprenants_count }} apprenants</span>
                                </div>
                                <h3 class="pub-formation-name">{{ $filiere->nom }}</h3>
                                <p class="pub-formation-desc">{{ $filiere->description ?: 'Formation professionnelle de qualite au sein du CFTP-L2C.' }}</p>
                                <div class="pub-formation-meta">
                                    <span><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> {{ $filiere->duree }} mois</span>
                                    <span><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg> {{ $filiere->apprenants_count }} inscrits</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('formations') }}" class="pub-btn pub-btn-outline-dark">Voir toutes les formations</a>
                </div>
            @else
                <div class="row g-4">
                    @foreach([
                        ['Developpement Web', 'Maitrisez HTML, CSS, JavaScript, PHP et le framework Laravel pour creer des applications web modernes.', '12'],
                        ['Genie Logiciel', 'Apprenez les methodes de conception, le developpement oriente objet et la gestion de projets logiciels.', '18'],
                        ['Informatique Generale', 'Formation complete couvrant les reseaux, systemes, bases de donnees et administration.', '12'],
                    ] as $formation)
                        <div class="col-md-6 col-lg-4">
                            <div class="pub-formation-card">
                                <div class="pub-formation-header">
                                    <span class="pub-formation-icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                                    </span>
                                </div>
                                <h3 class="pub-formation-name">{{ $formation[0] }}</h3>
                                <p class="pub-formation-desc">{{ $formation[1] }}</p>
                                <div class="pub-formation-meta">
                                    <span><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> {{ $formation[2] }} mois</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- ===== FONCTIONNALITES ===== --}}
    <section class="pub-section" id="fonctionnalites">
        <div class="container">
            <div class="text-center mb-5">
                <span class="pub-badge-label">Fonctionnalites</span>
                <h2 class="pub-section-title">Une plateforme complete pour votre centre</h2>
                <p class="pub-section-desc">Tous les outils necessaires pour gerer efficacement les apprenants, les filieres, les notes et les statistiques.</p>
            </div>

            <div class="row g-4">
                @foreach([
                    ['Gestion des filieres', 'Creez et organisez vos parcours de formation avec nom, duree et description. Consultez les effectifs en temps reel.', '<path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>'],
                    ['Gestion des apprenants', 'Matricule unique, photo, informations personnelles, filiere et date d\'inscription. Recherche et filtrage avances.', '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>'],
                    ['Gestion des notes', 'Saisie par module avec coefficients. Calcul automatique des moyennes ponderees et decisions d\'admission.', '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>'],
                    ['Tableau de bord', 'Graphiques Chart.js pour visualiser les statistiques : effectifs par filiere, taux d\'admission et evolution mensuelle.', '<line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/>'],
                    ['Exports PDF & Excel', 'Generez des documents professionnels pour vos apprenants, filieres et notes en formats PDF et Excel (.xlsx).', '<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/>'],
                    ['Roles & securite', 'Deux niveaux d\'acces : Administrateur (gestion complete) et Utilisateur (consultation). Routes protegees par middleware.', '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>'],
                ] as $i => $feature)
                    <div class="col-md-6 col-lg-4">
                        <div class="pub-feature-card">
                            <div class="pub-feature-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">{!! $feature[2] !!}</svg>
                            </div>
                            <h3>{{ $feature[0] }}</h3>
                            <p>{{ $feature[1] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== TECHNOLOGIES ===== --}}
    <section class="pub-tech-section">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="text-white h4 mb-3">Technologies utilisees</h2>
            </div>
            <div class="pub-tech-grid">
                @foreach(['Laravel', 'PHP', 'MySQL', 'Blade', 'Bootstrap 5', 'Chart.js', 'Eloquent ORM', 'DomPDF', 'Maatwebsite Excel'] as $tech)
                    <span class="pub-tech-pill">{{ $tech }}</span>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== CTA ===== --}}
    <section class="pub-cta">
        <div class="container">
            <div class="pub-cta-inner">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <h2>Pret a gerer votre centre de formation ?</h2>
                        <p>Connectez-vous pour acceder a l'ensemble des fonctionnalites de gestion du CFTP-L2C.</p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        @if ($isAuthenticated)
                            <a href="{{ route('dashboard') }}" class="pub-btn pub-btn-white">Tableau de bord</a>
                        @else
                            <a href="{{ route('login') }}" class="pub-btn pub-btn-white me-2">Connexion</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="pub-btn pub-btn-outline-white">Inscription</a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
