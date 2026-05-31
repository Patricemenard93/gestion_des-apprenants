<x-app-layout>

    {{-- Greeting & Quick Actions --}}
    <div class="dash-header mb-4">
        <div class="row align-items-center g-3">
            <div class="col-lg-7">
                <h1 class="dash-greeting">Bonjour, {{ auth()->user()->name }}</h1>
                <p class="dash-greeting-sub">Voici un aperçu de l'activité de votre centre de formation CFTP-L2C.</p>
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
                            <li><a class="dropdown-item" href="{{ route('exports.filieres.pdf') }}">Filières PDF</a></li>
                            <li><a class="dropdown-item" href="{{ route('exports.filieres.excel') }}">Filières Excel</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('exports.notes.pdf') }}">Notes PDF</a></li>
                            <li><a class="dropdown-item" href="{{ route('exports.notes.excel') }}">Notes Excel</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Stat Cards --}}
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
                    <div class="dash-stat-label">Filières</div>
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
                    <div class="dash-stat-label">Évaluations</div>
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
                    <div class="dash-stat-label">Moyenne générale</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Charts Row 1 --}}
    <div class="row g-4 mb-4">
        {{-- Bar chart - Apprenants par filière --}}
        <div class="col-xl-8">
            <div class="dash-card h-100">
                <div class="dash-card-header">
                    <div class="d-flex align-items-center gap-2">
                        <span class="chart-badge chart-badge-blue"></span>
                        <div>
                            <h2 class="dash-card-title">Apprenants par filière</h2>
                            <p class="dash-card-subtitle">Répartition des effectifs par programme</p>
                        </div>
                    </div>
                    <a href="{{ route('filieres.index') }}" class="btn btn-outline-secondary btn-sm">Voir les filières</a>
                </div>
                <div class="dash-chart-wrap" style="min-height:260px;">
                    <canvas id="filieresChart"></canvas>
                </div>
            </div>
        </div>
        {{-- Doughnut - Admissions --}}
        <div class="col-xl-4">
            <div class="dash-card h-100">
                <div class="dash-card-header">
                    <div class="d-flex align-items-center gap-2">
                        <span class="chart-badge chart-badge-green"></span>
                        <div>
                            <h2 class="dash-card-title">Décisions d'admission</h2>
                            <p class="dash-card-subtitle">Admis vs ajournés</p>
                        </div>
                    </div>
                </div>
                <div class="dash-chart-donut-wrap">
                    <canvas id="admissionsChart"></canvas>
                    <div class="dash-chart-donut-center">
                        <div class="dash-chart-donut-total">{{ array_sum($chartData['admissions']['values'] ?: [0]) }}</div>
                        <div class="dash-chart-donut-label">total</div>
                    </div>
                </div>
                <div class="dash-chart-legend mt-3">
                    @php
                        $admissionColors = ['Admis' => '#10b981', 'Ajourné' => '#f59e0b'];
                        $admissionTotal = array_sum($chartData['admissions']['values'] ?: [0]);
                    @endphp
                    @foreach($admissionStats as $decision => $count)
                        <div class="dash-legend-item">
                            <span class="dash-legend-dot" style="background:{{ $admissionColors[$decision] ?? '#6b7280' }}"></span>
                            <span class="dash-legend-label">{{ $decision }}</span>
                            <span class="dash-legend-value">{{ $count }}</span>
                            <span class="dash-legend-pct">{{ $admissionTotal > 0 ? round(($count / $admissionTotal) * 100) : 0 }}%</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Charts Row 2 --}}
    <div class="row g-4 mb-4">
        {{-- Line - Évolution inscriptions --}}
        <div class="col-xl-6">
            <div class="dash-card h-100">
                <div class="dash-card-header">
                    <div class="d-flex align-items-center gap-2">
                        <span class="chart-badge chart-badge-amber"></span>
                        <div>
                            <h2 class="dash-card-title">Évolution des inscriptions</h2>
                            <p class="dash-card-subtitle">Nouvelles inscriptions par mois</p>
                        </div>
                    </div>
                </div>
                <div class="dash-chart-wrap" style="min-height:220px;">
                    <canvas id="inscriptionsChart"></canvas>
                </div>
            </div>
        </div>
        {{-- Bar horizontal - Genre --}}
        <div class="col-xl-6">
            <div class="dash-card h-100">
                <div class="dash-card-header">
                    <div class="d-flex align-items-center gap-2">
                        <span class="chart-badge chart-badge-purple"></span>
                        <div>
                            <h2 class="dash-card-title">Répartition par genre</h2>
                            <p class="dash-card-subtitle">Distribution Masculin / Féminin</p>
                        </div>
                    </div>
                </div>
                <div class="dash-chart-gender-wrap">
                    <canvas id="genderChart"></canvas>
                </div>
                <div class="dash-chart-legend mt-3">
                    @php
                        $genderColors = ['masculin' => '#3b82f6', 'feminin' => '#ec4899'];
                        $genderTotal = array_sum($chartData['gender']['values'] ?: [0]);
                    @endphp
                    @foreach($genderStats as $genre => $count)
                        <div class="dash-legend-item">
                            <span class="dash-legend-dot" style="background:{{ $genderColors[$genre] ?? '#6b7280' }}"></span>
                            <span class="dash-legend-label">{{ ucfirst($genre) }}</span>
                            <span class="dash-legend-value">{{ $count }}</span>
                            <span class="dash-legend-pct">{{ $genderTotal > 0 ? round(($count / $genderTotal) * 100) : 0 }}%</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Tables Row --}}
    <div class="row g-4 mb-4">
        {{-- Derniers inscrits --}}
        <div class="col-xl-4">
            <div class="dash-card h-100">
                <div class="dash-card-header">
                    <div>
                        <h2 class="dash-card-title">Derniers inscrits</h2>
                        <p class="dash-card-subtitle">Inscriptions récentes</p>
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
                        <div class="text-center text-muted py-4">Aucun apprenant enregistré.</div>
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
                        <p class="dash-card-subtitle">Par moyenne générale</p>
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
                                <span class="dash-rank-decision badge-soft-{{ $item['decision'] === 'Admis' ? 'success' : 'warning' }}">{{ $item['decision'] }}</span>
                            </div>
                        </a>
                    @empty
                        <div class="text-center text-muted py-4">Aucune note saisie.</div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Dernières notes --}}
        <div class="col-xl-4">
            <div class="dash-card h-100">
                <div class="dash-card-header">
                    <div>
                        <h2 class="dash-card-title">Dernières évaluations</h2>
                        <p class="dash-card-subtitle">Notes récentes</p>
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
    (function () {
        const data = @json($chartData);

        Chart.defaults.font.family = "'Inter', 'Manrope', system-ui, sans-serif";
        Chart.defaults.font.size = 12;
        Chart.defaults.color = '#6b7280';

        const tooltip = {
            backgroundColor: '#0f172a',
            titleColor: '#f1f5f9',
            bodyColor: '#cbd5e1',
            padding: 12,
            cornerRadius: 10,
            borderColor: 'rgba(255,255,255,0.06)',
            borderWidth: 1,
            displayColors: true,
            boxWidth: 10,
            boxHeight: 10,
            boxPadding: 4,
        };

        function makeGradient(ctx, color1, color2) {
            const g = ctx.createLinearGradient(0, 0, 0, ctx.canvas.height);
            g.addColorStop(0, color1);
            g.addColorStop(1, color2);
            return g;
        }

        /* ── 1. Bar chart : apprenants par filière ── */
        (function () {
            const ctx = document.getElementById('filieresChart');
            if (!ctx) return;
            const c = ctx.getContext('2d');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.apprenantsParFiliere.labels,
                    datasets: [{
                        label: 'Apprenants',
                        data: data.apprenantsParFiliere.values,
                        backgroundColor: function(context) {
                            const chart = context.chart;
                            const {ctx: c, chartArea} = chart;
                            if (!chartArea) return '#1e3a5f';
                            const g = c.createLinearGradient(0, chartArea.top, 0, chartArea.bottom);
                            g.addColorStop(0, '#1e40af');
                            g.addColorStop(1, '#1e3a5f');
                            return g;
                        },
                        hoverBackgroundColor: '#3b82f6',
                        borderRadius: 8,
                        borderSkipped: false,
                        barPercentage: 0.55,
                        categoryPercentage: 0.7,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    animation: { duration: 900, easing: 'easeOutQuart' },
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            ...tooltip,
                            callbacks: {
                                label: ctx => ` ${ctx.parsed.y} apprenant${ctx.parsed.y > 1 ? 's' : ''}`
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: { precision: 0, color: '#9ca3af', font: { size: 11 } },
                            grid: { color: 'rgba(0,0,0,0.04)', drawBorder: false },
                            border: { display: false }
                        },
                        x: {
                            ticks: { color: '#374151', font: { size: 11, weight: '500' } },
                            grid: { display: false },
                            border: { display: false }
                        }
                    }
                }
            });
        })();

        /* ── 2. Doughnut : admissions ── */
        (function () {
            const ctx = document.getElementById('admissionsChart');
            if (!ctx) return;

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: data.admissions.labels,
                    datasets: [{
                        data: data.admissions.values,
                        backgroundColor: ['#10b981', '#f59e0b', '#ef4444'],
                        hoverBackgroundColor: ['#059669', '#d97706', '#dc2626'],
                        borderWidth: 3,
                        borderColor: '#ffffff',
                        hoverOffset: 8,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '72%',
                    animation: { animateRotate: true, duration: 900, easing: 'easeOutQuart' },
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            ...tooltip,
                            callbacks: {
                                label: ctx => ` ${ctx.label} : ${ctx.parsed} (${Math.round(ctx.parsed / ctx.dataset.data.reduce((a, b) => a + b, 0) * 100)}%)`
                            }
                        }
                    }
                }
            });
        })();

        /* ── 3. Line chart : inscriptions ── */
        (function () {
            const ctx = document.getElementById('inscriptionsChart');
            if (!ctx) return;
            const c = ctx.getContext('2d');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: data.inscriptions.labels,
                    datasets: [{
                        label: 'Inscriptions',
                        data: data.inscriptions.values,
                        borderColor: '#f59e0b',
                        backgroundColor: function(context) {
                            const chart = context.chart;
                            const {ctx: c, chartArea} = chart;
                            if (!chartArea) return 'rgba(245,158,11,0.08)';
                            const g = c.createLinearGradient(0, chartArea.top, 0, chartArea.bottom);
                            g.addColorStop(0, 'rgba(245,158,11,0.25)');
                            g.addColorStop(1, 'rgba(245,158,11,0.00)');
                            return g;
                        },
                        pointBackgroundColor: '#f59e0b',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2.5,
                        pointRadius: 5,
                        pointHoverRadius: 8,
                        pointHoverBorderWidth: 3,
                        tension: 0.45,
                        fill: true,
                        borderWidth: 2.5,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    animation: { duration: 900, easing: 'easeOutQuart' },
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            ...tooltip,
                            callbacks: {
                                label: ctx => ` ${ctx.parsed.y} inscription${ctx.parsed.y > 1 ? 's' : ''}`
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: { precision: 0, color: '#9ca3af', font: { size: 11 } },
                            grid: { color: 'rgba(0,0,0,0.04)', drawBorder: false },
                            border: { display: false }
                        },
                        x: {
                            ticks: { color: '#374151', font: { size: 11 } },
                            grid: { display: false },
                            border: { display: false }
                        }
                    }
                }
            });
        })();

        /* ── 4. Doughnut : genre ── */
        (function () {
            const ctx = document.getElementById('genderChart');
            if (!ctx) return;

            const labelMap = { masculin: 'Masculin', feminin: 'Féminin' };
            const labels = data.gender.labels.map(l => labelMap[l] || l);

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data.gender.values,
                        backgroundColor: ['#3b82f6', '#ec4899'],
                        hoverBackgroundColor: ['#2563eb', '#db2777'],
                        borderWidth: 3,
                        borderColor: '#ffffff',
                        hoverOffset: 8,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '72%',
                    animation: { animateRotate: true, duration: 900, easing: 'easeOutQuart' },
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            ...tooltip,
                            callbacks: {
                                label: ctx => ` ${ctx.label} : ${ctx.parsed} (${Math.round(ctx.parsed / ctx.dataset.data.reduce((a, b) => a + b, 0) * 100)}%)`
                            }
                        }
                    }
                }
            });
        })();

    })();
    </script>

</x-app-layout>
