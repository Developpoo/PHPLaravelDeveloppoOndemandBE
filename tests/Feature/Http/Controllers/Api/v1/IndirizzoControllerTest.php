<?php

namespace Tests\Feature\Http\Controllers\Api\v1;

use App\Models\IndirizzoModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndirizzoControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function indirizzo_index_test()
    {
        // Crea alcuni dati di indirizzo nel database per il test
        $indirizzo1 = IndirizzoModel::factory()->create();
        $indirizzo2 = IndirizzoModel::factory()->create();

        // Effettua una richiesta GET alla rotta index del controller
        $response = $this->get('/api/v1/indirizzi');

        // Assicurati che la risposta abbia lo status code 200 (OK)
        $response->assertStatus(200);

        // Assicurati che la risposta contenga i dati di indirizzo
        $response->assertJson(['data' => $indirizzo1->toArray()]);
        $response->assertJson(['data' => $indirizzo2->toArray()]);

        // $response->assertJson([
        //     'data' => [
        //         [
        //             'idIndirizzo' => $indirizzo1->idIndirizzo,
        //             'idUserClient' => $indirizzo1->idUserClient,
        //             'idTipoIndirizzo' => $indirizzo1->idTipoIndirizzo,
        //         ],
        //         [
        //             'idIndirizzo' => $indirizzo2->idIndirizzo,
        //             'idUserClient' => $indirizzo2->idUserClient,
        //             'idTipoIndirizzo' => $indirizzo2->idTipoIndirizzo,
        //         ],
        //     ],
        // ]);
    }

    /** @test */
    public function indirizzo_store_test()
    {
        // Simula una richiesta POST alla rotta store del controller
        $response = $this->post('/api/v1/indirizzi', [
            'idUserClient' => 1,
            'idTipoIndirizzo' => 2,
        ]);

        // Assicurati che la risposta abbia lo status code 201 (CREATED)
        $response->assertStatus(201);

        // Assicurati che la risposta contenga i dati dell'indirizzo creato
        $response->assertJson([
            'data' => [
                'idUserClient' => 1,
                'idTipoIndirizzo' => 2,
            ],
        ]);

        // Assicurati che l'indirizzo sia stato salvato nel database
        // Nel contesto dei test, assertDatabaseHas viene utilizzato per verificare se 
        // i dati sono stati correttamente salvati nel database dopo aver eseguito un'operazione
        $this->assertDatabaseHas('indirizzi', [
            'idUserClient' => 1,
            'idTipoIndirizzo' => 2,
        ]);
    }

    /** @test */
    public function indirizzo_show_test()
    {
        // Crea un dato di indirizzo nel database per il test
        $indirizzo = IndirizzoModel::factory()->create();

        // Effettua una richiesta GET alla rotta show del controller con l'ID dell'indirizzo
        $response = $this->get('/api/v1/indirizzi/' . $indirizzo->idIndirizzo);

        // Assicurati che la risposta abbia lo status code 200 (OK)
        $response->assertStatus(200);

        // Assicurati che la risposta contenga i dati dell'indirizzo
        $response->assertJson([
            'data' => [
                'idIndirizzo' => $indirizzo->idIndirizzo,
                'idUserClient' => $indirizzo->idUserClient,
                'idTipoIndirizzo' => $indirizzo->idTipoIndirizzo,
            ],
        ]);
    }

    /** @test */
    public function indirizzo_update_test()
    {
        // Crea un dato di indirizzo nel database per il test
        $indirizzo = IndirizzoModel::factory()->create();

        // Simula una richiesta PUT alla rotta update del controller con l'ID dell'indirizzo
        $response = $this->put('/api/v1/indirizzi/' . $indirizzo->idIndirizzo, [
            'idUserClient' => 1,
            'idTipoIndirizzo' => 2,
        ]);

        // Assicurati che la risposta abbia lo status code 200 (OK)
        $response->assertStatus(200);

        // Assicurati che la risposta contenga i dati dell'indirizzo aggiornato
        $response->assertJson([
            'data' => [
                'idUserClient' => 1,
                'idTipoIndirizzo' => 2,
            ],
        ]);

        // Assicurati che l'indirizzo nel database sia stato aggiornato
        $this->assertDatabaseHas('indirizzi', [
            'idIndirizzo' => $indirizzo->idIndirizzo,
            'idUserClient' => 1,
            'idTipoIndirizzo' => 2,
        ]);
    }

    /** @test */
    public function indirizzo_delete_test()
    {
        // Crea un dato di indirizzo nel database per il test
        $indirizzo = IndirizzoModel::factory()->create();

        // Simula una richiesta DELETE alla rotta destroy del controller con l'ID dell'indirizzo
        $response = $this->delete('/api/v1/indirizzi/' . $indirizzo->idIndirizzo);

        // Assicurati che la risposta abbia lo status code 204 (NO CONTENT)
        $response->assertStatus(204);

        // Assicurati che l'indirizzo sia stato eliminato dal database
        $this->assertDatabaseMissing('indirizzi', [
            'idIndirizzo' => $indirizzo->idIndirizzo,
        ]);
    }
}
