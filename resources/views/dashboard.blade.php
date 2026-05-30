<x-app-layout>

    {{-- ===== Greeting & Quick Actions ===== --}}
    <div class="dash-header mb-4">
        <div class="row align-items-center g-3">
            <div class="col-lg-7">
                <h1 class="dash-greeting">Bonjour, {{ auth()->user()->name }}</h1>
                <p class="dash-greeting-sub">Voici un apercu de l'activite de votre centre de formation CFTP-L2C.</p>
            </div>
            <div class="col-lg-5 text-lg-end">
                <div class="d-flex flex-wrap gap-2 justify-content-lg-end">
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('apprenants.create') }}" class="btn btn-primary btn-sm">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-1"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                            Nouvel apprenant
                        </a>
                        <a href="{{ route('notes.create') }}" class="btn btn-outline-primary btn-sm">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-1"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                            Nouvelle note
                        </a>
                    @endif
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-1"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                            Exporter
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('exports.apprenants.pdf') }}">Apprenants PDF</a></li>
                            <li><a class="dropdown-item" href="{{ route('exports.apprenants.excel') }}">Apprenants Excel</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('exports.filieres.pdf') }}">Filieres PDF</a></li>
                            <li><a class="dropdown-item" href="{{ route('exports.filieres.excel') }}">Filieres Excel</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('exports.notes.pdf') }}">Notes PDF</a></li>
                            <li><a class="dropdown-item" href="{{ route('exports.notes.excel') }}">Notes Excel</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== Stat Cards ===== --}}
    <div class="row g-3 mb-4">
        <div class="col-6 col-xl-3">
            <div class="dash-stat-card">
                <div class="dash-stat-icon dash-stat-icon-blue">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <div class="dash-stat-content">
                    <div class="dash-stat-value">{{ $stats['apprenants'] }}</div>
                    <div class="dash-stat-label">Apprenants</div>
                </div>
                <a href="{{ route('apprenants.index') }}" class="stretched-link"></a>
            </div>
        </div>
        <div class="col-6 col-xl-3">
            <div class="dash-stat-card">
                <div class="dash-stat-icon dash-stat-icon-purple">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                </div>
                <div class="dash-stat-content">
                    <div class="dash-stat-value">{{ $stats['filieres'] }}</div>
                    <div class="dash-stat-label">Filieres</div>
                </div>
                <a href="{{ route('filieres.index') }}" class="stretched-link"></a>
            </div>
        </div>
        <div class="col-6 col-xl-3">
            <div class="dash-stat-card">
                <div class="dash-stat-icon dash-stat-icon-amber">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                </div>
                <div class="dash-stat-content">
                    <div class="dash-stat-value">{{ $stats['notes'] }}</div>
                    <div class="dash-stat-label">Evaluations</div>
                </div>
                <a href="{{ route('notes.index') }}" class="stretched-link"></a>
            </div>
        </div>
        <div class="col-6 col-xl-3">
            <div class="dash-stat-card">
                <div class="dash-stat-icon dash-stat-icon-green">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                </div>
                <div class="dash-stat-content">
                    <div class="dash-stat-value">{{ number_format($stats['moyenne_generale'], 2, ',', ' ') }}</div>
                    <div class="dash-stat-label">Moyenne generale</div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== Charts Row ===== --}}
    <div class="row g-4 mb-4">
        <div class="col-xl-8">
            <div class="dash-card h-100">
                <div class="dash-card-header">
                    <div>
                        <h2 class="dash-card-title">Apprenants par filiere</h2>
                        <p class="dash-card-subtitle">Repartition des effectifs</p>
                    </div>
                    <a href="{{ route('filieres.index') }}" class="btn btn-outline-secondary btn-sm">Voir les filieres</a>
                </div>
                <div class="dash-chart-wrap">
                    <canvas id="filieresChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="dash-card h-100">
                <div class="dash-card-header">
                    <div>
                        <h2 class="dash-card-title">Decisions d'admission</h2>
                        <p class="dash-card-subtitle">Admis vs ajournes</p>
                    </div>
                </div>
                <div class="dash-chart-wrap dash-chart-center">
                    <canvas id="admissionsChart"></canvas>
                </div>
                <div class="dash-chart-legend mt-3">
                    @foreach($admissionStats as $decision => $count)
                        <div class="dash-legend-item">
                            <span class="dash-legend-dot" style="background: {{ $decision === 'Admis' ? '#10b981' : ($decision === 'Ajourné' ? '#f59e0b' : '#ef4444') }}"></span>
                            <span class="dash-legend-label">{{ $decision }}</span>
                            <span class="dash-legend-value">{{ $count }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- ===== Second Charts Row ===== --}}
    <div class="row g-4 mb-4">
        <div class="col-xl-6">
            <div class="dash-card h-100">
                <div class="dash-card-header">
                    <div>
                        <h2 class="dash-card-title">Evolution des inscriptions</h2>
                        <p class="dash-card-subtitle">Inscriptions mensuelles</p>
                    </div>
                </div>
                <div class="dash-chart-wrap">
                    <canvas id="inscriptionsChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="dash-card h-100">
                <div class="dash-card-header">
                    <div>
                        <h2 class="dash-card-title">Effectifs par filiere</h2>
                        <p class="dash-card-subtitle">Detail des filieres</p>
                    </div>
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('filieres.create') }}" class="btn btn-outline-primary btn-sm">Ajouter</a>
                    @endif
                </div>
                <div class="dash-filiere-list">
                    @foreach($filieres as $filiere)
                        <div class="dash-filiere-item">
                            <div class="dash-filiere-info">
                                <a href="{{ route('filieres.show', $filiere) }}" class="dash-filiere-name">{{ $filiere->nom }}</a>
                                <span class="dash-filiere-duration">{{ $filiere->duree }} mois</span>
                            </div>
                            <div class="dash-filiere-bar-wrap">
                                <div class="dash-filiere-bar" style="width: {{ $filieres->max('apprenants_count') > 0 ? ($filiere->apprenants_count / $filieres->max('apprenants_count')) * 100 : 0 }}%"></div>
                            </div>
                            <span class="dash-filiere-count">{{ $filiere->apprenants_count }}</span>
                        </div>
                    @endforeach
                    @if($filieres->isEmpty())
                        <div class="text-center text-muted py-4">Aucune filiere enregistree.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- ===== Tables Row ===== --}}
    <div class="row g-4 mb-4">
        {{-- Derniers inscrits --}}
        <div class="col-xl-4">
            <div class="dash-card h-100">
                <div class="dash-card-header">
                    <div>
                        <h2 class="dash-card-title">Derniers inscrits</h2>
                        <p class="dash-card-subtitle">Inscriptions recentes</p>
                    </div>
                    <a href="{{ route('apprenants.index') }}" class="btn btn-outline-secondary btn-sm">Tout voir</a>
                </div>
                <div class="dash-user-list">
                    @forelse($latestApprenants as $apprenant)
                        <a href="{{ route('apprenants.show', $apprenant) }}" class="dash-user-item">
                            <img src="{{ $apprenant->photo_url }}" alt="" class="dash-user-avatar">
                            <div class="dash-user-info">
                                <span class="dash-user-name">{{ $apprenant->nom_complet }}</span>
                                <span class="dash-user-meta">{{ $apprenant->filiere->nom }}</span>
                            </div>
                            <span class="dash-user-date">{{ $apprenant->date_inscription->format('d/m/Y') }}</span>
                        </a>
                    @empty
                        <div class="text-center text-muted py-4">Aucun apprenant enregistre.</div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Meilleurs apprenants --}}
        <div class="col-xl-4">
            <div class="dash-card h-100">
                <div class="dash-card-header">
                    <div>
                        <h2 class="dash-card-title">Meilleurs apprenants</h2>
                        <p class="dash-card-subtitle">Par moyenne generale</p>
                    </div>
                </div>
                <div class="dash-rank-list">
                    @forelse($topApprenants as $i => $item)
                        <a href="{{ route('apprenants.show', $item['apprenant']) }}" class="dash-rank-item">
                            <span class="dash-rank-pos {{ $i < 3 ? 'dash-rank-top' : '' }}">{{ $i + 1 }}</span>
                            <div class="dash-rank-info">
                                <span class="dash-rank-name">{{ $item['apprenant']->nom_complet }}</span>
                                <span class="dash-rank-filiere">{{ $item['apprenant']->filiere->nom ?? '-' }}</span>
                            </div>
                            <div class="text-end">
                                <span class="dash-rank-avg">{{ number_format($item['moyenne'], 2, ',', ' ') }}</span>
                                <span class="dash-rank-decision badge-soft-{{ $item['decision'] === 'Admis' ? 'success' : ($item['decision'] === 'Ajourné' ? 'warning' : 'danger') }}">{{ $item['decision'] }}</span>
                            </div>
                        </a>
                    @empty
                        <div class="text-center text-muted py-4">Aucune note saisie.</div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Dernieres notes --}}
        <div class="col-xl-4">
            <div class="dash-card h-100">
                <div class="dash-card-header">
                    <div>
                        <h2 class="dash-card-title">Dernieres evaluations</h2>
                        <p class="dash-card-subtitle">Notes recentes</p>
                    </div>
                    <a href="{{ route('notes.index') }}" class="btn btn-outline-secondary btn-sm">Tout voir</a>
                </div>
                <div class="dash-note-list">
                    @forelse($recentNotes as $note)
                        <a href="{{ route('notes.show', $note) }}" class="dash-note-item">
                            <div class="dash-note-info">
                                <span class="dash-note-module">{{ $note->module }}</span>
                                <span class="dash-note-student">{{ $note->apprenant->nom_complet }}</span>
                            </div>
                            <div class="text-end">
                                <span class="dash-note-value {{ $note->note >= 10 ? 'text-success' : 'text-danger' }}">{{ number_format((float) $note->note, 2, ',', ' ') }}/20</span>
                                <span class="dash-note-coeff">Coef. {{ $note->coefficient }}</span>
                            </div>
                        </a>
                    @empty
                        <div class="text-center text-muted py-4">Aucune note saisie.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const chartData = @json($chartData);
        const fontFamily = "'Inter', 'Manrope', system-ui, sans-serif";
        const gridColor = 'rgba(0,0,0,0.04)';

        Chart.defaults.font.family = fontFamily;
        Chart.defaults.font.size = 12;
        Chart.defaults.color = '#6b7280';

        // Bar chart - Apprenants par filiere
        new Chart(document.getElementById('filieresChart'), {
            type: 'bar',
            data: {
                labels: chartData.apprenantsParFiliere.labels,
                datasets: [{
                    label: 'Apprenants',
                    data: chartData.apprenantsParFiliere.values,
                    backgroundColor: 'rgba(31, 50, 87, 0.85)',
                    hoverBackgroundColor: 'rgba(31, 50, 87, 1)',
                    borderRadius: 6,
                    borderSkipped: false,
                    barPercentage: 0.6,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#111827',
                        padding: 12,
                        cornerRadius: 8,
                        titleFont: { weight: '600' },
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { precision: 0 },
                        grid: { color: gridColor },
                        border: { display: false }
                    },
                    x: {
                        grid: { display: false },
                        border: { display: false }
                    }
                }
            }
        });

        // Doughnut - Admissions
        new Chart(document.getElementById('admissionsChart'), {
            type: 'doughnut',
            data: {
                labels: chartData.admissions.labels,
                datasets: [{
                    data: chartData.admissions.values,
                    backgroundColor: ['#10b981', '#f59e0b', '#ef4444'],
                    borderWidth: 0,
                    hoverOffset: 6,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '68%',
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#111827',
                        padding: 12,
                        cornerRadius: 8,
                    }
                }
            }
        });

        // Line - Inscriptions
        new Chart(document.getElementById('inscriptionsChart'), {
            type: 'line',
            data: {
                labels: chartData.inscriptions.labels,
                datasets: [{
                    label: 'Inscriptions',
                    data: chartData.inscriptions.values,
                    borderColor: '#c89b3c',
                    backgroundColor: 'rgba(200, 155, 60, 0.08)',
                    pointBackgroundColor: '#c89b3c',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    tension: 0.4,
                    fill: true,
                    borderWidth: 2.5,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#111827',
                        padding: 12,
                        cornerRadius: 8,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { precision: 0 },
                        grid: { color: gridColor },
                        border: { display: false }
                    },
                    x: {
                        grid: { display: false },
                        border: { display: false }
                    }
                }
            }
        });
    </script>
</x-app-layout>
