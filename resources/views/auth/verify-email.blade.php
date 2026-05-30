<x-guest-layout>
    <div class="mb-4">
        <p class="section-label mb-2">Vérification</p>
        <h2 class="h2 mb-2">Vérifier votre adresse e-mail</h2>
        <p class="text-muted mb-0">Avant de continuer, consultez votre messagerie puis confirmez votre adresse via le lien envoyé.</p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success">
            Un nouveau lien de vérification a été envoyé.
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}" class="d-grid gap-3">
        @csrf
        <button class="btn btn-primary" type="submit">Renvoyer le lien</button>
    </form>

    <form method="POST" action="{{ route('logout') }}" class="mt-3">
        @csrf
        <button class="btn btn-outline-secondary w-100" type="submit">Se déconnecter</button>
    </form>
</x-guest-layout>
