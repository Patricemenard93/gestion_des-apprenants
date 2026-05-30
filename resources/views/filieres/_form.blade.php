<div class="row g-3">
    <div class="col-12">
        <label class="form-label" for="nom">Nom de la filière</label>
        <input class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" type="text" value="{{ old('nom', $filiere->nom ?? '') }}" required>
        @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="duree">Durée</label>
        <input class="form-control @error('duree') is-invalid @enderror" id="duree" name="duree" type="text" value="{{ old('duree', $filiere->duree ?? '') }}" placeholder="Ex : 12 mois" required>
        @error('duree') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="description">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5">{{ old('description', $filiere->description ?? '') }}</textarea>
        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>
