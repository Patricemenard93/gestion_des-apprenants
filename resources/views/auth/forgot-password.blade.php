<x-guest-layout>
    <div class="auth-form-header">
        <div class="auth-form-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        </div>
        <div>
            <p class="auth-form-eyebrow">Récupération</p>
            <h2 class="auth-form-title">Mot de passe oublié ?</h2>
            <p class="auth-form-subtitle">Saisissez votre adresse e-mail et nous vous enverrons un lien pour réinitialiser votre mot de passe.</p>
        </div>
    </div>

    @if (session('status'))
        <div class="auth-status-msg">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="auth-form" novalidate>
        @csrf

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
                    required autofocus autocomplete="email"
                >
            </div>
            @error('email')
                <p class="auth-field-error">{{ $message }}</p>
            @enderror
        </div>

        <button class="auth-submit-btn" type="submit">
            <span>Envoyer le lien de réinitialisation</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
        </button>

        <p class="auth-switch-link">
            <a href="{{ route('login') }}">← Retour à la connexion</a>
        </p>
    </form>
</x-guest-layout>
