<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label" for="apprenant_id">Apprenant</label>
        <select class="form-select @error('apprenant_id') is-invalid @enderror" id="apprenant_id" name="apprenant_id" required>
            <option value="">Sélectionner un apprenant</option>
            @foreach($apprenants as $apprenantOption)
                <option value="{{ $apprenantOption->id }}" @selected((string) old('apprenant_id', $note->apprenant_id ?? ($selectedApprenant ?? '')) === (string) $apprenantOption->id)>
                    {{ $apprenantOption->nom_complet }} - {{ $apprenantOption->matricule }}
                </option>
            @endforeach
        </select>
        @error('apprenant_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="module">Module</label>
        <input class="form-control @error('module') is-invalid @enderror" id="module" name="module" type="text" value="{{ old('module', $note->module ?? '') }}" required>
        @error('module') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="note">Note / 20</label>
        <input class="form-control @error('note') is-invalid @enderror" id="note" name="note" type="number" min="0" max="20" step="0.01" value="{{ old('note', $note->note ?? '') }}" required>
        @error('note') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="coefficient">Coefficient</label>
        <input class="form-control @error('coefficient') is-invalid @enderror" id="coefficient" name="coefficient" type="number" min="1" max="10" step="1" value="{{ old('coefficient', $note->coefficient ?? 1) }}" required>
        @error('coefficient') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>
