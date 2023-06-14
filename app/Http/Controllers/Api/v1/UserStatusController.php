<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\UserStatusStoreRequest;
use App\Http\Requests\v1\UserStatusUpdateRequest;
use App\Http\Resources\v1\UserStatusCollection;
use App\Http\Resources\v1\UserStatusResource;
use App\Models\UserStatusModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResource
     */
    public function index()
    {
        $idUserStatus = UserStatusModel::all();
        return new UserStatusCollection($idUserStatus);
    }

    /**
     * Store a newly created resource in storage.
     * @return JsonResource
     */
    public function store(UserStatusStoreRequest $request)
    {
        if (Gate::allows('create')) {
            if (Gate::allows('Administrator')) {
                $data = $request->validated();
                $idUserStatus = UserStatusModel::create($data);
                return new UserStatusResource($idUserStatus);
            } else {
                abort(404, 'PE_0008');
            }
        } else {
            abort(403, 'PE_0006');
        }
    }

    /**
     * Display the specified resource.
     * 
     * @param string $idUserStatus
     * @return AppHelpers\returnCustom
     */
    public function show(UserStatusModel $idUserStatus)
    {
        $risorsa = new UserStatusResource($idUserStatus);
        return $risorsa;
    }

    /**
     * Update the specified resource in storage.
     * 
     * @return JsonResource
     */
    public function update(UserStatusUpdateRequest $request, UserStatusModel $idUserStatus)
    {
        if (Gate::allows('update')) {
            if (Gate::allows('Administrator')) {
                $data = $request->validated();
                $idUserStatus->fill($data);
                $idUserStatus->save();
                return new UserStatusResource($idUserStatus);
            } else {
                abort(403, 'PE-0004');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserStatusModel $idUserStatus)
    {
        if (Gate::allows('delete')) {
            if (Gate::allows('Administrator')) {
                $idUserStatus->deleteOrFail();
                return response()->noContent();
            } else {
                abort(403, 'PE_0005');
            }
        }
    }
}
