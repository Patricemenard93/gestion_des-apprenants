<x-app-layout>
    <div class="hero-panel p-4 p-lg-5 mb-4">
        <div class="d-flex flex-column flex-lg-row gap-4 align-items-lg-center">
            <img src="{{ $apprenant->photo_url }}" alt="" class="avatar-lg">
            <div>
                <p class="section-label mb-2">Dossier apprenant</p>
                <h1 class="h2 mb-2">{{ $apprenant->nom_complet }}</h1>
                <p class="text-muted mb-0">{{ $apprenant->matricule }} · {{ $apprenant->filiere->nom }}</p>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="content-card p-4 h-100">
                <h2 class="h4 mb-3">Informations</h2>
                <div class="d-grid gap-2">
                    <div><strong>Email :</strong> {{ $apprenant->email }}</div>
                    <div><strong>Telephone :</strong> {{ $apprenant->telephone }}</div>
                    <div><strong>Sexe :</strong> {{ $apprenant->sexe->label() }}</div>
                    <div><strong>Naissance :</strong> {{ $apprenant->date_naissance->format('d/m/Y') }}</div>
                    <div><strong>Inscription :</strong> {{ $apprenant->date_inscription->format('d/m/Y') }}</div>
                    <div><strong>Adresse :</strong> {{ $apprenant->adresse }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="metric-card">
                        <div class="section-label mb-2">Moyenne</div>
                        <div class="metric-value">{{ number_format($stats['moyenne'], 2, ',', ' ') }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="metric-card">
                        <div class="section-label mb-2">Coefficients</div>
                        <div class="metric-value">{{ $stats['coefficients'] }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="metric-card">
                        <div class="section-label mb-2">Decision</div>
                        <div class="metric-value fs-3">{{ $stats['decision'] }}</div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="content-card p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="h4 mb-0">Notes de l'apprenant</h2>
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('notes.create', ['apprenant_id' => $apprenant->id]) }}" class="btn btn-sm btn-primary">Ajouter une note</a>
                            @endif
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>Module</th>
                                        <th>Note</th>
                                        <th>Coefficient</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($apprenant->notes as $note)
                                        <tr>
                                            <td>{{ $note->module }}</td>
                                            <td>{{ number_format((float) $note->note, 2, ',', ' ') }}</td>
                                            <td>{{ $note->coefficient }}</td>
                                            <td class="text-end"><a href="{{ route('notes.show', $note) }}" class="btn btn-sm btn-outline-primary">Voir</a></td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="4"><div class="empty-state">Aucune note saisie pour cet apprenant.</div></td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
