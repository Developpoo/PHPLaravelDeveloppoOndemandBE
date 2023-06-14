<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class IndirizzoModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "idIndirizzo" => $this->faker->numberBetween(2, 10),
            "idUserClient" => $this->faker->numberBetween(2, 10),
            "idTipoIndirizzo" => $this->faker->numberBetween(1, 6),
            "idComune" => $this->faker->numberBetween(1, 600),
            "idNazione" => $this->faker->numberBetween(1, 252),
            "indirizzo" => $this->faker->sentence(2),
            "civico" => $this->faker->numberBetween(1,199),
            "cap" => $this->faker->numberBetween(10000, 120000),
            "localita" => null,
            "comune" => $this->faker->unique()->word(),
        ];
    }
}
