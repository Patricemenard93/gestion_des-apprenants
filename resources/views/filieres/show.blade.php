<x-app-layout>
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <a href="{{ route('filieres.index') }}" class="btn btn-outline-secondary">&larr; Retour à la liste</a>
        @if(auth()->user()->isAdmin())
            <div class="d-flex gap-2">
                <a href="{{ route('filieres.edit', $filiere) }}" class="btn btn-outline-primary">Modifier</a>
                <form method="POST" action="{{ route('filieres.destroy', $filiere) }}" onsubmit="return confirm('Supprimer cette filière ?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger">Supprimer</button>
                </form>
            </div>
        @endif
    </div>

    <div class="hero-panel p-4 p-lg-5 mb-4">
        <p class="section-label mb-2">Filière</p>
        <h1 class="h2 mb-2">{{ $filiere->nom }}</h1>
        <p class="text-muted mb-0">{{ $filiere->description }}</p>
    </div>

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="content-card p-4">
                <div class="section-label mb-2">Informations</div>
                <div class="mb-3"><strong>Durée :</strong> {{ $filiere->duree }}</div>
                <div><strong>Apprenants visibles :</strong> {{ $filiere->apprenants->count() }}</div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="content-card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="h4 mb-0">Apprenants récents</h2>
                    <a href="{{ route('apprenants.index', ['filiere' => $filiere->id]) }}" class="btn btn-sm btn-outline-primary">Voir tous</a>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Matricule</th>
                                <th>Nom complet</th>
                                <th>Date d'inscription</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($filiere->apprenants as $apprenant)
                                <tr>
                                    <td>{{ $apprenant->matricule }}</td>
                                    <td>{{ $apprenant->nom_complet }}</td>
                                    <td>{{ $apprenant->date_inscription->format('d/m/Y') }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="3"><div class="empty-state">Aucun apprenant rattaché à cette filière.</div></td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
