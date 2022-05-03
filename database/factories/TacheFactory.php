<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tache>
 */
class TacheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'libelle' => $this->faker->word(),
            'duree' => $this->faker->randomElement(['12/2/2022', '2/1/2012']),
            'projet_id' => $this->faker->numberBetween(1,50),
            'membre_id' => $this->faker->numberBetween(1,20),
            'executand_nom' => $this->faker->randomElement(['Sira Sidibé', 'Arouna Sidick', 'Sidick', 'Yann Kouamé', 'Chérif Ben Ali']),
        ];
    }
}
