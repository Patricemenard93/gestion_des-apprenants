@php
    $user = auth()->user();
    $notifications = $user?->latestNotifications()->limit(5)->get() ?? collect();
    $unreadCount = $user?->unreadNotifications()->count() ?? 0;
@endphp

<nav class="navbar navbar-expand-lg topbar navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-3" href="{{ route('dashboard') }}">
            <span class="brand-mark">C</span>
            <span>
                <span class="d-block fw-bold">CFTP-L2C</span>
                <span class="small text-white-50">Gestion des apprenants</span>
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#appNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="appNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                @foreach ([
                    'dashboard' => 'Tableau de bord',
                    'filieres.index' => 'Filières',
                    'apprenants.index' => 'Apprenants',
                    'notes.index' => 'Notes',
                ] as $route => $label)
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs($route) ? 'active' : '' }}" href="{{ route($route) }}">{{ $label }}</a>
                    </li>
                @endforeach

                <li class="nav-item dropdown">
                    <button class="btn btn-sm btn-outline-light position-relative dropdown-toggle" data-bs-toggle="dropdown">
                        Notifications
                        @if($unreadCount > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-warning">{{ $unreadCount }}</span>
                        @endif
                    </button>
                    <div class="dropdown-menu dropdown-menu-end p-0 overflow-hidden" style="width: 22rem;">
                        <div class="p-3 border-bottom">
                            <div class="fw-semibold">Activité récente</div>
                        </div>
                        @forelse($notifications as $notification)
                            <a href="{{ $notification->data['url'] ?? '#' }}" class="dropdown-item py-3">
                                <div class="fw-semibold">{{ $notification->data['title'] ?? 'Notification' }}</div>
                                <div class="small text-muted">{{ $notification->data['message'] ?? '' }}</div>
                            </a>
                        @empty
                            <div class="p-3 small text-muted">Aucune notification disponible.</div>
                        @endforelse
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <button class="btn btn-sm btn-light dropdown-toggle" data-bs-toggle="dropdown">
                        {{ $user?->name }}
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">Profil</a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Déconnexion</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
