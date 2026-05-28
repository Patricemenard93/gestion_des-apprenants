<x-guest-layout>
    <div class="mb-4">
        <p class="section-label mb-2">Recuperation</p>
        <h2 class="h2 mb-2">Reinitialiser le mot de passe</h2>
        <p class="text-muted mb-0">Saisissez votre adresse e-mail pour recevoir un lien de reinitialisation.</p>
    </div>

    <form method="POST" action="{{ route('password.email') }}" class="row g-3">
        @csrf
        <div class="col-12">
            <label class="form-label" for="email">Adresse e-mail</label>
            <input class="form-control" id="email" name="email" type="email" value="{{ old('email') }}" required autofocus>
        </div>
        <div class="col-12 d-grid">
            <button class="btn btn-primary" type="submit">Envoyer le lien</button>
        </div>
    </form>
</x-guest-layout>
