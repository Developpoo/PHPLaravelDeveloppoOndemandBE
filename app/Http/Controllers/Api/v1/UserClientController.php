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
     * Registra un nuovo utente client nel sistema.
     *
     * Questo metodo consente di registrare un nuovo utente client nel sistema. Vengono creati record
     * nelle tabelle UserClientModel, UserAuthModel, UserPasswordModel, UserClientRoleModel, IndirizzoModel
     * e RecapitoModel con i dati forniti nella richiesta.
     *
     * @param  UserClientStoreRequest  $request  Richiesta di registrazione dell'utente client.
     * @return \App\Http\Resources\UserClientResource Risorsa che rappresenta il nuovo utente registrato.
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

    /**
     * Aggiorna i dati di un utente client esistente nel sistema.
     *
     * @param  UserClientUpdateRequest  $request  Richiesta di aggiornamento dei dati dell'utente client.
     * @param  int  $idUserClient  ID dell'utente client da aggiornare.
     * @return \App\Http\Resources\UserClientResource Risorsa che rappresenta l'utente client aggiornato.
     */
    public function updateUserClient(UserClientUpdateRequest $request, $idUserClient)
    {
        $dati = $request->validated();
        $userClient = UserClientModel::findOrFail($idUserClient);

        $userClient->update($dati);

        return new UserClientResource($userClient);
    }

    /**
     * Cancella un utente client dal sistema.
     *
     * Questo metodo consente di eliminare un utente client dal sistema. Vengono anche cancellati i record correlati
     * in altre tabelle, ad esempio IndirizzoModel, RecapitoModel, ecc.
     *
     * @param  int  $idUserClient  ID dell'utente client da cancellare.
     * @return \Illuminate\Http\JsonResponse Risposta JSON confermando la cancellazione.
     */
    public function deleteUserClient($idUserClient)
    {
        /**
         * @var UserClientModel $userClient
         */
        $userClient = UserClientModel::findOrFail($idUserClient);

        // Cancella anche i record correlati in altre tabelle, ad esempio IndirizzoModel, RecapitoModel, ecc.
        $userClient->delete();

        return response()->json(['message' => 'Utente cancellato con successo']);
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
