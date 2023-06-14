<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\TipoIndirizzoModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\TipoIndirizzoStoreRequest;
use App\Http\Requests\v1\TipoIndirizzoUpdateRequest;
use App\Http\Resources\v1\TipoIndirizzoCollection;
use App\Http\Resources\v1\TipoIndirizzoCompletoCollection;
use App\Http\Resources\v1\TipoIndirizzoCompletoResource;
use App\Http\Resources\v1\TipoIndirizzoResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TipoIndirizzoController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return JsonResource
     */
    public function index()
    {
        $tipoIndirizzo = TipoIndirizzoModel::all();
        $risorsa = null;
        if (request("tipo") != null && request("tipo") == "completo") {
            $risorsa = new TipoIndirizzoCompletoCollection($tipoIndirizzo);
        } else {
            $risorsa = new TipoIndirizzoCollection($tipoIndirizzo);
        }
        return $risorsa;
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Requests\v1\TipoIndirizzoStoreRequest $request
     * @return JsonResource
     */
    public function store(TipoIndirizzoStoreRequest $request)
    {
        if (Gate::allows('create')) {
            if (Gate::allows('Administrator')) {
                $dati = $request->validated();
                $tipoIndirizzo = TipoIndirizzoModel::create($dati);
                return new TipoIndirizzoResource($tipoIndirizzo);
            } else {
                abort(403, 'PE_0006');
            }
        }
    }

    /**
     * Display the specified resource.
     * 
     * @return JsonResource
     */
    public function show(TipoIndirizzoModel $tipoIndirizzo)
    {
        $risorsa = null;
        if (request("tipo") != null && request("tipo") == "completo") {
            $risorsa = new TipoIndirizzoCompletoResource($tipoIndirizzo);
        } else {
            $risorsa = new TipoIndirizzoResource($tipoIndirizzo);
        }
        return $risorsa;
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param App\Http\Requests\v1\TipoIndirizzoUpdateReques &request
     * @return JsonResource
     */
    public function update(TipoIndirizzoUpdateRequest $request, TipoIndirizzoModel $tipoIndirizzo)
    {
        if (Gate::allows('update')) {
            if (Gate::allows('Administrator')) {
                $dati = $request->validated();
                $tipoIndirizzo->fill($dati);
                $tipoIndirizzo->save();
                return new TipoIndirizzoResource($tipoIndirizzo);
            } else {
                abort(403, 'PE-0004');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoIndirizzoModel $tipoIndirizzo)
    {
        if (Gate::allows('delete')) {
            if (Gate::allows('Administrator')) {
                $tipoIndirizzo->deleteOrFail();
                return response()->noContent();
            } else {
                abort(403, 'PE_0005');
            }
        }
    }
}
