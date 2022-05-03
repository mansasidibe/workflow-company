<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipe>
 */
class EquipeFactory extends Factory
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
            'nom' => $this->faker->word(),
            'chef' => $this->faker->randomElement(['Sira Sidibé', 'Arouna Sidick', 'Sidick', 'Yann Kouamé', 'Chérif Ben Ali']),
            // 'user_id' => $this->faker->numberBetween(1,20),
        ];
    }
}
