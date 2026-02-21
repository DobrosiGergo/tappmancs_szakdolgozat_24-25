<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name'         => ['required', 'string', 'max:255'],
            'species_id'   => ['required', 'exists:species,id'],
            'breed_id'     => ['required', 'exists:breeds,id'],
            'age'          => ['required', 'numeric', 'min:0', 'max:20'],
            'arrival_date' => ['required', 'date'],
            'status'       => ['nullable', 'in:adopted,free'],
            'description'  => ['required', 'string'],
            'images'       => ['nullable', 'array', 'max:10'],
            'images.*'     => ['nullable', 'image', 'max:4096'],
        ];
    }
}
