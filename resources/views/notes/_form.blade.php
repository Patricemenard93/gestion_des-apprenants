<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label" for="apprenant_id">Apprenant</label>
        <select class="form-select" id="apprenant_id" name="apprenant_id" required>
            <option value="">Selectionner un apprenant</option>
            @foreach($apprenants as $apprenantOption)
                <option value="{{ $apprenantOption->id }}" @selected((string) old('apprenant_id', isset($note) ? $note->apprenant_id : ($selectedApprenant ?? '')) === (string) $apprenantOption->id)>
                    {{ $apprenantOption->nom_complet }} - {{ $apprenantOption->matricule }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="module">Module</label>
        <input class="form-control" id="module" name="module" type="text" value="{{ old('module', isset($note) ? $note->module : '') }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="note">Note / 20</label>
        <input class="form-control" id="note" name="note" type="number" min="0" max="20" step="0.01" value="{{ old('note', isset($note) ? $note->note : '') }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="coefficient">Coefficient</label>
        <input class="form-control" id="coefficient" name="coefficient" type="number" min="1" max="10" step="1" value="{{ old('coefficient', isset($note) ? $note->coefficient : 1) }}" required>
    </div>
</div>
