<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\UserClientStoreRequest;
use App\Http\Requests\v1\UserClientUpdateRequest;
use App\Http\Resources\v1\CreditoResource;
use App\Http\Resources\v1\UserClientCollection;
use App\Http\Resources\v1\UserClientResource;
use App\Models\CreditoModel;
use App\Models\UserClientModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserClientController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return JsonResource
     */
    public function index()
    {
        $userClient = null;
        if (Gate::allows('read')) {
            if (Gate::allows('Administrator')) {
                $userClient = UserClientModel::all();
            } else {
                $userClient = UserClientModel::where('idUserClient', auth()->user()->idUserClient)->get();
            }
            return new UserClientCollection($userClient);
        } else {
            abort(403, 'PE_0001');
        }
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @return JsonResource
     */
    public function store(UserClientStoreRequest $request)
    {
        if (Gate::allows('create')) {
            $data = $request->validated();
            $userClient = UserClientModel::create($data);
            return new UserClientResource($userClient);
        } else {
            abort(403, 'PE_0006');
        }
    }

    /**
     * Display the specified resource.
     * 
     * @param \App\Models\UserClientModel
     * @return JsonResource
     */
    public function show(UserClientModel $idUserClient)
    {
        // print_r($idUserClient);
        if (Gate::allows('read')) {
            $risorsa = new UserClientResource($idUserClient);
            return $risorsa;
        } else {
            abort(403, 'PE_00002');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserClientUpdateRequest $request, UserClientModel $idUserClient)
    {
        if (Gate::allows('update')) {
            $data = $request->validated();
            $idUserClient->fill($data);
            $idUserClient->save();
            return new UserClientResource($idUserClient);
        } else {
            abort(403, 'PE-0004');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserClientModel $idUserClient)
    {
        if (Gate::allows('delete')) {
            $idUserClient->deleteOrFail();
            return response()->noContent();
        } else {
            abort(403, 'PE_0005');
        }
    }

    /**
     *  @param $request
     *  @return JsonResource
     */

    public function recordUserClient(UserClientStoreRequest $request)
    {
        $dati = $request->validated();
        $userClient = UserClientModel::create($dati);
        return new UserClientResource($userClient);
    }

    // ----------------------------------------------------------------------------------------------------------
    /**
     * Update the specified resource in storage.
     * 
     * @param  integer  $idUserClient
     * @param integer $value
     * @return JsonResource
     */
    public function updateCredito($idUserClient, $value)
    {
        if (Gate::allows('update')) {
            $userClient = UserClientModel::where("idUserClient", $idUserClient)->first();
            if (Gate::allows('Administrator') || Auth::user()->idUserClient == $userClient->idUserClient) {
                $credito = $userClient->crediti;
                if ($credito == null) {
                    $credito = new CreditoModel();
                    $credito->idUserClient = $idUserClient;
                    $credito->credito = 0;
                    $credito->save();
                }
                if (is_numeric($value)) {
                    $credito->credito = $credito->credito + $value;
                    $credito->save();
                    return new CreditoResource($credito);
                } else {
                    abort(406, "PE_0010");
                }
            } else {
                abort(404, 'PE_0009');
            }
        } else {
            abort(403, 'PE_0008');
        }
    }
}
