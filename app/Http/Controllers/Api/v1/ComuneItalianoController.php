<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ComuneCollection;
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
        $comune = ComuneModel::all();
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
}
