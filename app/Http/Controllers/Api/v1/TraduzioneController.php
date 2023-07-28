<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\TraduzioneCollection;
use App\Http\Resources\v1\TraduzioneResource;
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
}
