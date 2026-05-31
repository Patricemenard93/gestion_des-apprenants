<x-guest-layout>
    <div class="auth-form-header">
        <div class="auth-form-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
        </div>
        <div>
            <p class="auth-form-eyebrow">Authentification</p>
            <h2 class="auth-form-title">Connexion à votre espace</h2>
            <p class="auth-form-subtitle">Accès réservé au personnel autorisé.</p>
        </div>
    </div>

    {{-- Lockout banner --}}
    @if($lockedOut)
        <div class="auth-lockout-banner" id="lockoutBanner" data-seconds="{{ $lockedSeconds }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            <div>
                <strong>Accès temporairement bloqué</strong>
                <span>Réessayez dans <span id="lockoutTimer">{{ $lockedSeconds }}</span> s</span>
            </div>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="auth-form" novalidate>
        @csrf

        {{-- Generic error (no field distinction for security) --}}
        @if ($errors->any() && !$lockedOut)
            <div class="auth-error-banner">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                <div>
                    <strong>Identifiants incorrects.</strong>
                    @if(!is_null($attemptsLeft) && $attemptsLeft > 0)
                        <span>Il vous reste <strong>{{ $attemptsLeft }}</strong> tentative{{ $attemptsLeft > 1 ? 's' : '' }} avant blocage.</span>
                    @elseif(!is_null($attemptsLeft) && $attemptsLeft === 0)
                        <span>Compte bloqué. Réessayez dans 6 minutes.</span>
                    @endif
                </div>
            </div>
        @endif

        @if ($lockedOut)
            <div class="auth-error-banner">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                <span>{{ $errors->first('email') }}</span>
            </div>
        @endif

        <div class="auth-field">
            <label class="auth-label" for="email">Adresse e-mail</label>
            <div class="auth-input-wrap">
                <span class="auth-input-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                </span>
                <input
                    class="auth-input {{ $errors->any() ? 'is-invalid' : '' }}"
                    id="email" name="email" type="email"
                    value="{{ old('email') }}"
                    placeholder="votre@email.com"
                    required autofocus autocomplete="email"
                    {{ $lockedOut ? 'disabled' : '' }}
                >
            </div>
        </div>

        <div class="auth-field">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <label class="auth-label mb-0" for="password">Mot de passe</label>
                <a href="{{ route('password.request') }}" class="auth-forgot-link">Mot de passe oublié ?</a>
            </div>
            <div class="auth-input-wrap">
                <span class="auth-input-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                </span>
                <input
                    class="auth-input {{ $errors->any() ? 'is-invalid' : '' }}"
                    id="password" name="password" type="password"
                    placeholder="••••••••"
                    required autocomplete="current-password"
                    {{ $lockedOut ? 'disabled' : '' }}
                >
                <button type="button" class="auth-eye-btn" onclick="togglePassword('password', this)" aria-label="Afficher le mot de passe" {{ $lockedOut ? 'disabled' : '' }}>
                    <svg class="eye-show" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                    <svg class="eye-hide d-none" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                </button>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <label class="auth-check-label">
                <input type="checkbox" name="remember" id="remember_me" class="auth-check" {{ $lockedOut ? 'disabled' : '' }}>
                <span>Se souvenir de moi</span>
            </label>
        </div>

        <button class="auth-submit-btn" type="submit" {{ $lockedOut ? 'disabled' : '' }}>
            <span>Se connecter</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </button>

        <p class="auth-switch-link">
            Pas encore de compte ?
            <a href="{{ route('register') }}">Créer un compte</a>
        </p>
    </form>

    <script>
    function togglePassword(id, btn) {
        const input = document.getElementById(id);
        const isText = input.type === 'text';
        input.type = isText ? 'password' : 'text';
        btn.querySelector('.eye-show').classList.toggle('d-none', !isText);
        btn.querySelector('.eye-hide').classList.toggle('d-none', isText);
    }

    (function () {
        const banner = document.getElementById('lockoutBanner');
        if (!banner) return;
        let secs = parseInt(banner.dataset.seconds, 10);
        const el = document.getElementById('lockoutTimer');
        if (!el || secs <= 0) return;
        const interval = setInterval(function () {
            secs--;
            if (secs <= 0) {
                clearInterval(interval);
                window.location.reload();
            } else {
                el.textContent = secs;
            }
        }, 1000);
    })();
    </script>
</x-guest-layout>
