<div class="row g-3">
    <div class="col-md-4">
        <label class="form-label" for="matricule">Matricule</label>
        <input class="form-control @error('matricule') is-invalid @enderror" id="matricule" name="matricule" type="text" value="{{ old('matricule', $apprenant->matricule ?? '') }}" required>
        @error('matricule') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label" for="nom">Nom</label>
        <input class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" type="text" value="{{ old('nom', $apprenant->nom ?? '') }}" required>
        @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label" for="prenom">Prénom</label>
        <input class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" type="text" value="{{ old('prenom', $apprenant->prenom ?? '') }}" required>
        @error('prenom') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label" for="sexe">Sexe</label>
        <select class="form-select @error('sexe') is-invalid @enderror" id="sexe" name="sexe" required>
            <option value="">Sélectionner</option>
            @foreach(['masculin' => 'Masculin', 'feminin' => 'Féminin'] as $value => $label)
                <option value="{{ $value }}" @selected(old('sexe', isset($apprenant) ? $apprenant->sexe->value : '') === $value)>{{ $label }}</option>
            @endforeach
        </select>
        @error('sexe') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label" for="date_naissance">Date de naissance</label>
        <input class="form-control @error('date_naissance') is-invalid @enderror" id="date_naissance" name="date_naissance" type="date" value="{{ old('date_naissance', isset($apprenant) ? $apprenant->date_naissance->format('Y-m-d') : '') }}" required>
        @error('date_naissance') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label" for="date_inscription">Date d'inscription</label>
        <input class="form-control @error('date_inscription') is-invalid @enderror" id="date_inscription" name="date_inscription" type="date" value="{{ old('date_inscription', isset($apprenant) ? $apprenant->date_inscription->format('Y-m-d') : now()->format('Y-m-d')) }}" required>
        @error('date_inscription') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="email">Adresse e-mail</label>
        <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ old('email', $apprenant->email ?? '') }}" required>
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="telephone">Téléphone</label>
        <input class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" type="text" value="{{ old('telephone', $apprenant->telephone ?? '') }}" required>
        @error('telephone') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="filiere_id">Filière</label>
        <select class="form-select @error('filiere_id') is-invalid @enderror" id="filiere_id" name="filiere_id" required>
            <option value="">Sélectionner une filière</option>
            @foreach($filieres as $filiere)
                <option value="{{ $filiere->id }}" @selected((string) old('filiere_id', $apprenant->filiere_id ?? '') === (string) $filiere->id)>{{ $filiere->nom }}</option>
            @endforeach
        </select>
        @error('filiere_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="photo">Photo</label>
        <input class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" type="file" accept="image/*" {{ isset($apprenant) ? '' : 'required' }}>
        @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
        @if(isset($apprenant) && $apprenant->photo)
            <div class="mt-2">
                <img src="{{ $apprenant->photo_url }}" alt="Photo actuelle" class="photo-thumb">
                <small class="text-muted ms-2">Photo actuelle (laisser vide pour conserver)</small>
            </div>
        @endif
    </div>
    <div class="col-12">
        <label class="form-label" for="adresse">Adresse</label>
        <textarea class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse" rows="4" required>{{ old('adresse', $apprenant->adresse ?? '') }}</textarea>
        @error('adresse') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>
