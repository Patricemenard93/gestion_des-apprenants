@php
    $user = auth()->user();
    $notifications = $user?->latestNotifications()->limit(5)->get() ?? collect();
    $unreadCount = $user?->unreadNotifications()->count() ?? 0;
@endphp

<header class="app-topbar">
    <div class="topbar-left">
        <button class="topbar-toggle d-lg-none" onclick="document.body.classList.toggle('sidebar-open')">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
        </button>
        <div class="topbar-breadcrumb">
            @if(request()->routeIs('dashboard'))
                Tableau de bord
            @elseif(request()->routeIs('filieres.*'))
                Filières
            @elseif(request()->routeIs('apprenants.*'))
                Apprenants
            @elseif(request()->routeIs('notes.*'))
                Notes
            @elseif(request()->routeIs('users.*'))
                Utilisateurs
            @elseif(request()->routeIs('profile.*'))
                Profil
            @else
                CFTP-L2C
            @endif
        </div>
    </div>

    <div class="topbar-right">
        {{-- Notifications --}}
        <div class="dropdown">
            <button class="topbar-icon-btn position-relative" data-bs-toggle="dropdown">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                @if($unreadCount > 0)
                    <span class="topbar-badge">{{ $unreadCount }}</span>
                @endif
            </button>
            <div class="dropdown-menu dropdown-menu-end topbar-notif-menu p-0">
                <div class="topbar-notif-header">
                    <strong>Notifications</strong>
                    @if($unreadCount > 0)
                        <form method="POST" action="{{ route('notifications.markAllRead') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link btn-sm p-0 text-primary text-decoration-none" style="font-size: 12px;">Tout marquer lu</button>
                        </form>
                    @endif
                </div>
                @forelse($notifications as $notification)
                    <a href="{{ $notification->data['url'] ?? '#' }}" class="topbar-notif-item">
                        <div class="topbar-notif-dot {{ $notification->read_at ? '' : 'unread' }}"></div>
                        <div>
                            <div class="topbar-notif-title">{{ $notification->data['title'] ?? 'Notification' }}</div>
                            <div class="topbar-notif-msg">{{ $notification->data['message'] ?? '' }}</div>
                        </div>
                    </a>
                @empty
                    <div class="topbar-notif-empty">Aucune notification</div>
                @endforelse
            </div>
        </div>

        {{-- User dropdown --}}
        <div class="dropdown">
            <button class="topbar-user-btn dropdown-toggle" data-bs-toggle="dropdown">
                <span class="topbar-user-avatar">{{ strtoupper(substr($user?->name ?? 'U', 0, 1)) }}</span>
                <span class="topbar-user-name d-none d-md-inline">{{ $user?->name }}</span>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    Mon profil
                </a>
                <a class="dropdown-item" href="{{ route('home') }}">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    Site public
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                        Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
