<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IndirizzoResource extends JsonResource
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

    /*************************************************** */
    // PROTECTED

    protected function getCampi()
    {
        return [
            'idIndirizzo' => $this->idIndirizzo,
            'idTipoIndirizzo' => $this->idTipoIndirizzo,
            'idComune' => $this->idComune,
            'localita' => $this->localita,
            'cap' => $this->cap,
            'indirizzo' => $this->indirizzo,
            'civico' => $this->civico,
            'idNazione' => $this->idNazione,
            'idUserClient' => $this->idUserClient
        ];
    }
}
