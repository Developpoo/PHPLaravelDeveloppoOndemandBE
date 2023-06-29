<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class FilmStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "idFilm" => "required|integer",
            "titolo" => "required|string|max:255",
            "descrizione" => "required|string",
            "durata" => "integer",
            "regista" => "string|max:45",
            "attori" => "string|max:255",
            "anno" => "integer | max:" . date("Y"),
            "idImg" => "integer|max:10",
            "idFilmato" => "integer|max:10",
            "idTrailer" => "integer|max:10"
        ];
    }
}
