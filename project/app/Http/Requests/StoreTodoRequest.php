<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreTodoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $isPatch = request()->getMethod() === Request::METHOD_PATCH;

        return [
            'title' => ($isPatch ? 'sometimes|' : '') .'required|string|min:3|max:100',
            'content' => ($isPatch ? 'sometimes|' : '') .'required|string',
            'completed_at' => ($isPatch ? 'sometimes|' : '') .'nullable|date|after:created_at'
        ];
    }
}
