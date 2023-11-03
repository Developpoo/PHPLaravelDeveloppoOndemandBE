<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\AppHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\UserClientStoreRequest;
use App\Http\Requests\v1\UserClientUpdateRequest;
use App\Http\Resources\v1\CreditoResource;
use App\Http\Resources\v1\UserClientCollection;
use App\Http\Resources\v1\UserClientResource;
use App\Http\Resources\v1\UtenteResource;
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
     * Ottiene i dettagli di un utente client esistente nel sistema.
     *
     * Questo metodo consente di ottenere i dettagli di un utente client esistente nel sistema. 
     * Si recuperano i record dalle tabelle UserClientModel, UserAuthModel, 
     * UserPasswordModel, UserClientRoleModel, IndirizzoModel e RecapitoModel basandosi sull'ID dell'utente.
     *
     * @param  int  $id  L'ID dell'utente client da ottenere.
     * @return \App\Http\Resources\UserClientResource Risorsa che rappresenta l'utente richiesto.
     */
    public function getUserClient($id)
    {
        $userClient = UserClientModel::findOrFail($id);

        $userAuth = UserAuthModel::where('idUserClient', $id)->first();
        $userPassword = UserPasswordModel::where('idUserClient', $id)->first();
        $userRole = UserClientRoleModel::where('idUserClient', $id)->first();
        $indirizzo = IndirizzoModel::where('idUserClient', $id)->first();
        $recapito = RecapitoModel::where('idUserClient', $id)->first();

        // Puoi aggregare i dati come desideri. Ecco un esempio:
        $result = [
            'userClient' => [
                'idUserClient' => $userClient->idUserClient,
                // Includi qui eventuali altri campi che desideri da UserClientModel
            ],
            'userAuth' => [
                'user' => $userAuth->user,
                // 'challenge' => $userAuth->challenge,
                // 'secretJWT' => $userAuth->secretJWT,
                // 'challengeStart' => $userAuth->challengeStart,
                // Includi qui eventuali altri campi che desideri da UserAuthModel
            ],
            'userPassword' => [
                'password' => $userPassword->password, // NOTA: In generale, non dovresti mai inviare password in chiaro!
                'salt' => $userPassword->salt,
                // Includi qui eventuali altri campi che desideri da UserPasswordModel
            ],
            'userRole' => [
                'idUserRole' => $userRole->idUserRole,
                // Includi qui eventuali altri campi che desideri da UserClientRoleModel
            ],
            'indirizzo' => [
                'idTipoIndirizzo' => $indirizzo->idTipoIndirizzo,
                'idNazione' => $indirizzo->idNazione,
                'idComune' => $indirizzo->idComune,
                'indirizzo' => $indirizzo->indirizzo,
                'cap' => $indirizzo->cap,
                // 'preferito' => $indirizzo->preferito,
                // Includi qui eventuali altri campi che desideri da IndirizzoModel
            ],
            'recapito' => [
                'idTipoRecapito' => $recapito->idTipoRecapito,
                'recapito' => $recapito->recapito,
                // 'preferito' => $recapito->preferito,
                // Includi qui eventuali altri campi che desideri da RecapitoModel
            ]
        ];


        return new UtenteResource($result);
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
     * Aggiorna un utente client esistente nel sistema.
     *
     * Questo metodo consente di aggiornare un utente client esistente nel sistema. 
     * Vengono aggiornati i record nelle tabelle UserClientModel, UserAuthModel, 
     * UserPasswordModel, UserClientRoleModel, IndirizzoModel e RecapitoModel con i dati forniti nella richiesta.
     *
     * @param  UserClientUpdateRequest  $request  Richiesta di aggiornamento dell'utente client.
     * @param  int  $id  L'ID dell'utente client da aggiornare.
     * @return \App\Http\Resources\UserClientResource Risorsa che rappresenta l'utente aggiornato.
     */
    public function updateUserClient(UserClientUpdateRequest $request, $id)
    {
        $dati = $request->validated();

        $result = DB::transaction(function () use ($request, $dati, $id) {
            $userClient = UserClientModel::findOrFail($id);
            $userClient->update($dati);

            $userAuth = UserAuthModel::where('idUserClient', $id)->first();
            if ($userAuth) {
                $userAuth->update([
                    'user' => hash("sha512", trim($request->user)),
                    'challenge' => hash("sha512", trim("Ciao")),
                    'secretJWT' => hash("sha512", trim("Secret")),
                    'challengeStart' => time()
                ]);
            }

            $userPassword = UserPasswordModel::where('idUserClient', $id)->first();
            if ($userPassword) {
                $userPassword->update([
                    'password' => hash("sha512", trim($request->password)),
                    'salt' => hash("sha512", trim(random_bytes(32)))
                ]);
            }

            // Considerando che non possiamo sapere quale "ruolo" o "indirizzo" o "recapito" si desidera aggiornare,
            // questi sono esempi generici. Potrebbe essere necessario personalizzare ulteriormente.

            $indirizzo = IndirizzoModel::where('idUserClient', $id)->first();
            if ($indirizzo) {
                $indirizzo->update([
                    "idNazione" => $request->idNazione,
                    "idComune" => $request->idComune,
                    "indirizzo" => $request->indirizzo,
                    "cap" => $request->cap
                ]);
            }

            $recapito = RecapitoModel::where('idUserClient', $id)->first();
            if ($recapito) {
                $recapito->update([
                    "recapito" => $request->recapito
                ]);
            }

            return $userClient;
        });

        return new UserClientResource($result);
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
