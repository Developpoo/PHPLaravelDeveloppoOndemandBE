<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NazioneResource extends JsonResource
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
            "idNazione" => $this->idNazione,
            "nome" => $this->nome,
            "continente" => $this->continente,
            "iso" => $this->iso,
            "iso3" => $this->iso3,
            "prefissoTelefonico" => $this->prefissoTelefonico
        ];
    }
    }

