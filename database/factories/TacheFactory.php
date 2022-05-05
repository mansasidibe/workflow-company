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
            'duree' => $this->faker->randomElement(['2 heures', '6 mois']),
            'projet_id' => $this->faker->numberBetween(1,5),
            'membre_id' => $this->faker->numberBetween(1,5),
            'executand_nom' => $this->faker->randomElement(['Sira Sidibé', 'Arouna Sidick', 'Sidick', 'Yann Kouamé', 'Chérif Ben Ali']),
        ];
    }
}
