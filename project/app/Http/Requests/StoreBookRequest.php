<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|max:255',
            'isbn' => 'required|string|min:10|max:13',
            'author_id' => 'required|exists:authors,id',
            'description' => 'required|string|min:5',
            'cover_url' => 'required|string|url',
            'published_at' => 'required|digits:4|integer|min:1000|max:'.now()->year,
        ];
    }
}
