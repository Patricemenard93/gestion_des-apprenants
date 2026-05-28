<x-app-layout>
    <div class="hero-panel p-4 p-lg-5 mb-4">
        <p class="section-label mb-2">Detail d'evaluation</p>
        <h1 class="h2 mb-2">{{ $note->module }}</h1>
        <p class="text-muted mb-0">{{ $note->apprenant->nom_complet }} · {{ $note->apprenant->filiere->nom }}</p>
    </div>

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="content-card p-4 h-100">
                <div class="d-grid gap-3">
                    <div><strong>Note :</strong> {{ number_format((float) $note->note, 2, ',', ' ') }} / 20</div>
                    <div><strong>Coefficient :</strong> {{ $note->coefficient }}</div>
                    <div><strong>Moyenne generale :</strong> {{ number_format($stats['moyenne'], 2, ',', ' ') }}</div>
                    <div><strong>Total coefficients :</strong> {{ $stats['coefficients'] }}</div>
                    <div><strong>Decision :</strong> {{ $stats['decision'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="content-card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="h4 mb-0">Parcours de l'apprenant</h2>
                    <a href="{{ route('apprenants.show', $note->apprenant) }}" class="btn btn-outline-primary btn-sm">Voir le dossier</a>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Module</th>
                                <th>Note</th>
                                <th>Coefficient</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($note->apprenant->notes as $item)
                                <tr @class(['table-primary' => $item->id === $note->id])>
                                    <td>{{ $item->module }}</td>
                                    <td>{{ number_format((float) $item->note, 2, ',', ' ') }}</td>
                                    <td>{{ $item->coefficient }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
