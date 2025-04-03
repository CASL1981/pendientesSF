<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classification>
 */
class ClassificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->randomElement(['1', '1100', '1200', '1300', '1400', '1500', '1600']),
            'level' => $this->faker->numberBetween(1, 3),
            'parent' => $this->faker->randomElement(['1', '1100', '1200', '1300', '1400']),
            'name' => $this->faker->name,
			'impute' => $this->faker->randomElement([true, false]),
        ];
    }
}
