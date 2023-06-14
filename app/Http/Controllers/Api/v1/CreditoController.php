<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\CreditoStoreRequest;
use App\Http\Requests\v1\CreditoUpdateRequest;
use App\Http\Resources\v1\CreditoCollection;
use App\Http\Resources\v1\CreditoResource;
use App\Models\CreditoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CreditoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResource
     */
    public function index()
    {
        $category = null;
        if (Gate::allows('read')) {
            if (Gate::allows('Administrator')) {
                $idCredito = CreditoModel::all();
            } else {
                $idCredito = CreditoModel::all()->where('watch', 1);
            }
            return new CreditoCollection($idCredito);
        } else {
            abort(403, 'PE_0001');
        }
    }

    /**
     * Store a newly created resource in storage.
     * @return JsonResource
     */
    public function store(CreditoStoreRequest $request)
    {
        if (Gate::allows('create')) {
            if (Gate::allows('Administrator')) {
                $data = $request->validated();
                $idCredito = CreditoModel::create($data);
                return new CreditoResource($idCredito);
            } else {
                abort(404, 'PE_0007');
            }
        } else {
            abort(403, 'PE_0006');
        }
    }

    /**
     * Display the specified resource.
     * 
     * @param string $idCredito
     * @return AppHelpers\returnCustom
     */
    public function show(CreditoModel $idCredito)
    {
        if (Gate::allows('read')) {
            $risorsa = new CreditoResource($idCredito);
            return $risorsa;
        } else {
            abort(403, 'PE_0006');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreditoUpdateRequest $request, CreditoModel $idCredito)
    {
        if (Gate::allows('update')) {
            if (Gate::allows('Administrator')) {
                $dati = $request->validated();
                $idCredito->fill($dati);
                $idCredito->save();
                return new CreditoResource($idCredito);
            } else {
                abort(403, 'PE-0004');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CreditoModel $idCredito)
    {
        if (Gate::allows('delete')) {
            if (Gate::allows('Administrator')) {
                $idCredito->deleteOrFail();
                return response()->noContent();
            }
        } else {
            abort(403, 'PE_0005');
        }
    }
}
