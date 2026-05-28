<x-app-layout>
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <p class="section-label mb-1">Administration</p>
            <h1 class="h2 mb-0">Apprenants</h1>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('exports.apprenants.excel') }}" class="btn btn-outline-primary">Exporter Excel</a>
            <a href="{{ route('exports.apprenants.pdf') }}" class="btn btn-outline-primary">Exporter PDF</a>
            @if(auth()->user()->isAdmin())
                <a href="{{ route('apprenants.create') }}" class="btn btn-primary">Nouvel apprenant</a>
            @endif
        </div>
    </div>

    <div class="content-card p-4 mb-4">
        <form method="GET" class="row g-3">
            <div class="col-md-5">
                <label class="form-label" for="search">Recherche</label>
                <input class="form-control" id="search" name="search" type="text" value="{{ $filters['search'] }}" placeholder="Nom, prenom ou matricule">
            </div>
            <div class="col-md-4">
                <label class="form-label" for="filiere">Filiere</label>
                <select class="form-select" id="filiere" name="filiere">
                    <option value="">Toutes les filieres</option>
                    @foreach($filieres as $filiere)
                        <option value="{{ $filiere->id }}" @selected((string) $filters['filiere'] === (string) $filiere->id)>{{ $filiere->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end gap-2">
                <button class="btn btn-primary w-100">Filtrer</button>
                <a href="{{ route('apprenants.index') }}" class="btn btn-outline-secondary">Reinitialiser</a>
            </div>
        </form>
    </div>

    <div class="content-card p-4">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Matricule</th>
                        <th>Nom complet</th>
                        <th>Filiere</th>
                        <th>Email</th>
                        <th>Date d'inscription</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($apprenants as $apprenant)
                        <tr>
                            <td><img src="{{ $apprenant->photo_url }}" alt="" class="photo-thumb"></td>
                            <td>{{ $apprenant->matricule }}</td>
                            <td class="fw-semibold">{{ $apprenant->nom_complet }}</td>
                            <td>{{ $apprenant->filiere->nom }}</td>
                            <td>{{ $apprenant->email }}</td>
                            <td>{{ $apprenant->date_inscription->format('d/m/Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('apprenants.show', $apprenant) }}" class="btn btn-sm btn-outline-primary">Voir</a>
                                @if(auth()->user()->isAdmin())
                                    <a href="{{ route('apprenants.edit', $apprenant) }}" class="btn btn-sm btn-outline-secondary">Modifier</a>
                                    <form method="POST" action="{{ route('apprenants.destroy', $apprenant) }}" class="d-inline" onsubmit="return confirm('Supprimer cet apprenant ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7"><div class="empty-state">Aucun apprenant correspondant.</div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $apprenants->links() }}
    </div>
</x-app-layout>
