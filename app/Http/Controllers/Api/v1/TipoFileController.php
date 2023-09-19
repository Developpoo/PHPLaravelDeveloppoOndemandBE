<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\TipoFileStoreRequest;
use App\Http\Requests\v1\TipoFileUpdateRequest;
use App\Http\Resources\v1\TipoFileCollection;
use App\Http\Resources\v1\TipoFileResource;
use App\Models\TipoFileModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TipoFileController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResource
     */
    public function index()
    {
        $idTipoFile = TipoFileModel::all();
        return new TipoFileCollection($idTipoFile);
    }

    /**
     * Store a newly created resource in storage.
     * @return JsonResource
     */
    public function store(TipoFileStoreRequest $request)
    {
        if (Gate::allows('create')) {
            if (Gate::allows('Administrator')) {
                $data = $request->validated();
                $idTipoFile = TipoFileModel::create($data);
                return new TipoFileResource($idTipoFile);
            } else {
                abort(404, 'PE_0008');
            }
        } else {
            abort(403, 'PE_0006');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoFileModel $idTipoFile)
    {
        $risorsa = new TipoFileResource($idTipoFile);
        return $risorsa;
    }

    /**
     * Update the specified resource in storage.
     * 
     * @return JsonResource
     */
    public function update(TipoFileUpdateRequest $request, TipoFileModel $idTipoFile)
    {
        if (Gate::allows('update')) {
            if (Gate::allows('Administrator')) {
                $data = $request->validated();
                $idTipoFile->fill($data);
                $idTipoFile->save();
                return new TipoFileResource($idTipoFile);
            } else {
                abort(403, 'PE-0004');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoFileModel $idTipoFile)
    {
        if (Gate::allows('delete')) {
            if (Gate::allows('Administrator')) {
                $idTipoFile->deleteOrFail();
                return response()->noContent();
            } else {
                abort(403, 'PE_0005');
            }
        }
    }
}
