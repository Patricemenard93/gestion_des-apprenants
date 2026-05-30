<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNoteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isAdmin() ?? false;
    }

    public function rules(): array
    {
        return [
            'apprenant_id' => ['required', 'exists:apprenants,id'],
            'module' => ['required', 'string', 'max:150'],
            'note' => ['required', 'numeric', 'between:0,20'],
            'coefficient' => ['required', 'integer', 'between:1,10'],
        ];
    }

    public function messages(): array
    {
        return [
            'note.between' => 'La note doit être comprise entre 0 et 20.',
            'coefficient.between' => 'Le coefficient doit être compris entre 1 et 10.',
            'apprenant_id.exists' => 'L\'apprenant sélectionné n\'existe pas.',
        ];
    }
}
