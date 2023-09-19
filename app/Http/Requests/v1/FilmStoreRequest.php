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
            // "idFilm" => "required|integer",
            "titolo" => "required|string|max:255",
            "descrizione" => "required|string",
            "durata" => "integer",
            "regista" => "string|max:45",
            "attori" => "string|max:255",
            "anno" => "integer|max:" . date("Y"),
            "icona" => "string|max:255",
            "file_data" => "array", // Accetta un array di dati del file
            "file_data.*.idTipoFile" => "required|integer", // Regole di validazione per l'ID del tipo di file
            "file_data.*.nome" => "string|max:45", // Regole di validazione per il nome del file
            "file_data.*.src" => "required|string|max:255", // Regole di validazione per il percorso del file
            "file_data.*.alt" => "string|max:45", // Regole di validazione per l'attributo 'alt' del file
            "file_data.*.title" => "string|max:45", // Regole di validazione per l'attributo 'title' del file
            "file_data.*.descrizione" => "string", // Regole di validazione per la descrizione del file
            "file_data.*.formato" => "string|max:45", // Regole di validazione per il formato del file
        ];
    }
}
