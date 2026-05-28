<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApprenantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isAdmin() ?? false;
    }

    public function rules(): array
    {
        return [
            'matricule' => ['required', 'string', 'max:50', 'unique:apprenants,matricule'],
            'nom' => ['required', 'string', 'max:100'],
            'prenom' => ['required', 'string', 'max:100'],
            'sexe' => ['required', 'in:masculin,feminin'],
            'date_naissance' => ['required', 'date', 'before:today'],
            'email' => ['required', 'email:rfc,dns', 'max:150', 'unique:apprenants,email'],
            'telephone' => ['required', 'string', 'max:30'],
            'adresse' => ['required', 'string', 'max:2000'],
            'photo' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'date_inscription' => ['required', 'date'],
            'filiere_id' => ['required', 'exists:filieres,id'],
        ];
    }
}
