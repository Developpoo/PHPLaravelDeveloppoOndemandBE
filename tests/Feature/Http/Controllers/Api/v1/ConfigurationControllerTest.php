<?php

namespace Tests\Feature\Http\Controllers\Api\v1;

use App\Models\ConfigurationModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ConfigurationControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function configuration_index_test()
    {
        // Crea alcuni dati di configurazione nel database per il test
        ConfigurationModel::factory()->create([
            'key' => '800A',
            'value' => 'Forte',
        ]);

        // Effettua la richiesta GET alla rotta index del controller
        $response = $this->get('/api/v1/configuration');

        // Assicurati che la risposta abbia lo status code 200 (OK)
        $response->assertStatus(200);

        // Assicurati che la risposta contenga i dati di configurazione
        $response->assertJson([
            'data' => [
                [
                    'key' => '800A',
                    'value' => 'Forte',
                ],
            ],
        ]);
    }

    /** @test */
    public function configuration_show_test()
    {
        // Crea un dato di configurazione nel database per il test
        $configuration = ConfigurationModel::factory()->create([
            'key' => '800A',
            'value' => 'Forte',
        ]);

        // Effettua la richiesta GET alla rotta show del controller con l'ID della configurazione
        $response = $this->get('/api/v1/configuration/' . $configuration->idConfiguration);

        // Assicurati che la risposta abbia lo status code 200 (OK)
        $response->assertStatus(200);

        // Assicurati che la risposta contenga i dati di configurazione
        $response->assertJson([
            'data' => [
                'key' => '800A',
                'value' => 'Forte',
            ],
        ]);
    }
}
