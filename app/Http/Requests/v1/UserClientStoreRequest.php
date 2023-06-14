<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class UserClientStoreRequest extends FormRequest
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
            'idUserClient' => 'required|integer',
            'idUserStatus' => 'required|integer',
            'nome' => 'string|max:255',
            'cognome' => 'required|string|max:255',
            'sesso' => 'required|integer',
            'codiceFiscale' => 'string',
            'partitaIva' => 'string',
            'cittadinanza' => 'string|max:255',
            'idNazioneNascita' => 'integer',
            'cittaNascita' => 'string|max:255',
            'nazioneNascita' => 'string|max:255',
            'provinciaNascita' => 'string|max:255',
            'dataNascita' => 'date',
            'archived' => 'integer',
            'createb_by' => 'string|max:45',
            'updated_by' => 'string|max:45'
        ];
    }
}
