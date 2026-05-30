@extends('layouts.public')

@section('title', 'Nos Formations - CFTP-L2C')

@section('content')

    {{-- Page header --}}
    <section class="pub-page-header">
        <div class="container">
            <span class="pub-badge-label">Nos formations</span>
            <h1 class="pub-page-title">Parcours de formation professionnelle</h1>
            <p class="pub-page-desc">Le CFTP-L2C propose des formations adaptees aux besoins du marche du numerique. Chaque filiere est concue pour vous donner les competences necessaires a votre reussite professionnelle.</p>
        </div>
    </section>

    {{-- Formations list --}}
    <section class="pub-section">
        <div class="container">
            @if($filieres->count() > 0)
                <div class="row g-4">
                    @foreach($filieres as $filiere)
                        <div class="col-md-6 col-lg-4">
                            <div class="pub-formation-card pub-formation-card-lg">
                                <div class="pub-formation-header">
                                    <span class="pub-formation-icon">
                                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                                    </span>
                                    <span class="pub-formation-count">{{ $filiere->apprenants_count }} apprenants inscrits</span>
                                </div>
                                <h3 class="pub-formation-name">{{ $filiere->nom }}</h3>
                                <p class="pub-formation-desc">{{ $filiere->description ?: 'Formation professionnelle dispensee par le CFTP-L2C pour preparer les apprenants aux metiers du numerique.' }}</p>

                                <div class="pub-formation-details">
                                    <div class="pub-formation-detail">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                        <div>
                                            <strong>Duree</strong>
                                            <span>{{ $filiere->duree }} mois</span>
                                        </div>
                                    </div>
                                    <div class="pub-formation-detail">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                                        <div>
                                            <strong>Effectif</strong>
                                            <span>{{ $filiere->apprenants_count }} apprenants</span>
                                        </div>
                                    </div>
                                    <div class="pub-formation-detail">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                        <div>
                                            <strong>Certification</strong>
                                            <span>Diplome professionnel</span>
                                        </div>
                                    </div>
                                </div>

                                @if($isAuthenticated)
                                    <a href="{{ route('filieres.show', $filiere) }}" class="pub-btn pub-btn-outline-dark pub-btn-sm w-100 mt-3">Voir les details</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <div class="pub-empty-state">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="1.5"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                        <h3>Aucune filiere disponible</h3>
                        <p>Les filieres de formation seront bientot ajoutees par l'administration du centre.</p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    {{-- CTA --}}
    <section class="pub-cta">
        <div class="container">
            <div class="pub-cta-inner">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <h2>Interesse par une formation ?</h2>
                        <p>Connectez-vous pour consulter les details des filieres et acceder a la gestion des inscriptions.</p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        @if ($isAuthenticated)
                            <a href="{{ route('filieres.index') }}" class="pub-btn pub-btn-white">Gerer les filieres</a>
                        @else
                            <a href="{{ route('login') }}" class="pub-btn pub-btn-white">Se connecter</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
