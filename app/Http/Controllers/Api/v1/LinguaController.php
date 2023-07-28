<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\LinguaCollection;
use App\Http\Resources\v1\LinguaResource;
use App\Models\LinguaModel;
use Illuminate\Http\Request;

class LinguaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResource
     */
    public function index()
    {
        $idLingua = LinguaModel::all();
        return new LinguaCollection($idLingua);
    }

    /**
     * Display the specified resource.
     * 
     * @param string $idLingua
     * @return AppHelpers\returnCustom
     */
    public function show(LinguaModel $idLingua)
    {
        $risorsa = new LinguaResource($idLingua);
        return $risorsa;
    }
}
