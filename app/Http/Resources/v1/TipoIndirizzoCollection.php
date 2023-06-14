<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TipoIndirizzoCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request)
    {
        // return parent::toArray($request);
        return $this->collection;
        // $tmp = parent::toArray($request);
        // $tmp = array_map(array($this, 'getCampi'), $tmp); // $this->getCampi messo all'interno della funzione non funzionerebbe e si inserisce così
        // return $tmp;
    }

    // PROTECTED

    // protected function getCampi($item)
    // {
    //     return [
    //         'idTipoIndirizzo' => $item=["idTipoIndirizzo"], // non essendo un'oggetto dobbiamo usare l'array associativo
    //         'nome' => $item=["nome"]
    //     ];
    // }
}
