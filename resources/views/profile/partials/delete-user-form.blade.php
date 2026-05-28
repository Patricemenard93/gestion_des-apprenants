<div>
    <h2 class="h4 mb-3 text-danger">Supprimer le compte</h2>
    <p class="text-muted">Cette action est definitive. Saisissez votre mot de passe pour confirmer.</p>
    <form method="post" action="{{ route('profile.destroy') }}" class="row g-3">
        @csrf
        @method('delete')
        <div class="col-md-8">
            <label class="form-label" for="password_delete">Mot de passe</label>
            <input class="form-control" id="password_delete" name="password" type="password" required>
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <button class="btn btn-outline-danger w-100" type="submit" onclick="return confirm('Supprimer definitivement ce compte ?')">Supprimer</button>
        </div>
    </form>
</div>
