<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\TraduzioneCustomCollection;
use App\Http\Resources\v1\TraduzioneCustomResource;
use App\Models\TraduzioneCustomModel;
use Illuminate\Http\Request;

class TraduzioneCustomController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResource
     */
    public function index()
    {
        $idTraduzioneCustom = TraduzioneCustomModel::all();
        return new TraduzioneCustomCollection($idTraduzioneCustom);
    }

    /**
     * Display the specified resource.
     * 
     * @param string $idTraduzioneCustom
     * @return AppHelpers\returnCustom
     */
    public function show(TraduzioneCustomModel $idTraduzioneCustom)
    {
        $risorsa = new TraduzioneCustomResource($idTraduzioneCustom);
        return $risorsa;
    }
}
