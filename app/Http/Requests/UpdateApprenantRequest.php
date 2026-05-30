<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApprenantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isAdmin() ?? false;
    }

    public function rules(): array
    {
        $apprenant = $this->route('apprenant');

        return [
            'matricule' => ['required', 'string', 'max:50', 'unique:apprenants,matricule,'.$apprenant->id],
            'nom' => ['required', 'string', 'max:100'],
            'prenom' => ['required', 'string', 'max:100'],
            'sexe' => ['required', 'in:masculin,feminin'],
            'date_naissance' => ['required', 'date', 'before:today'],
            'email' => ['required', 'email:rfc,dns', 'max:150', 'unique:apprenants,email,'.$apprenant->id],
            'telephone' => ['required', 'string', 'max:30'],
            'adresse' => ['required', 'string', 'max:2000'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'date_inscription' => ['required', 'date'],
            'filiere_id' => ['required', 'exists:filieres,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'matricule.unique' => 'Ce matricule est déjà attribué à un autre apprenant.',
            'email.unique' => 'Cette adresse e-mail est déjà utilisée.',
            'photo.image' => 'Le fichier doit être une image (JPG, PNG ou WebP).',
            'photo.max' => 'La photo ne doit pas dépasser 2 Mo.',
            'date_naissance.before' => 'La date de naissance doit être antérieure à aujourd\'hui.',
            'filiere_id.exists' => 'La filière sélectionnée n\'existe pas.',
        ];
    }
}
