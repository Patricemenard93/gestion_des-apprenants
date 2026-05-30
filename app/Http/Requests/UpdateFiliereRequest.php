<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFiliereRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isAdmin() ?? false;
    }

    public function rules(): array
    {
        $filiere = $this->route('filiere');

        return [
            'nom' => ['required', 'string', 'max:150', 'unique:filieres,nom,'.$filiere->id],
            'description' => ['nullable', 'string', 'max:2000'],
            'duree' => ['required', 'string', 'max:120'],
        ];
    }

    public function messages(): array
    {
        return [
            'nom.unique' => 'Une filière avec ce nom existe déjà.',
        ];
    }
}
