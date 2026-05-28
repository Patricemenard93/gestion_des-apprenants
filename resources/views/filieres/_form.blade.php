<div class="row g-3">
    <div class="col-12">
        <label class="form-label" for="nom">Nom de la filiere</label>
        <input class="form-control" id="nom" name="nom" type="text" value="{{ old('nom', isset($filiere) ? $filiere->nom : '') }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="duree">Duree</label>
        <input class="form-control" id="duree" name="duree" type="text" value="{{ old('duree', isset($filiere) ? $filiere->duree : '') }}" placeholder="Ex: 12 mois" required>
    </div>
    <div class="col-12">
        <label class="form-label" for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="5">{{ old('description', isset($filiere) ? $filiere->description : '') }}</textarea>
    </div>
</div>
