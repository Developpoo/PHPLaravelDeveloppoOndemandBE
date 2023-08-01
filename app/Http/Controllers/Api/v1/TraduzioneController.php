<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\TraduzioneCollection;
use App\Http\Resources\v1\TraduzioneResource;
use App\Models\LinguaModel;
use App\Models\TraduzioneModel;
use Illuminate\Http\Request;

class TraduzioneController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResource
     */
    public function index()
    {
        $idTraduzione = TraduzioneModel::all();
        return new TraduzioneCollection($idTraduzione);
    }

    /**
     * Display the specified resource.
     * 
     * @param string $idTraduzione
     * @return AppHelpers\returnCustom
     */
    public function show(TraduzioneModel $idTraduzione)
    {
        $risorsa = new TraduzioneResource($idTraduzione);
        return $risorsa;
    }

    /**
     * Vista tabella traduzioni e lingua
     * 
     * @param $idLingua
     * @return JsonResource
     */
    public function showTraduzioni($idLingua)
    {
        $lingua = LinguaModel::findOrFail($idLingua);
        // $lingua = LinguaModel::find($idLingua); // se uso questa devo aggiungere un if e poi un else di conseguenza
        $traduzioni = $lingua->traduzioni;

        // Creazione dell'array associativo delle traduzioni
        $traduzioniArrayAssociativo = [];
        foreach ($traduzioni as $traduzione) {
            $traduzioniArrayAssociativo[$traduzione->idTraduzione] = [
                // 'idTraduzione' => $traduzione->idTraduzione,
                // 'idLingua' => $traduzione->idLingua,
                //'chiave' => $traduzione->chiave,
                //'valore' => $traduzione->valore
                $traduzione->chiave => $traduzione->valore
            ];
        }

        return response()->json([
            // 'lingua' => $lingua,
            'traduzioni' => $traduzioniArrayAssociativo,
        ]);
    }
}
