<x-app-layout>
    <div class="hero-panel p-4 p-lg-5 mb-4">
        <div class="row g-4 align-items-center">
            <div class="col-lg-7">
                <p class="section-label mb-2">Tableau de bord</p>
                <h1 class="display-6 mb-3">Pilotage du centre et suivi des performances</h1>
                <p class="text-muted mb-4">Visualisez les effectifs, les resultats, l'evolution des inscriptions et les activites recentes sur une seule interface.</p>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('apprenants.index') }}" class="btn btn-primary">Voir les apprenants</a>
                    <a href="{{ route('notes.index') }}" class="btn btn-outline-primary">Analyser les notes</a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="metric-card">
                            <div class="section-label mb-2">Apprenants</div>
                            <div class="metric-value">{{ $stats['apprenants'] }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="metric-card">
                            <div class="section-label mb-2">Filieres</div>
                            <div class="metric-value">{{ $stats['filieres'] }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="metric-card">
                            <div class="section-label mb-2">Notes</div>
                            <div class="metric-value">{{ $stats['notes'] }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="metric-card">
                            <div class="section-label mb-2">Moyenne globale</div>
                            <div class="metric-value">{{ number_format($stats['moyenne_generale'], 2, ',', ' ') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12 col-xl-8">
            <div class="content-card p-4 mb-4 chart-card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <p class="section-label mb-1">Statistiques</p>
                        <h2 class="h4 mb-0">Apprenants par filiere</h2>
                    </div>
                </div>
                <canvas id="filieresChart"></canvas>
            </div>
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="content-card p-4 chart-card">
                        <p class="section-label mb-1">Admission</p>
                        <h2 class="h4 mb-3">Admis vs ajournes</h2>
                        <canvas id="admissionsChart"></canvas>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="content-card p-4 chart-card">
                        <p class="section-label mb-1">Inscriptions</p>
                        <h2 class="h4 mb-3">Evolution mensuelle</h2>
                        <canvas id="inscriptionsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="content-card p-4 h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <p class="section-label mb-1">Activite recente</p>
                        <h2 class="h4 mb-0">Derniers inscrits</h2>
                    </div>
                </div>
                <div class="d-grid gap-3">
                    @forelse($latestApprenants as $apprenant)
                        <div class="d-flex gap-3 align-items-center">
                            <img src="{{ $apprenant->photo_url }}" alt="" class="photo-thumb">
                            <div>
                                <div class="fw-semibold">{{ $apprenant->nom_complet }}</div>
                                <div class="small text-muted">{{ $apprenant->filiere->nom }} · {{ $apprenant->date_inscription->format('d/m/Y') }}</div>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">Aucun apprenant enregistre pour le moment.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const chartData = @json($chartData);

        new Chart(document.getElementById('filieresChart'), {
            type: 'bar',
            data: {
                labels: chartData.apprenantsParFiliere.labels,
                datasets: [{
                    label: 'Apprenants',
                    data: chartData.apprenantsParFiliere.values,
                    backgroundColor: '#315f9f',
                    borderRadius: 8,
                }]
            },
            options: {
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
            }
        });

        new Chart(document.getElementById('admissionsChart'), {
            type: 'doughnut',
            data: {
                labels: chartData.admissions.labels,
                datasets: [{
                    data: chartData.admissions.values,
                    backgroundColor: ['#1f7a4d', '#b45309']
                }]
            }
        });

        new Chart(document.getElementById('inscriptionsChart'), {
            type: 'line',
            data: {
                labels: chartData.inscriptions.labels,
                datasets: [{
                    label: 'Inscriptions',
                    data: chartData.inscriptions.values,
                    borderColor: '#c89b3c',
                    backgroundColor: 'rgba(200, 155, 60, 0.2)',
                    tension: 0.35,
                    fill: true,
                }]
            },
            options: {
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
            }
        });
    </script>
</x-app-layout>
