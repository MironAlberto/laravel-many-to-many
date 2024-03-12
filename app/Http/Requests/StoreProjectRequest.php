<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Helpers
use Illuminate\Support\Facades\Auth;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'url' => 'nullable|max:1024|url',
            'title' => 'required|max:255',
            /* 'slug' => 'required|unique:users', */
            'content' => 'nullable|max:4000',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'nullable|array|exists:technologies,id',
            'cover_image' => 'nullable|image'
        ];
    }

    public function messages(): array 
    {
        return [
            'url.max' => 'La url deve avere una lunghezza massima di 1024 caratteri',
            'url.url' => 'La url deve essere un link URL',
            'title.required' => 'Il titolo è obbligatorio',
            'title.max' => 'Il titolo deve avere un massimo di 255 caratteri',
            /* 'slug.required' => 'Lo slug è obbligatorio',
            'slug.unique' => 'Lo slug è unico', */
            'content.max' => 'Il content deve avere un massimo di 4000 caratteri',
            'cover_image.image' => 'Il file deve essere una immagine'
        ];
    }
}
