<?php

namespace Tests\Feature\Http\Controllers\Api\v1;

use App\Models\UserClientModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertSame;

class UserClientControllerTest extends TestCase
{
    // la classe RefreshDatabase istanzia e attiva tutto l'ambiente di lavoro predisponendo il tutto
    use RefreshDatabase;

    /**
     * Struttura della risorsa analizzabile
     * 
     * @const
     */
    protected const STRUTTURA = [
        'idUserClient',
        'idUserStatus',
        'nome',
        'cognome',
        'sesso',
        'codiceFiscale',
        'partitaIva',
        'cittadinanza',
        'idNazioneNascita',
        'cittaNascita',
        'provinciaNascita',
        'dataNascita',
        'archived',
        'createb_by',
        'updated_by'
    ];

    /**
     * Risorsa per la creazione dell'endpoint
     * 
     * @const
     */
    protected const RISORSA = "userClient";

    /**
     * TestCase INDEX
     */

    /** @test */
    public function user_client_index_test(): void
    {
        // creare i dati del model attraverso la factory
        $userClient = UserClientModel::factory()->count(rand(1, 5))->create()->map(
            function ($model) {
                $arr = $this->ritornaStrutturaJsonSingola();
                $dati = $model->only($arr);
                $arrTmp = array();
                foreach ($arr as $item) {
                    $arrTmp[$item] = $dati[$item];
                }
                return $arrTmp;
            }
        )->toArray();

        // interrogare l'endpoint
        $response = $this->json('GET', $this->ritornaUrl());
        // controllare che ci dia una risposta 200 ok
        $response->assertStatus(200);
        // verificare che la struttura della risposta sia corretta
        $response->assertJsonStructure(['data' => $this->ritornaStrutturaJsonMultipla()]);
        // verificare la correttezza della risposta
        $response->assertJson(['data' => $userClient]);
    }

    /**
     *  TestCase in caso di userClient vuoto
     */

    /** @test */
    public function user_client_index_vuoto_test()
    {
        // Richiedo la risorsa senza aver inserito nulla
        $response = $this->json('GET', $this->ritornaUrl());
        // controllo che si riceva una risposta di tipo 200 ok
        $response->assertStatus(200);
        // verifico che la risposta sia corretta e quindi vuota
        $response->assertJson(['data' => []]);
    }

    /**
     * TestCase STORE per creare un nuovo userClient
     */

    /** @test */
    public function user_client_store_test()
    {
        // Creo i dati da inserire nel database a partire dalla factory
        // Il make() crera ma non inserisce a DB
        $requestDati = UserClientModel::factory()->make()->only([
            'idUserClient',
            'idUserStatus',
            'nome',
            'cognome',
            'sesso',
            'codiceFiscale',
            'partitaIva',
            'cittadinanza',
            'idNazioneNascita',
            'cittaNascita',
            'provinciaNascita',
            'dataNascita',
            'archived',
            'createb_by',
            'updated_by'
        ]);
        // Invio la richiesta di inserimento dati
        $response = $this->json('POST', $this->ritornaUrl(), $requestDati);
        // Mi aspetto una risposta di tipo 201 risorsa creata
        $response->assertStatus(201);
        // Verifico che la struttura della risorsa sia corretta
        $response->assertJsonStructure(['data' => $this->ritornaStrutturaJsonSingola()]);
        // Verifico che la risposta sia corretta
        $response->assertJson(['data' => $requestDati]);
    }

    /**
     * TestCase SHOW per leggere il singolo userClient
     */

    /** @test */
    public function user_client_show_test()
    {
        // creo ed inserisco la risorsa nel DB
        $userClient = UserClientModel::factory()->create();
        // richiedo la risorsa appena creata all'endpoint
        $response = $this->json('GET', $this->ritornaUrl($userClient->idUserClient));
        // controllo che ci dia una risposta 200 ok
        $response->assertStatus(200);
        // verifico che la struttura della risposta sia corretta
        $response->assertJsonStructure(['data' => $this->ritornaStrutturaJsonSingola()]);
        // pulisco la risposta del model con i dati necessari al confronto
        $responseConfronto = $userClient->only($this->ritornaStrutturaJsonSingola());
        // verifico che la risposta sia corretta
        $response->assertJson(['data' => $responseConfronto]);
    }

    /**
     *  TestCase per cercare una risorsa singola che non trovo
     */

