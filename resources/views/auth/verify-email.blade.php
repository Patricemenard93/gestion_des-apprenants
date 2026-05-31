<x-guest-layout>
    <div class="auth-form-header">
        <div class="auth-form-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        </div>
        <div>
            <p class="auth-form-eyebrow">Vérification</p>
            <h2 class="auth-form-title">Confirmez votre adresse e-mail</h2>
            <p class="auth-form-subtitle">Avant de continuer, consultez votre messagerie et cliquez sur le lien de confirmation envoyé à votre adresse.</p>
        </div>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="auth-status-msg">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
            Un nouveau lien de vérification a été envoyé à votre adresse e-mail.
        </div>
    @endif

    <div class="d-grid gap-2 mt-2">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button class="auth-submit-btn w-100" type="submit">
                <span>Renvoyer le lien de vérification</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-secondary w-100" type="submit">Se déconnecter</button>
        </form>
    </div>
</x-guest-layout>
