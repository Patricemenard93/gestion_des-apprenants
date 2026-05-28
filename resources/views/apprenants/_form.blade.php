<div class="row g-3">
    <div class="col-md-4">
        <label class="form-label" for="matricule">Matricule</label>
        <input class="form-control" id="matricule" name="matricule" type="text" value="{{ old('matricule', isset($apprenant) ? $apprenant->matricule : '') }}" required>
    </div>
    <div class="col-md-4">
        <label class="form-label" for="nom">Nom</label>
        <input class="form-control" id="nom" name="nom" type="text" value="{{ old('nom', isset($apprenant) ? $apprenant->nom : '') }}" required>
    </div>
    <div class="col-md-4">
        <label class="form-label" for="prenom">Prenom</label>
        <input class="form-control" id="prenom" name="prenom" type="text" value="{{ old('prenom', isset($apprenant) ? $apprenant->prenom : '') }}" required>
    </div>
    <div class="col-md-4">
        <label class="form-label" for="sexe">Sexe</label>
        <select class="form-select" id="sexe" name="sexe" required>
            <option value="">Selectionner</option>
            @foreach(['masculin' => 'Masculin', 'feminin' => 'Feminin'] as $value => $label)
                <option value="{{ $value }}" @selected(old('sexe', isset($apprenant) ? $apprenant->sexe->value : '') === $value)>{{ $label }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label" for="date_naissance">Date de naissance</label>
        <input class="form-control" id="date_naissance" name="date_naissance" type="date" value="{{ old('date_naissance', isset($apprenant) ? $apprenant->date_naissance->format('Y-m-d') : '') }}" required>
    </div>
    <div class="col-md-4">
        <label class="form-label" for="date_inscription">Date d'inscription</label>
        <input class="form-control" id="date_inscription" name="date_inscription" type="date" value="{{ old('date_inscription', isset($apprenant) ? $apprenant->date_inscription->format('Y-m-d') : now()->format('Y-m-d')) }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="email">Adresse e-mail</label>
        <input class="form-control" id="email" name="email" type="email" value="{{ old('email', isset($apprenant) ? $apprenant->email : '') }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="telephone">Telephone</label>
        <input class="form-control" id="telephone" name="telephone" type="text" value="{{ old('telephone', isset($apprenant) ? $apprenant->telephone : '') }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="filiere_id">Filiere</label>
        <select class="form-select" id="filiere_id" name="filiere_id" required>
            <option value="">Selectionner une filiere</option>
            @foreach($filieres as $filiere)
                <option value="{{ $filiere->id }}" @selected((string) old('filiere_id', isset($apprenant) ? $apprenant->filiere_id : '') === (string) $filiere->id)>{{ $filiere->nom }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="photo">Photo</label>
        <input class="form-control" id="photo" name="photo" type="file" {{ isset($apprenant) ? '' : 'required' }}>
    </div>
    <div class="col-12">
        <label class="form-label" for="adresse">Adresse</label>
        <textarea class="form-control" id="adresse" name="adresse" rows="4" required>{{ old('adresse', isset($apprenant) ? $apprenant->adresse : '') }}</textarea>
    </div>
</div>
