<x-app-layout>
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <p class="section-label mb-1">Catalogue</p>
            <h1 class="h2 mb-0">Filières de formation</h1>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('exports.filieres.excel') }}" class="btn btn-outline-primary">Exporter Excel</a>
            <a href="{{ route('exports.filieres.pdf') }}" class="btn btn-outline-primary">Exporter PDF</a>
            @if(auth()->user()->isAdmin())
                <a href="{{ route('filieres.create') }}" class="btn btn-primary">Nouvelle filière</a>
            @endif
        </div>
    </div>

    <div class="content-card p-4">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Durée</th>
                        <th>Description</th>
                        <th>Apprenants</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($filieres as $filiere)
                        <tr>
                            <td class="fw-semibold">{{ $filiere->nom }}</td>
                            <td>{{ $filiere->duree }}</td>
                            <td class="text-muted">{{ \Illuminate\Support\Str::limit($filiere->description, 70) }}</td>
                            <td>{{ $filiere->apprenants_count }}</td>
                            <td class="text-end">
                                <a href="{{ route('filieres.show', $filiere) }}" class="btn btn-sm btn-outline-primary">Voir</a>
                                @if(auth()->user()->isAdmin())
                                    <a href="{{ route('filieres.edit', $filiere) }}" class="btn btn-sm btn-outline-secondary">Modifier</a>
                                    <form method="POST" action="{{ route('filieres.destroy', $filiere) }}" class="d-inline" onsubmit="return confirm('Supprimer cette filière ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5"><div class="empty-state">Aucune filière disponible.</div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $filieres->links() }}
    </div>
</x-app-layout>
