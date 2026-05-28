<x-guest-layout>
    <div class="mb-4">
        <p class="section-label mb-2">Confirmation</p>
        <h2 class="h2 mb-2">Confirmer le mot de passe</h2>
        <p class="text-muted mb-0">Pour des raisons de securite, merci de confirmer votre mot de passe avant de poursuivre.</p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="row g-3">
        @csrf
        <div class="col-12">
            <label class="form-label" for="password">Mot de passe</label>
            <input class="form-control" id="password" name="password" type="password" required autofocus>
        </div>
        <div class="col-12 d-grid">
            <button class="btn btn-primary" type="submit">Confirmer</button>
        </div>
    </form>
</x-guest-layout>
