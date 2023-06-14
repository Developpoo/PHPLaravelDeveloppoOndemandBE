<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\NazioneCollection;
use App\Http\Resources\v1\NazioneCompletaCollection;
use App\Http\Resources\v1\NazioneCompletaResource;
use App\Http\Resources\v1\NazioneResource;
use App\Models\NazioneModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class NazioneController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return JsonResource
     */
    public function index()
    {
        // echo "ciao"; exit();
        // $continente = (request("continente") != null) ? request("continente") : null; // controllo per la sigla continente di modo che non funzionino siglie inventate
        // if ($continente != null) {
        //     $nazioni = NazioneModel::all()->where('continente', $continente);
        // } else {
        //     $nazioni = NazioneModel::all();
        // }
        // return $this->creaCollection($nazioni);

        // if (Gate::allows("read")) { da controllare il gate
        $iso = (request("iso") != null) ? request("iso") : null;
        if ($iso != null) {
            $nazione = NazioneModel::all()->where('iso', $iso);
        } else {
            $nazione = NazioneModel::all();
        }

        return $this->creaCollection($nazione);
        // } else {
        //     abort(404);
        // }
    }

    /**
     * Display a listing of the resource from continente.
     * 
     * @param char $idContinente
     * @return JsonResource
     */
    public function indexContinente($continente)
    {
        $nazioni = NazioneModel::all()->where('continente', $continente); // da notare che tiro fuori sempre $nazioni come della Index ma la differenza è come lo tiro fuori
        return $this->creaCollection($nazioni);
    }

    /**
     * Store a newly created resource in storage.
     * 
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * 
     * @param integer $idContinente
     * @return JsonResource
     */
    public function show(NazioneModel $nazione)
    {
        $risorsa = null;
        $tipo = request('tipo');
        if ($tipo == "completo") {
            $risorsa = new NazioneCompletaResource($nazione);
        } else {
            $risorsa = new NazioneResource($nazione);
        }
        return $risorsa;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /******************************************************* */
    // PROTECTED

    protected function creaCollection($nazioni)
    {
        $risorsa = null;
        $tipo = request('tipo');
        if ($tipo == "completo") {
            $risorsa = new NazioneCompletaCollection($nazioni);
        } else {
            $risorsa = new NazioneCollection($nazioni);
        }
        return $risorsa;
    }
}
