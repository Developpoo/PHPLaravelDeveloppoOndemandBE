<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
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
            'idFilm' => $this->idFilm,
            'titolo' => $this->titolo,
            'descrizione' => $this->descrizione,
            'durata' => $this->durata,
            'regista' => $this->regista,
            'attori' => $this->attori,
            "icona" => $this->icona,
            'anno' => $this->anno,
            'watch' => $this->watch
        ];
    }
}
