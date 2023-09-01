<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\IndirizzoStoreRequest;
use App\Http\Requests\v1\IndirizzoUpdateRequest;
use App\Http\Resources\v1\IndirizzoCollection;
use App\Http\Resources\v1\IndirizzoResource;
use App\Models\IndirizzoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class IndirizzoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResource
     */
    public function index()
    {
        $indirizzo = null;
        if (Gate::allows('read')) {
            if (Gate::allows('Administrator')) {
                $indirizzo = IndirizzoModel::all();
                if (request("idUserClient") != null) {
                    $indirizzo = $indirizzo->where("idUserClient", request("idUserClient"));
                }
                if (request("idTipo") != null) {
                    $indirizzo = $indirizzo->where("idTipoIndirizzo", request("idTipo"));
                }

                return new IndirizzoCollection($indirizzo);
            } else {
                abort(403, 'PE_0001');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\requests\v1\IndirizzoStoreRequest $request
     * @return JsonResource
     */
    public function store(IndirizzoStoreRequest $request)
    {
        // if (Gate::allows('create')) {
        $dati = $request->validated();
        $idIndirizzo = IndirizzoModel::create($dati);
        return new IndirizzoResource($idIndirizzo);
        // } else {
        //     abort(403, 'PE_0006');
        // }
    }

    /**
     * Display the specified resource.
     * 
     * @param \App\Models\IndirizzoModel
     * @return JsonResource
     */
    public function show(IndirizzoModel $idIndirizzo)
    {
        if (Gate::allows('read')) {
            $risorsa = new IndirizzoResource($idIndirizzo);
            return $risorsa;
        } else {
            abort(403, 'PE_00002');
        }
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param App\Http\Requests\v1\IndirizzoUpdateRequest $request
     * @param IndirizzoModel $idIndirizzo
     * @return JsonResource
     */
    public function update(IndirizzoUpdateRequest $request, IndirizzoModel $idIndirizzo)
    {
        if (Gate::allows('update')) {
            $dati = $request->validated();
            $idIndirizzo->fill($dati);
            $idIndirizzo->save();
            return new IndirizzoResource($idIndirizzo);
        } else {
            abort(403, 'PE-0004');
        }
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param App\Models\IndirizzoModel
     */
    public function destroy(IndirizzoModel $idIndirizzo)
    {
        if (Gate::allows('delete')) {
            $idIndirizzo->deleteOrFail();
            return response()->noContent();
        } else {
            abort(403, 'PE_0005');
        }
    }
}
