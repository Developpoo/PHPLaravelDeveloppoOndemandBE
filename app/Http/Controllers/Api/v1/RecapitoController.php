<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\RecapitoStoreRequest;
use App\Http\Requests\v1\RecapitoUpdateRequest;
use App\Http\Resources\v1\RecapitoCollection;
use App\Http\Resources\v1\RecapitoResource;
use App\Models\RecapitoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RecapitoController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return JsonResource
     */
    public function index()
    {
        $indirizzo = null;
        if (Gate::allows('read')) {
            if (Gate::allows('Administrator')) {
                $idRecapito = RecapitoModel::all();
                if (request("idUserClient") != null) {
                    $idRecapito = $idRecapito->where("idUserClient", request("idUserClient"));
                }
                if (request("idTipo") != null) {
                    $idRecapito = $idRecapito->where("idTipoRecapito", request("idTipo"));
                }

                return new RecapitoCollection($idRecapito);
            } else {
                abort(403, 'PE_0001');
            }
        }
    }
    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\requests\v1\RecapitoStoreRequest $request
     * @return JsonResource
     */
    public function store(RecapitoStoreRequest $request)
    {
        // if (Gate::allows('create')) {
        $dati = $request->validated();
        $idRecapito = RecapitoModel::create($dati);
        return new RecapitoResource($idRecapito);
        // } else {
        //     abort(403, 'PE_0006');
        // }
    }

    /**
     * Display the specified resource.
     * 
     * @param \App\Models\RecapitoModel
     * @return JsonResource
     */
    public function show(RecapitoModel $idRecapito)
    {
        if (Gate::allows('read')) {
            $risorsa = new RecapitoResource($idRecapito);
            return $risorsa;
        } else {
            abort(403, 'PE_00002');
        }
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param App\Http\Requests\v1\RecapitoUpdateRequest $request
     * @param RecapitoModel $idRecapito
     * @return JsonResource
     */
    public function update(RecapitoUpdateRequest $request, RecapitoModel $idRecapito)
    {
        if (Gate::allows('update')) {
            $dati = $request->validated();
            $idRecapito->fill($dati);
            $idRecapito->save();
            return new RecapitoResource($idRecapito);
        } else {
            abort(403, 'PE-0004');
        }
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param App\Models\RecapitoModel
     */
    public function destroy(RecapitoModel $idRecapito)
    {
        if (Gate::allows('delete')) {
            $idRecapito->deleteOrFail();
            return response()->noContent();
        } else {
            abort(403, 'PE_0005');
        }
    }
}
