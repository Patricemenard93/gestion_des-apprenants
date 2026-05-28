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
}
