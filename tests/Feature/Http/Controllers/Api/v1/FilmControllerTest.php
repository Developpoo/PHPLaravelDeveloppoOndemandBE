<?php

namespace Tests\Feature\Http\Controllers\Api\v1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Helpers\AppHelpers;
use App\Models\ConfigurationModel;
use App\Models\FilmModel;
use App\Models\UserAbilityModel;
use App\Models\UserAuthModel;
use App\Models\UserClientModel;
use App\Models\UserRoleModel;
use App\Models\UserSessionModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Tests\TestCase;

class FilmControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Struttura della risorsa analizzabile
     * 
     * @const
     */
    protected const STRUTTURA = [
        "idFilm",
        "idCategory",
        "idNazione",
        "titolo",
        "descrizione",
        "durata",
        "regista",
        "attori",
        "anno",
        "idImg",
        "idFilmato",
        "idTrailer",
        'created_by',
        'updated_by'
    ];

    /**
     * Risorsa per la creazione dell'endpoint
     * 
     * @const
     */
    protected const RISORSA = "film";
    // PUBLIC

    /** @test */
    public function film_index_test()
    {
        $this->impostaAmbiente();

        $userClient = $this->impostaUserClient();
        $token = $this->impostaToken($userClient);
        // $session = UserSession::where("idUserClient", $userClient->idUserClient)->first();
        // $this->assertEquals($token, $session->token);
        $filmModel = FilmModel::factory()->count(rand(1, 4))->create();

        // TEST Administrator
        $role = UserClientModel::sincronizzaUserRole($userClient->idUserClient, 1);
        // withHeader aggiungo un Header
        $response = $this->withHeader('Authorization', 'Bearer ' . $token)->json('GET', $this->ritornaUrlfilm());

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => $this->ritornaStrutturaJsonMultiplaFilm(1)]);
        $response->assertJson(['data' => $filmModel->toArray()]);

        // TEST User
        $role = UserClientModel::sincronizzaUserRole($userClient->idUserClient, 2);

        $tmpModel = $filmModel->map(
            function ($model) {
                $arr = $this->ritornaStrutturaJsonSingolaFilm(0);
                $dati = $model->only($arr);
                $tmp = array();
                foreach ($arr as $item) {
                    if ($item == "film") {
                        $tmp[$item] = array();
                    } else {
                        $tmp[$item] = $dati[$item];
                    }
                }
                return $tmp;
            }
        );
        $response = $this->withHeader('Authorization', 'Bearer' . $token)->json('GET', $this->ritornaUrlfilm());
        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => $this->ritornaStrutturaJsonMultiplaFilm(0)]);
        $response->assertJson(['data' => $tmpModel->toArray()]);

        // TEST Visitor
        $role = UserClientModel::sincronizzaUserRole($userClient->idUserClient, 3);
        $response = $this->json('GET', $this->ritornaUrlfilm());
        $response->assertStatus(403);
    }

    /** @test */
    public function film_index_vuoto_test()
    {
        $this->impostaAmbiente();
        $userClient = $this->impostaUserClient();
        $token = $this->impostaToken($userClient);

        // TEST Administrator
        $role = UserClientModel::sincronizzaUserRole($userClient->idUserClient, 1);
        $response = $this->withHeader('Authorization', 'Bearer' . $token)->json('GET', $this->ritornaUrlfilm());
        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => []]);

        // TEST User
        $role = UserClientModel::sincronizzaUserRole($userClient->idUserClient, 2);
        $response = $this->withHeader('Authorization', 'Bearer' . $token)->json('GET', $this->ritornaUrlfilm());
        $response->assertStatus(200);
        $response->assertJson(['data' => []]);

        // TEST Visitor
        $role = UserClientModel::sincronizzaUserRole($userClient->idUserClient, 3);
        $response = $this->json('GET', $this->ritornaUrlfilm());
        $response->assertStatus(403);
    }

    /** @test */
    public function film_store_test()
    {
        $this->impostaAmbiente();

        $userClient = $this->impostaUserClient();
        $token = $this->impostaToken($userClient);

        // TEST Administrator
        $role = UserClientModel::sincronizzaUserRole($userClient->idUserClient, 1);
        $arrKey = $this->ritornaStrutturaJsonSingolaFilm(1);
        $arrKey = FilmControllerTest::pulisciArray($arrKey);
        $requestData = FilmModel::factory()->make()->only($arrKey);
        $response = $this->withHeader('Authorization', 'Bearer' . $token)->json('GET', $this->ritornaUrlfilm());
        $response->assertStatus(200);
        $idFilm = $response["data"]["idFilm"];
        $requestData["idFilm"] = $idFilm;
        $response->assertJsonStructure(['data' => $arrKey]);
        $response->assertJson(['data' => $requestData]);

        // TEST User
        $role = UserClientModel::sincronizzaUserRole($userClient->idUserClient, 2);
        $arrKey = $this->ritornaStrutturaJsonSingolaFilm(0);
        $arrKey = FilmControllerTest::pulisciArray($arrKey);
        $requestData = FilmModel::factory()->make()->only($arrKey);
        $response = $this->withHeader('Authorization', 'Bearer' . $token)->json('GET', $this->ritornaUrlfilm());
        $response->assertStatus(403);

        // TEST Visitor
        $role = UserClientModel::sincronizzaUserRole($userClient->idUserClient, 3);
        $response = $this->json('GET', $this->ritornaUrlfilm());
        $response->assertStatus(403);
    }

    /** @test */
    public function film_show_test()
    {
        $this->impostaAmbiente();

        $userClient = $this->impostaUserClient();
        $token = $this->impostaToken($userClient);

        // TEST Administrator
        $role = UserClientModel::sincronizzaUserRole($userClient->idUserClient, 1);

        // TEST User
        $role = UserClientModel::sincronizzaUserRole($userClient->idUserClient, 2);

        // TEST Visitor
        $role = UserClientModel::sincronizzaUserRole($userClient->idUserClient, 3);
    }

    /** @test */
    public function film_show_vuoto_test()
    {
        //
    }


    /** @test */
    public function film_update_test()
    {
        $this->impostaAmbiente();

        $userClient = $this->impostaUserClient();
        $token = $this->impostaToken($userClient);

        // TEST Administrator
        $role = UserClientModel::sincronizzaUserRole($userClient->idUserClient, 1);
        $arrKey = $this->ritornaStrutturaJsonSingolaFilm(1);
        $arrKey = FilmControllerTest::pulisciArray($arrKey);
        $filmModel = FilmModel::factory()->create();
        $requestData = FilmModel::factory()->make()->only("titolo");
        $response = $this->withHeader('Authorization', 'Bearer' . $token)->json('PUT', $this->ritornaUrlFilm($filmModel->idFilm), $requestData);
        $response->assertStatus(200);
        $rit = array("titolo"=>$requestData["titolo"]);
        $filmModel->refresh();
        $rit = array('titolo' => $filmModel['titolo']);
        $response->assertJson(['data' => $rit]);

        // TEST User
        $role = UserClientModel::sincronizzaUserRole($userClient->idUserClient, 2);
        $arrKey = $this->ritornaStrutturaJsonSingolaFilm(0);
        $arrKey = FilmControllerTest::pulisciArray($arrKey);
        $filmModel = FilmModel::factory()->create();
        $requestData = FilmModel::factory()->make()->only("titolo");
        $response = $this->withHeader('Authorization', 'Bearer' . $token)->json('PUT', $this->ritornaUrlFilm($filmModel->idFilm), $requestData);
        $response->assertStatus(403);

        // TEST Visitor
        $role = UserClientModel::sincronizzaUserRole($userClient->idUserClient, 3);
        $arrKey = $this->ritornaStrutturaJsonSingolaFilm(0);
        $arrKey = FilmControllerTest::pulisciArray($arrKey);
        $filmModel = FilmModel::factory()->create();
        $requestData = FilmModel::factory()->make()->only("titolo");
        $response = $this->json('PUT', $this->ritornaUrlFilm($filmModel->idFilm), $requestData);
        $response->assertStatus(403);
    }

    /** @test */
    public function film_update_vuoto_test()
    {
        $this->impostaAmbiente();

        $userClient = $this->impostaUserClient();
        $token = $this->impostaToken($userClient);

        // TEST Administrator
        $role = UserClientModel::sincronizzaUserRole($userClient->idUserClient, 1);
        $idFilm = rand(1, 100);
        $response = $this->withHeader('Authorization', 'Bearer' . $token)->json('PUT', $this->ritornaUrlFilm($idFilm));
        $response->assertStatus(404);


        // TEST User 
        $role = UserClientModel::sincronizzaUserRole($userClient->idUserClient, 2);
        $idFilm = rand(1, 100);
        $response = $this->withHeader('Authorization', 'Bearer' . $token)->json('PUT', $this->ritornaUrlFilm($idFilm));
        // $response->assertStatus(403);

        // TEST Visitor
        $role = UserClientModel::sincronizzaUserRole($userClient->idUserClient, 3);
        $idFilm = rand(1, 100);
        $response = $this->json('PUT', $this->ritornaUrlFilm($idFilm));
        $response->assertStatus(403);
    }


    /** @test */
    public function film_delete_test()
    {
        $this->impostaAmbiente();
        $userClient = $this->impostaUserClient();
        $token = $this->impostaToken($userClient);

        // TEST Administrator
        $role = UserClientModel::sincronizzaUserRole($userClient->idUserClient, 1);
        $filmModel = FilmModel::factory()->create();
        $response = $this->withHeader('Authorization', 'Bearer' . $token)->json('DELETE', $this->ritornaUrlFilm($filmModel->idFilm));
        $response->assertStatus(204);

        // TEST User
        $role = UserClientModel::sincronizzaUserRole($userClient->idUserClient, 2);
        $filmModel = FilmModel::factory()->create();
        $response = $this->withHeader('Authorization', 'Bearer' . $token)->json('DELETE', $this->ritornaUrlFilm($filmModel->idFilm));
        $response->assertStatus(403);

        // TEST Visitor
        $role = UserClientModel::sincronizzaUserRole($userClient->idUserClient, 3);
        $filmModel = FilmModel::factory()->create();
        $response->assertStatus(403);
    }

    /** @test */
    public function serieTv_delete_vuoto_test()
    {
        $this->impostaAmbiente();
        $userClient = $this->impostaUserClient();
        $token = $this->impostaToken($userClient);

        // TEST Administrator
        $role = UserClientModel::sincronizzaUserRole($userClient->idUserClient, 1);
        $idFilm = rand(1, 100);
        $response = $this->withHeader('Authorization', 'Bearer' . $token)->json('DELETE', $this->ritornaUrlFilm($idFilm));
        $response->assertStatus(204);

        // TEST User
        $role = UserClientModel::sincronizzaUserRole($userClient->idUserClient, 2);
        $idFilm = rand(1, 100);
        $response = $this->withHeader('Authorization', 'Bearer' . $token)->json('DELETE', $this->ritornaUrlFilm($idFilm));
        $response->assertStatus(403);

        // TEST Visitor
        $role = UserClientModel::sincronizzaUserRole($userClient->idUserClient, 3);
        $idFilm = rand(1, 100);
        $response = $this->json('DELETE', $this->ritornaUrlFilm($idFilm));
        $response->assertStatus(403);
    }

    // PROTECTED

    protected function impostaAmbiente()
    {
        $this->impostaConfigurazioni();
        $n = ConfigurationModel::all()->count();
        $this->assertEquals($n, 4);

        $this->impostaDBAbilita();
        $n = UserAbilityModel::all()->count();
        $this->assertEquals($n, 4);

        $this->impostaDBRuolo();
        $n = UserRoleModel::all()->count();
        $this->assertEquals($n, 4);

        $this->impostaDBRuoloAbilita();
        $this->impostaGate();
    }

    protected function impostaConfigurazioni()
    {
        ConfigurationModel::create([
            "idConfiguration" => 1,
            "key" => "maxLoginMistake",
            "value" => "5"
        ]);

        ConfigurationModel::create([
            "idConfiguration" => 2,
            "key" => "challengeTime",
            "value" => "30"
        ]);

        ConfigurationModel::create([
            "idConfiguration" => 3,
            "key" => "sessionTime",
            "value" => "600000"
        ]);

        ConfigurationModel::create([
            "idConfiguration" => 4,
            "key" => "howPasswordRemaining",
            "value" => "3"
        ]);
    }

    protected function impostaUserClient()
    {
        $userClient = hash("sha512", trim("User"));
        $challenge = hash("sha512", trim("Challenge"));
        $secret =  trim(Str::random(20));

        $userClient = UserClientModel::factory()->create();
        $userClient->idUserClient = 1;
        $userClient->archived = 0;
        $userClient->save();

        $auth = new UserAuthModel();
        $auth->idUserClient = $userClient->idUserClient;
        $auth->secretJWT = $secret;
        $auth->user = $userClient;
        $auth->challenge = $challenge;
        $auth->challengeStart = time();
        $auth->save();
        return $userClient;
    }

    protected function impostaDBAbilita()
    {
        $arr = ["Leggere", "Creare", "Aggiornare", "Eliminare"];
        foreach ($arr as $item) {
            UserAbilityModel::create([
                'nome' => $item,
                'power' => strtolower($item)
            ]);
        }
    }

    protected function impostaDBRuolo()
    {
        $arr = ["Administrator", "User", "Visitor"];
        foreach ($arr as $item) {
            UserRoleModel::create([
                'nome' => $item,
                'deleted_at' => null
            ]);
        }
    }

    protected function impostaGate()
    {
        // Gate Single Role
        UserRoleModel::all()->each(
            function (UserRoleModel $role) {
                Gate::define($role->nome, function (UserClientModel $userClient) use ($role) {
                    return $userClient->role->contains('nome', $role->nome);
                });
            }
        );

        // Gate Multi Role
        UserAbilityModel::all()->each(function (UserAbilityModel $ability) {
            Gate::define($ability->power, function (UserClientModel $userClient) use ($ability) {
                $check = false;
                foreach ($userClient->role as $item) {
                    $check = true;
                    break;
                }
                return $check;
            });
        });
    }

    protected function impostaDBRuoloAbilita()
    {
        $role = 1;
        $ability = [1, 2, 3, 4];
        UserRoleModel::sincronizzaRoleAbility($role, $ability);
        $role = 2;
        $ability = [1];
        UserRoleModel::sincronizzaRoleAbility($role, $ability);
    }

    protected function impostaToken($userClient)
    {
        $session = UserSessionModel::factory()->create()->first();
        $session->idUserClient = $userClient->idUserClient;
        $auth = UserAuthModel::where("idUserClient", $userClient->idUserClient)->first();
        $token = AppHelpers::createTokenSession($userClient->idUserClient, $auth->secretJWT);
        $session->token = $token;
        $session->save();
        $session = UserSessionModel::where("idUserClient", $userClient->idUserClient)->first();
        $this->assertEquals($token, $session->token);
        return $token;
    }

    protected static function pulisciArray($arrKey)
    {
        $key = array_search("episodi", $arrKey);
        if ($key !== false) array_splice($arrKey, $key, 1);
        $key = array_search("deleted_at", $arrKey);
        if ($key !== false) array_splice($arrKey, $key, 1);
        $key = array_search("created_at", $arrKey);
        if ($key !== false) array_splice($arrKey, $key, 1);
        $key = array_search("updated_at", $arrKey);
        if ($key !== false) array_splice($arrKey, $key, 1);

        return $arrKey;
    }

    protected function ritornaStrutturaJsonMultiplaFilm($admin = 0)
    {
        return ['*' => $this->ritornaStrutturaJsonSingolaFilm($admin)];
    }

    protected function ritornaStrutturaJsonSingolaFilm($admin = 0)
    {
        if ($admin == 1) {
            return self::STRUTTURA;
        } else {
            $arr = [
                "idFilm",
                "idCategory",
                "idNazione",
                "titolo",
                "descrizione",
                "durata",
                "regista",
                "attori",
                "anno",
                "idImg",
                "idFilmato",
                "idTrailer"
            ];
        }
        return $arr;
    }

    /**
     * Sincronizza i ruoli per il contatto sulla tabella userClient_userRole
     * 
     * @param integer $idAbility
     * @param string|array $idRole
     * @return Collection
     */
    public static function sincronizzaRoleAbility($idAbility, $idRole)
    {
        $idAbility = UserAbilityModel::where("idUserAbility", $idAbility)->firstOrFail();
        if (is_string($idRole)) {
            $tmp = explode(',', $idRole);
        } else {
            $tmp = $idRole;
        }
        $idAbility->role()->sync($tmp);
        return $idAbility->role;
    }

    protected function ritornaUrlFilm($idFilm = null)
    {
        $url = '/api/v1' . self::RISORSA;
        if ($idFilm != null) {
            $url = $url . '/' . $idFilm;
        }
        return $url;
    }
}
