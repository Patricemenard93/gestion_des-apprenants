@php
    $user = auth()->user();
@endphp

<aside class="app-sidebar">
    {{-- Brand --}}
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}" class="sidebar-brand-link">
            <img src="{{ asset('logo.png') }}" alt="Logo CFTP-L2C" class="sidebar-logo-img">
            <div class="sidebar-brand-text">
                <span class="sidebar-brand-name">CFTP-L2C</span>
                <span class="sidebar-brand-sub">Centre de Formation</span>
            </div>
        </a>
    </div>

    {{-- Navigation --}}
    <nav class="sidebar-nav">
        <div class="sidebar-section-label">Menu principal</div>

        <a href="{{ route('dashboard') }}" class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
            <span>Tableau de bord</span>
        </a>

        <a href="{{ route('filieres.index') }}" class="sidebar-item {{ request()->routeIs('filieres.*') ? 'active' : '' }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
            <span>Filieres</span>
        </a>

        <a href="{{ route('apprenants.index') }}" class="sidebar-item {{ request()->routeIs('apprenants.*') ? 'active' : '' }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            <span>Apprenants</span>
        </a>

        <a href="{{ route('notes.index') }}" class="sidebar-item {{ request()->routeIs('notes.*') ? 'active' : '' }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
            <span>Notes</span>
        </a>

        @if($user?->isAdmin())
        <div class="sidebar-section-label mt-4">Administration</div>

        <a href="{{ route('users.index') }}" class="sidebar-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M6 20v-2a6 6 0 0 1 12 0v2"/></svg>
            <span>Utilisateurs</span>
        </a>
        @endif

        <div class="sidebar-section-label mt-4">Exports</div>

        <a href="{{ route('exports.apprenants.pdf') }}" class="sidebar-item">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
            <span>Export PDF</span>
        </a>

        <a href="{{ route('exports.apprenants.excel') }}" class="sidebar-item">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/><polyline points="13 2 13 9 20 9"/></svg>
            <span>Export Excel</span>
        </a>
    </nav>

    {{-- User section --}}
    <div class="sidebar-footer">
        <div class="sidebar-user">
            <div class="sidebar-user-avatar">{{ strtoupper(substr($user?->name ?? 'U', 0, 1)) }}</div>
            <div class="sidebar-user-info">
                <span class="sidebar-user-name">{{ $user?->name }}</span>
                <span class="sidebar-user-role">{{ $user?->role->label() ?? 'Utilisateur' }}</span>
            </div>
        </div>
    </div>
</aside>
