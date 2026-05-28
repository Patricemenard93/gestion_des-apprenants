<x-guest-layout>
    <div class="mb-4">
        <p class="section-label mb-2">Nouveau mot de passe</p>
        <h2 class="h2 mb-2">Definir un nouveau secret</h2>
    </div>

    <form method="POST" action="{{ route('password.store') }}" class="row g-3">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div class="col-12">
            <label class="form-label" for="email">Adresse e-mail</label>
            <input class="form-control" id="email" name="email" type="email" value="{{ old('email', $request->email) }}" required>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="password">Mot de passe</label>
            <input class="form-control" id="password" name="password" type="password" required>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="password_confirmation">Confirmation</label>
            <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" required>
        </div>
        <div class="col-12 d-grid">
            <button class="btn btn-primary" type="submit">Mettre a jour le mot de passe</button>
        </div>
    </form>
</x-guest-layout>
