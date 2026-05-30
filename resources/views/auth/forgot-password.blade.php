<x-guest-layout>
    <div class="mb-4">
        <p class="section-label mb-2">Récupération</p>
        <h2 class="h2 mb-2">Réinitialiser le mot de passe</h2>
        <p class="text-muted mb-0">Saisissez votre adresse e-mail pour recevoir un lien de réinitialisation.</p>
    </div>

    <form method="POST" action="{{ route('password.email') }}" class="row g-3">
        @csrf
        <div class="col-12">
            <label class="form-label" for="email">Adresse e-mail</label>
            <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ old('email') }}" required autofocus>
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-12 d-grid">
            <button class="btn btn-primary" type="submit">Envoyer le lien</button>
        </div>
    </form>
</x-guest-layout>
