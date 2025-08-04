<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFavoriteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tmdb_id' => ['required', 'integer', 'unique:favorites,tmdb_id'],
            'title' => ['required', 'string'],
            'poster_path' => ['required', 'string'],
            'genre_ids' => ['required', 'array']
        ];
    }

    public function messages(): array
    {
        return [
            'tmdb_id.unique' => 'O filme já se encontra favoritado.'
        ];
    }
}
