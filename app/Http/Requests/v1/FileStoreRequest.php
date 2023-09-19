<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class FileStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "idFile" => 'required|integer',
            "idTipoFile" => 'required|integer',
            "nome" => 'required|string|max:45',
            "src" => 'required|string|max:255',
            "alt" => 'required|string|max:45',
            "title" => 'required|string|max:45',
            "descrizione" => 'required|string',
            "formato" => 'required|string|max:45'
        ];
    }
}
