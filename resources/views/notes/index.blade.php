<x-app-layout>
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <p class="section-label mb-1">Évaluation</p>
            <h1 class="h2 mb-0">Gestion des notes</h1>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('exports.notes.excel') }}" class="btn btn-outline-primary">Exporter Excel</a>
            <a href="{{ route('exports.notes.pdf') }}" class="btn btn-outline-primary">Exporter PDF</a>
            @if(auth()->user()->isAdmin())
                <a href="{{ route('notes.create') }}" class="btn btn-primary">Nouvelle note</a>
            @endif
        </div>
    </div>

    <div class="content-card p-4 mb-4">
        <form method="GET" class="row g-3">
            <div class="col-md-8">
                <label class="form-label" for="apprenant">Apprenant</label>
                <select class="form-select" id="apprenant" name="apprenant">
                    <option value="">Tous les apprenants</option>
                    @foreach($apprenants as $apprenant)
                        <option value="{{ $apprenant->id }}" @selected((string) $selectedApprenant === (string) $apprenant->id)>{{ $apprenant->nom_complet }} - {{ $apprenant->matricule }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 d-flex align-items-end gap-2">
                <button class="btn btn-primary w-100">Filtrer</button>
                <a href="{{ route('notes.index') }}" class="btn btn-outline-secondary">Réinitialiser</a>
            </div>
        </form>
    </div>

    <div class="content-card p-4">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Apprenant</th>
                        <th>Filière</th>
                        <th>Module</th>
                        <th>Note</th>
                        <th>Coefficient</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($notes as $note)
                        <tr>
                            <td class="fw-semibold">{{ $note->apprenant->nom_complet }}</td>
                            <td>{{ $note->apprenant->filiere->nom }}</td>
                            <td>{{ $note->module }}</td>
                            <td>{{ number_format((float) $note->note, 2, ',', ' ') }}</td>
                            <td>{{ $note->coefficient }}</td>
                            <td class="text-end">
                                <a href="{{ route('notes.show', $note) }}" class="btn btn-sm btn-outline-primary">Voir</a>
                                @if(auth()->user()->isAdmin())
                                    <a href="{{ route('notes.edit', $note) }}" class="btn btn-sm btn-outline-secondary">Modifier</a>
                                    <form method="POST" action="{{ route('notes.destroy', $note) }}" class="d-inline" onsubmit="return confirm('Supprimer cette note ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6"><div class="empty-state">Aucune note trouvée.</div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $notes->links() }}
    </div>
</x-app-layout>
