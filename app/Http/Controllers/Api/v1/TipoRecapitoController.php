<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\TipoRecapitoStoreRequest;
use App\Http\Requests\v1\TipoRecapitoUpdateRequest;
use App\Http\Resources\v1\TipoRecapitoCollection;
use App\Http\Resources\v1\TipoRecapitoCompletoCollection;
use App\Http\Resources\v1\TipoRecapitoCompletoResource;
use App\Http\Resources\v1\TipoRecapitoResource;
use App\Models\TipoRecapitoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TipoRecapitoController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return JsonResource
     */
    public function index()
    {
        // return TipoRecapito::all();
        $tipoRecapito = TipoRecapitoModel::all();
        $risorsa = null;
        // dd(request('tipo')); // uso funzione dd che ci visualizza che visualizza i dati e poi muore
        if (request("tipo") != null && request("tipo") == "completo") {
            $risorsa = new TipoRecapitoCompletoCollection($tipoRecapito);
        } else {
            $risorsa = new TipoRecapitoCollection($tipoRecapito);
        }
        return $risorsa;
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Requests\v1\TipoRecapitoStoreRequest $request
     * @return JsonResource
     */
    public function store(TipoRecapitoStoreRequest $request)
    {
        if (Gate::allows('create')) {
            if (Gate::allows('Administrator')) {
                $dati = $request->validated();
                $idTipoRecapito = TipoRecapitoModel::create($dati);
                return new TipoRecapitoResource($idTipoRecapito);
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
    public function show(TipoRecapitoModel $idTipoRecapito)
    {
        $risorsa = null;
        if (request("tipo") != null && request("tipo") == "completo") {
            $risorsa = new TipoRecapitoCompletoResource($idTipoRecapito);
        } else {
            $risorsa = new TipoRecapitoResource($idTipoRecapito);
        }
        return $risorsa;
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param App\Http\Requests\v1\TipoRecapitoUpdateReques &request
     * @return JsonResource
     */
    public function update(TipoRecapitoUpdateRequest $request, TipoRecapitoModel $idTipoRecapito)
    {
        if (Gate::allows('update')) {
            if (Gate::allows('Administrator')) {
                $dati = $request->validated();
                $idTipoRecapito->fill($dati);
                $idTipoRecapito->save();
                return new TipoRecapitoResource($idTipoRecapito);
            } else {
                abort(403, 'PE-0004');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoRecapitoModel $idTipoRecapito)
    {
        if (Gate::allows('delete')) {
            if (Gate::allows('Administrator')) {
                $idTipoRecapito->deleteOrFail();
                return response()->noContent();
            } else {
                abort(403, 'PE_0005');
            }
        }
    }
}
