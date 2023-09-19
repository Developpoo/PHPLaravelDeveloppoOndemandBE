<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\FileStoreRequest;
use App\Http\Requests\v1\FileUpdateRequest;
use App\Http\Resources\v1\FileCollection;
use App\Http\Resources\v1\FileResource;
use App\Models\FileModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResource
     */
    public function index()
    {

        if (Gate::allows("read")) {
            $src = (request("src") != null) ? request("src") : null;
            if ($src != null) {
                $film = FileModel::all()->where('src', $src);
            } else {
                $film = FileModel::all();
            }
            return new FileCollection($film);
        } else {
            abort(403, 'PE_0001');
        }
    }

    /**
     * Store a newly created resource in storage.
     * @return JsonResource
     */
    public function store(FileStoreRequest $request)
    {
        if (Gate::allows('create')) {
            if (Gate::allows('Administrator')) {
                $data = $request->validated();
                $idFile = FileModel::create($data);
                return new FileResource($idFile);
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
     * @param string $film
     * @return AppHelpers\returnCustom
     */
    public function show(FileModel $idFile)
    {
        if (Gate::allows('read')) {
            $risorsa = new FileResource($idFile);
            return $risorsa;
        } else {
            abort(403, 'PE_0006');
        }
    }

    /**
     * Update the specified resource in storage.
     * 
     * @return JsonResource
     */
    public function update(FileUpdateRequest $request, FileModel $idFile)
    {
        if (Gate::allows('update')) {
            if (Gate::allows('Administrator')) {
                $dati = $request->validated();
                $idFile->fill($dati);
                $idFile->save();
                return new FileResource($idFile);
            } else {
                abort(403, 'PE-0004');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FileModel $idFile)
    {
        if (Gate::allows('delete')) {
            if (Gate::allows('Administrator')) {
                $idFile->deleteOrFail();
                return response()->noContent();
            }
        } else {
            abort(403, 'PE_0005');
        }
    }
}
