<x-guest-layout>
    <div class="mb-4">
        <p class="section-label mb-2">Connexion</p>
        <h2 class="h2 mb-2">Acceder a l'espace de gestion</h2>
        <p class="text-muted mb-0">Connectez-vous pour gerer les filieres, apprenants, notes et exports du centre.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="row g-3">
        @csrf
        <div class="col-12">
            <label class="form-label" for="email">Adresse e-mail</label>
            <input class="form-control" id="email" name="email" type="email" value="{{ old('email') }}" required autofocus>
        </div>
        <div class="col-12">
            <label class="form-label" for="password">Mot de passe</label>
            <input class="form-control" id="password" name="password" type="password" required>
        </div>
        <div class="col-12 d-flex justify-content-between align-items-center">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                <label class="form-check-label" for="remember_me">Se souvenir de moi</label>
            </div>
            <a class="small text-decoration-none" href="{{ route('password.request') }}">Mot de passe oublie</a>
        </div>
        <div class="col-12 d-grid">
            <button class="btn btn-primary btn-lg" type="submit">Se connecter</button>
        </div>
        <div class="col-12 text-center text-muted">
            Pas encore de compte ?
            <a href="{{ route('register') }}" class="text-decoration-none">Creer un compte</a>
        </div>
    </form>
</x-guest-layout>
