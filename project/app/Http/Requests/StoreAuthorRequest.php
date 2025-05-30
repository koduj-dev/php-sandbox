<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthorRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'primary_genre' => 'required|string',
            'bio' => 'required|string|min:10',
            'photo_url' => 'required|string|url',
            'born_at' => 'required|date|before: now',
            'died_at' => 'nullable|date|after: born_at'
        ];
    }
}
