<?php

namespace Modules\Shopping\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Shopping\App\Models\Product::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'item' => $this->faker->unique()->numberBetween(1, 10000),
            'description' => $this->faker->sentence,
            'brand' => $this->faker->company,
            'ATC' => $this->faker->word,
            'invima' => $this->faker->word,
            'measure_unit' => $this->faker->randomElement(['UN', 2, 3]),
            'presentation' => $this->faker->word,
            'concentration' => $this->faker->word,
            'pharmaceutical_form' => $this->faker->word,
            'generic_name' => $this->faker->word,
            'generic_code' => $this->faker->unique()->numberBetween(1, 10000),
            'tax_percentage' => $this->faker->unique()->numberBetween(1, 10000),
        ];
    }
}

