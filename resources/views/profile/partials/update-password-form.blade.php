<div>
    <h2 class="h4 mb-3">Changer le mot de passe</h2>
    <form method="post" action="{{ route('password.update') }}" class="row g-3">
        @csrf
        @method('put')
        <div class="col-12">
            <label class="form-label" for="update_password_current_password">Mot de passe actuel</label>
            <input class="form-control" id="update_password_current_password" name="current_password" type="password" required>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="update_password_password">Nouveau mot de passe</label>
            <input class="form-control" id="update_password_password" name="password" type="password" required>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="update_password_password_confirmation">Confirmation</label>
            <input class="form-control" id="update_password_password_confirmation" name="password_confirmation" type="password" required>
        </div>
        <div class="col-12 d-flex gap-3 align-items-center">
            <button class="btn btn-primary" type="submit">Mettre a jour</button>
            @if (session('status') === 'password-updated')
                <span class="text-success small">Mot de passe mis a jour.</span>
            @endif
        </div>
    </form>
</div>
