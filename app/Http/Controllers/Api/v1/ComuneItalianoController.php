<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ComuneCollection;
use App\Http\Resources\v1\ComuneCompletoCollection;
use App\Http\Resources\v1\ComuneResource;
use App\Models\ComuneModel;
use Illuminate\Http\Request;

class ComuneItalianoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResource
     */
    public function index()
    {
        $comune = ComuneModel::all()->sortBy('comune');
        // $comune = ComuneModel::orderBy('comune')->get(); //uguale sopra
        return new ComuneCollection($comune);
    }

    /**
     * Display the specified resource.
     * 
     * @param string $film
     * @return AppHelpers\returnCustom
     */
    public function show(ComuneModel $comune)
    {
        $risorsa = new ComuneResource($comune);
        return $risorsa;
    }

    /**
     * Display a listing of the resource from continente.
     * 
     * @param char $idComune
     * @return JsonResource
     */
    public function indexProvincia($provincia)
    {
        $comuni = ComuneModel::all()->where('provincia', $provincia);
        return $this->creaCollection($comuni);
    }

    /**
     * Display a listing of the resource from continente.
     * 
     * @param char $idComune
     * @return JsonResource
     */
    public function indexRegione($regione)
    {
        $comuni = ComuneModel::all()->where('regione', $regione);
        return $this->creaCollection($comuni);
    }

    /******************************************************* */
    // PROTECTED

    protected function creaCollection($comuni)
    {
        $risorsa = null;
        $tipo = request('tipo');
        if ($tipo == "completo") {
            $risorsa = new ComuneCompletoCollection($comuni);
        } else {
            $risorsa = new ComuneCollection($comuni);
        }
        return $risorsa;
    }
}
