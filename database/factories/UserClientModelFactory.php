<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UserClientModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idUserClient' => $this->faker->numberBetween(5, 40),
            'idUserStatus' => $this->faker->numberBetween(0, 2),
            'nome' => $this->faker->unique()->word(),
            'cognome' => $this->faker->unique()->word(),
            'sesso' => $this->faker->numberBetween(0, 1),
            'codiceFiscale' => $this->faker->numberBetween(10000000000000000, 90000000000000000),
            'partitaIva' => $this->faker->numberBetween(10000000000000000, 90000000000000000),
            'cittadinanza' => $this->faker->unique()->word(),
            'idNazioneNascita' => $this->faker->numberBetween(1, 20),
            'cittaNascita' => $this->faker->unique()->word(),
            'nazioneNascita'  => $this->faker->unique()->word(),
            'provinciaNascita' => $this->faker->unique()->word(),
            'dataNascita' => $this->faker->numberBetween(100000, 200000),
            'archived' => $this->faker->numberBetween(0, 1),
            'created_by' => $this->faker->unique()->word(),
            'updated_by' => $this->faker->unique()->word()
        ];
    }
}
