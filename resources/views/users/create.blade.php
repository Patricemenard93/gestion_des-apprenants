<x-app-layout>
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary mb-2">&larr; Retour</a>
            <h1 class="h2 mb-0">Nouvel utilisateur</h1>
        </div>
    </div>

    <div class="content-card p-4" style="max-width: 600px;">
        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label" for="name">Nom complet <span class="text-danger">*</span></label>
                <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" value="{{ old('name') }}" required>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="email">Adresse e-mail <span class="text-danger">*</span></label>
                <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ old('email') }}" required>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="role">Rôle <span class="text-danger">*</span></label>
                <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                    <option value="">Sélectionner un rôle</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->value }}" @selected(old('role') === $role->value)>{{ $role->label() }}</option>
                    @endforeach
                </select>
                @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="password">Mot de passe <span class="text-danger">*</span></label>
                <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" required>
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="password_confirmation">Confirmer le mot de passe <span class="text-danger">*</span></label>
                <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" required>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Créer l'utilisateur</button>
                <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">Annuler</a>
            </div>
        </form>
    </div>
</x-app-layout>
