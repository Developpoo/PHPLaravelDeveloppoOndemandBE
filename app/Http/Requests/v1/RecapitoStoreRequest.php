<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class RecapitoStoreRequest extends FormRequest
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
            "idRecapito" => "required|integer",
            "idTipoRecapito" => "required|integer",
            "idUserClient" => "required|integer",
            "recapito" => "required|string|max:255",
            "preferito" => "required|string|max:10"
        ];
    }
}
