@extends('layouts.public')

@section('title', 'A propos - CFTP-L2C')

@section('content')

    {{-- Page header --}}
    <section class="pub-page-header">
        <div class="container">
            <span class="pub-badge-label">A propos</span>
            <h1 class="pub-page-title">Centre de Formation Professionnelle CFTP-L2C</h1>
            <p class="pub-page-desc">Le CFTP-L2C est un centre de formation dedie a l'excellence dans les metiers du numerique et de l'informatique.</p>
        </div>
    </section>

    {{-- Mission --}}
    <section class="pub-section">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <span class="pub-badge-label">Notre mission</span>
                    <h2 class="pub-section-title">Former les talents de demain</h2>
                    <p class="pub-text">Le CFTP-L2C a pour mission de former des professionnels competents dans les domaines du developpement web, du genie logiciel et de l'informatique. Notre approche pedagogique allie theorie et pratique pour garantir l'employabilite de nos apprenants.</p>
                    <p class="pub-text">Nous mettons a disposition de nos apprenants des outils modernes et une plateforme de gestion qui permet un suivi administratif et pedagogique rigoureux tout au long de leur parcours de formation.</p>
                </div>
                <div class="col-lg-6">
                    <div class="pub-about-stats">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="pub-about-stat-card">
                                    <div class="pub-about-stat-value">{{ $totalFilieres }}</div>
                                    <div class="pub-about-stat-label">Filieres de formation</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="pub-about-stat-card">
                                    <div class="pub-about-stat-value">{{ $totalApprenants }}</div>
                                    <div class="pub-about-stat-label">Apprenants inscrits</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="pub-about-stat-card">
                                    <div class="pub-about-stat-value">{{ $totalNotes }}</div>
                                    <div class="pub-about-stat-label">Evaluations saisies</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="pub-about-stat-card">
                                    <div class="pub-about-stat-value">95%</div>
                                    <div class="pub-about-stat-label">Taux de reussite</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Objectifs --}}
    <section class="pub-section pub-section-light">
        <div class="container">
            <div class="text-center mb-5">
                <span class="pub-badge-label">Nos objectifs</span>
                <h2 class="pub-section-title">Ce que nous visons</h2>
            </div>
            <div class="row g-4">
                @foreach([
                    ['Gestion des filieres', 'Organiser et administrer les differents parcours de formation proposes par le centre.'],
                    ['Suivi des apprenants', 'Assurer un suivi individuel de chaque apprenant avec matricule unique, photo et dossier complet.'],
                    ['Gestion des notes', 'Saisir les evaluations par module avec coefficients et calculer automatiquement les moyennes ponderees.'],
                    ['Suivi des inscriptions', 'Suivre les inscriptions et l\'evolution des effectifs au fil du temps.'],
                    ['Consultation des resultats', 'Permettre la consultation des resultats avec decisions d\'admission (Admis, Ajourne, Refuse).'],
                    ['Generation de statistiques', 'Produire des graphiques et tableaux de bord pour piloter l\'activite du centre.'],
                    ['Exportation des donnees', 'Exporter les listes d\'apprenants, filieres et notes en formats PDF et Excel.'],
                    ['Gestion des utilisateurs', 'Gerer les comptes administratifs avec deux niveaux d\'acces : Administrateur et Utilisateur.'],
                ] as $i => $objectif)
                    <div class="col-md-6 col-lg-3">
                        <div class="pub-objectif-card">
                            <span class="pub-objectif-num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <h4>{{ $objectif[0] }}</h4>
                            <p>{{ $objectif[1] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Architecture technique --}}
    <section class="pub-section">
        <div class="container">
            <div class="text-center mb-5">
                <span class="pub-badge-label">Architecture technique</span>
                <h2 class="pub-section-title">Construit avec les meilleures technologies</h2>
                <p class="pub-section-desc">L'application est developpee avec le framework Laravel en suivant l'architecture MVC et les bonnes pratiques de developpement web.</p>
            </div>
            <div class="row g-4">
                @foreach([
                    ['Laravel', 'Framework PHP moderne et robuste pour le backend', '#FF2D20'],
                    ['Blade', 'Moteur de templates natif pour les vues', '#F7523F'],
                    ['Eloquent ORM', 'Gestion des modeles et relations', '#E74430'],
                    ['Bootstrap 5', 'Framework CSS pour le design responsive', '#7952B3'],
                    ['MySQL', 'Base de donnees relationnelle', '#4479A1'],
                    ['Chart.js', 'Graphiques interactifs pour les statistiques', '#FF6384'],
                ] as $tech)
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="pub-tech-card">
                            <div class="pub-tech-dot" style="background: {{ $tech[2] }}"></div>
                            <h5>{{ $tech[0] }}</h5>
                            <p>{{ $tech[1] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
