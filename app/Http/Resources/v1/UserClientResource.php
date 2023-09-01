<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return $this->getCampi();
    }

    // PROTECTED
    // Funzione che serve a non visualizzare tutti i campi che mi richiamo in modo protected per sostituire return parent::toArray($request); che altrimenti mi avrebbe
    // mostrato sempre tutti i campi della tabella

    protected function getCampi()
    {
        return [
            'idUserClient' => $this->idUserClient,
            'idUserStatus' => $this->idUserStatus,
            'idLingua' => $this->idLingua,
            'nome' => $this->nome,
            'cognome' => $this->cognome,
            'sesso' => $this->sesso,
            'codiceFiscale' => $this->codiceFiscale,
            'idNazione' => $this->idNazione,
            'regione' => $this->regione,
            'idComune' => $this->idComune,
            'dataNascita' => $this->dataNascita,
            'accettaTermini' => $this->accettaTermini,
            'archived' => $this->archived
        ];
    }
}
