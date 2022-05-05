<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projet>
 */
class ProjetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->randomElement(['RH SYSTEM', 'CORVALES', 'BOUDAPP', 'KORHA', 'BATI-CHECK']),
            'date_debut' => $this->faker->randomElement(['12/2/2022', '2/1/2012', '04/03/2021']),
            'duree' => $this->faker->randomElement(['12 mois', '2 mois', '6 semaines']),
            'equipe_id' => $this->faker->numberBetween(1,5)
        ];
    }
}
