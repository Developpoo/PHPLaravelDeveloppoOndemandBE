<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\AppHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\UserClientStoreRequest;
use App\Http\Requests\v1\UserClientUpdateRequest;
use App\Http\Resources\v1\CreditoResource;
use App\Http\Resources\v1\UserClientCollection;
use App\Http\Resources\v1\UserClientResource;
use App\Models\CreditoModel;
use App\Models\IndirizzoModel;
use App\Models\RecapitoModel;
use App\Models\UserAuthModel;
use App\Models\UserClientModel;
use App\Models\UserClientRoleModel;
use App\Models\UserPasswordModel;
use App\Models\UserStatusModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

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

        $result = DB::transaction(function () use ($request, $dati) {
            $userClient = UserClientModel::create($dati);

            UserAuthModel::create([
                $hashUser = hash("sha512", trim($request->user)),
                'idUserClient' => $userClient->idUserClient,
                'user' => $hashUser,
                'challenge' =>  hash("sha512", trim("Ciao")),
                'secretJWT' => hash("sha512", trim("Secret")),
                'challengeStart' => time()
            ]);

            UserPasswordModel::create([
                $hashPassword = hash("sha512", trim($request->password)),
                'idUserClient' => $userClient->idUserClient,
                'password' => $hashPassword,
                'salt' => hash("sha512", trim(random_bytes(32)))
            ]);

            UserClientRoleModel::create([
                'idUserClient' => $userClient->idUserClient,
                'idUserRole' => 2
            ]);

            IndirizzoModel::create([
                'idUserClient' => $userClient->idUserClient,
                "idTipoIndirizzo" => 1,
                "idNazione" => $request->idNazione,
                "idComune" => $request->idComune,
                "indirizzo" => $request->indirizzo,
                "cap"  => $request->cap,
                "preferito" => 0
            ]);

            RecapitoModel::create([
                "idUserClient" => $userClient->idUserClient,
                "idTipoRecapito" => 3,
                "recapito" => $request->recapito,
                "preferito" => 0
            ]);

            return $userClient;
        });

        return new UserClientResource($result);
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
