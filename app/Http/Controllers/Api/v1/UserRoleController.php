<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\UserRoleStoreRequest;
use App\Http\Requests\v1\UserRoleUpdateRequest;
use App\Http\Resources\v1\UserRoleCollection;
use App\Http\Resources\v1\UserRoleResource;
use App\Models\UserRoleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $idUserRole = UserRoleModel::all();
        return new UserRoleCollection($idUserRole);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRoleStoreRequest $request)
    {
        if (Gate::allows('create')) {
            if (Gate::allows('Administrator')) {
                $data = $request->validated();
                $idUserRole = UserRoleModel::create($data);
                return new UserRoleResource($idUserRole);
            } else {
                abort(404, 'PE_0007');
            }
        } else {
            abort(403, 'PE_0006');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UserRoleModel $idUserRole)
    {
        $risorsa = new UserRoleResource($idUserRole);
        return $risorsa;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRoleUpdateRequest $request, UserRoleModel $idUserRole)
    {
        if (Gate::allows('update')) {
            if (Gate::allows('Administrator')) {
                $dati = $request->validated();
                $idUserRole->fill($dati);
                $idUserRole->save();
                return new UserRoleResource($idUserRole);
            } else {
                abort(403, 'PE-0004');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserRoleModel $idUserRole)
    {
        if (Gate::allows('delete')) {
            if (Gate::allows('Administrator')) {
                $idUserRole->deleteOrFail();
                return response()->noContent();
            }
        } else {
            abort(403, 'PE_0005');
        }
    }
}
