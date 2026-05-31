<x-guest-layout>
    <div class="auth-form-header">
        <div class="auth-form-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
        </div>
        <div>
            <p class="auth-form-eyebrow">Nouveau compte</p>
            <h2 class="auth-form-title">Créer votre accès</h2>
            <p class="auth-form-subtitle">Les nouveaux comptes ont un accès en consultation. Les droits admin sont accordés par un administrateur.</p>
        </div>
    </div>

    <form method="POST" action="{{ route('register') }}" class="auth-form" novalidate>
        @csrf

        <div class="auth-field">
            <label class="auth-label" for="name">Nom complet</label>
            <div class="auth-input-wrap">
                <span class="auth-input-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </span>
                <input
                    class="auth-input @error('name') is-invalid @enderror"
                    id="name" name="name" type="text"
                    value="{{ old('name') }}"
                    placeholder="Prénom Nom"
                    required autofocus autocomplete="name"
                >
            </div>
            @error('name')
                <p class="auth-field-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="auth-field">
            <label class="auth-label" for="email">Adresse e-mail</label>
            <div class="auth-input-wrap">
                <span class="auth-input-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                </span>
                <input
                    class="auth-input @error('email') is-invalid @enderror"
                    id="email" name="email" type="email"
                    value="{{ old('email') }}"
                    placeholder="votre@email.com"
                    required autocomplete="email"
                >
            </div>
            @error('email')
                <p class="auth-field-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="row g-3">
            <div class="col-12 col-sm-6">
                <div class="auth-field mb-0">
                    <label class="auth-label" for="password">Mot de passe</label>
                    <div class="auth-input-wrap">
                        <span class="auth-input-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        </span>
                        <input
                            class="auth-input @error('password') is-invalid @enderror"
                            id="password" name="password" type="password"
                            placeholder="Min. 8 caractères"
                            required autocomplete="new-password"
                        >
                        <button type="button" class="auth-eye-btn" onclick="togglePassword('password', this)" aria-label="Afficher">
                            <svg class="eye-show" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            <svg class="eye-hide d-none" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="auth-field-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="auth-field mb-0">
                    <label class="auth-label" for="password_confirmation">Confirmation</label>
                    <div class="auth-input-wrap">
                        <span class="auth-input-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                        </span>
                        <input
                            class="auth-input"
                            id="password_confirmation" name="password_confirmation" type="password"
                            placeholder="Répéter"
                            required autocomplete="new-password"
                        >
                    </div>
                </div>
            </div>
        </div>

        <button class="auth-submit-btn mt-2" type="submit">
            <span>Créer le compte</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </button>

        <p class="auth-switch-link">
            Déjà inscrit ?
            <a href="{{ route('login') }}">Se connecter</a>
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
    </script>
</x-guest-layout>
