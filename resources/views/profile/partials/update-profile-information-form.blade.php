<div>
    <h2 class="h4 mb-3">Informations du profil</h2>
    <form method="post" action="{{ route('profile.update') }}" class="row g-3">
        @csrf
        @method('patch')
        <div class="col-12">
            <label class="form-label" for="name">Nom</label>
            <input class="form-control" id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required>
        </div>
        <div class="col-12">
            <label class="form-label" for="email">Adresse e-mail</label>
            <input class="form-control" id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required>
        </div>
        <div class="col-12 d-flex gap-3 align-items-center">
            <button class="btn btn-primary" type="submit">Enregistrer</button>
            @if (session('status') === 'profile-updated')
                <span class="text-success small">Profil mis a jour.</span>
            @endif
        </div>
    </form>
</div>
