<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class IndirizzoStoreRequest extends FormRequest
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
            "idUserClient" => "required|integer",
            "idTipoIndirizzo" => "required|integer",
            "idNazione" => "required|integer",
            "idComune" => "integer",
            "indirizzo" => "required|string|max:255",
            "civico" => "required|string|max:15",
            "cap" => "string|max:15",
            "localita" => "string|max:255",
            "preferito" => "integer"

        ];
    }
}