    /** @test */
    public function user_client_show_vuoto_test()
    {
        // creo un idUserClient random
        $idUserClient = rand(1, 100);
        // richiedo la risorsa appena creata all'endpoint
        $response = $this->json('GET', $this->ritornaUrl($idUserClient));
        // controllo che ci dia una risposta 404 File Not Found
        $response->assertStatus(404);
    }

    /**
     *  TestCase per aggiornare una risorsa
     */

    /** @test */
    public function user_client_update_test()
    {
        // creo ed inserisco la risorsa nel DB
        $userClient = UserClientModel::factory()->create();
        // creo dei dati da aggiornare
        $requestDati = UserClientModel::factory()->make()->only([
            'idUserClient',
            'idUserStatus',
            'nome',
            'cognome',
            'sesso',
            'codiceFiscale',
            'partitaIva',
            'cittadinanza',
            'idNazioneNascita',
            'cittaNascita',
            'provinciaNascita',
            'dataNascita',
            'archived',
            'createb_by',
            'updated_by'
        ]);
        $response = $this->json('PUT', $this->ritornaUrl($userClient->idUserClient), $requestDati);
        // controllo che ci dia una risposta 200 ok
        $response->assertStatus(200);
        // estraggo i date della response
        // $response = array("nome" => $response->json()["data"]["nome"]);
        $responseData = $response->json()["data"];
        $response = [];
        foreach ($requestDati as $key => $value) {
            if (in_array($key, [
                'idUserClient',
                'idUserStatus',
                'nome',
                'cognome',
                'sesso',
                'codiceFiscale',
                'partitaIva',
                'cittadinanza',
                'idNazioneNascita',
                'cittaNascita',
                'provinciaNascita',
                'dataNascita',
                'archived',
                'createb_by',
                'updated_by'
            ])) {
                $response[$key] = $responseData[$key];
            }
        }

        // verifico che la risposta sia corretta
        $this->assertEquals($requestDati, $response);
    }

    /**
     *  TestCase per aggiornare una risorsa non eisente
     */

    /** @test */
    public function user_client_update_vuoto_test()
    {
        // creo un idUserClient random
        $idUserClient = rand(1, 100);
        // creo dei dati da aggiornare
        $requestDati = UserClientModel::factory()->make()->only([
            'idUserClient',
            'idUserStatus',
            'nome',
            'cognome',
            'sesso',
            'codiceFiscale',
            'partitaIva',
            'cittadinanza',
            'idNazioneNascita',
            'cittaNascita',
            'provinciaNascita',
            'dataNascita',
            'archived',
            'createb_by',
            'updated_by'
        ]);
        // invio la risorsa appena creata all'endpoint per fare upload
        $response = $this->json('PUT', $this->ritornaUrl($idUserClient), $requestDati);
        // controllo che ci dia una risposta 404 File Not Found
        $response->assertStatus(404);
        // controllo che il ritorno sia nullo
        $this->assertNull(UserClientModel::find($idUserClient));
    }

    /**
     *  TestCase per cancellare una risorsa
     */

    /** @test */
    public function user_client_delete_test()
    {
        // creo ed inserisco una risorsa nel DB
        $userClient = UserClientModel::factory()->create();
        // invio la risorsa all'endpoint per fare la DELETE
        $response = $this->json('DELETE', $this->ritornaUrl($userClient->idUserClient));
        // mi aspetto un status 204 No content
        $response->assertStatus(204);
        // controllo che non esista più la ricerca a DB
        $this->assertNull(UserClientModel::find($userClient->idUserClient));
    }

    /**
     *  TestCase per cancellare una risorsa che non esiste
     */

    /** @test */
    public function user_client_delete_vuoto_test()
    {
        // creo un idUserClient random
        $idUserClient = rand(1, 100);
        // ivnito la risorsa all'endpoint per fare la DELETE
        $response = $this->json('DELETE', $this->ritornaUrl($idUserClient));
        // controllo che ci dia una risposta 404 File Not Fount
        $response->assertStatus(404);
    }

    // PROTECTED
    protected function ritornaStrutturaJsonMultipla()
    {
        return ['*' => $this->ritornaStrutturaJsonSingola()];
        // Qui sostanzialmente ritorniamo un array dove diciamo che tutti gli elementi devono avere la struttura singola
    }

    protected function ritornaStrutturaJsonSingola()
    {
        return self::STRUTTURA;
    }

    protected function ritornaUrl($id = null)
    {
        $url = '/api/v1' . self::RISORSA;
        if ($id != null) {
            $url = $url . '/' . $id;
        }
        return $url;
    }
}
