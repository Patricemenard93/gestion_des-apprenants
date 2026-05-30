<x-guest-layout>
    <div class="mb-4">
        <p class="section-label mb-2">Inscription</p>
        <h2 class="h2 mb-2">Créer un compte utilisateur</h2>
        <p class="text-muted mb-0">Les nouveaux comptes sont créés avec un accès en consultation. Les droits d'administration restent réservés.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="row g-3">
        @csrf
        <div class="col-12">
            <label class="form-label" for="name">Nom complet</label>
            <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" value="{{ old('name') }}" required autofocus>
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-12">
            <label class="form-label" for="email">Adresse e-mail</label>
            <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ old('email') }}" required>
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label" for="password">Mot de passe</label>
            <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" required>
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label" for="password_confirmation">Confirmation</label>
            <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" required>
        </div>
        <div class="col-12 d-grid">
            <button class="btn btn-primary btn-lg" type="submit">Créer le compte</button>
        </div>
        <div class="col-12 text-center text-muted">
            Déjà inscrit ?
            <a href="{{ route('login') }}" class="text-decoration-none">Se connecter</a>
        </div>
    </form>
</x-guest-layout>
