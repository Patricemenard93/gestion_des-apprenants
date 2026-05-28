<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFiliereRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isAdmin() ?? false;
    }

    public function rules(): array
    {
        return [
            'nom' => ['required', 'string', 'max:150', 'unique:filieres,nom'],
            'description' => ['nullable', 'string', 'max:2000'],
            'duree' => ['required', 'string', 'max:120'],
        ];
    }
}
