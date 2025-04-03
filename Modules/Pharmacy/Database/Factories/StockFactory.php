<?php

namespace Modules\Pharmacy\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Pharmacy\App\Models\Stock::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'year' => $this->faker->year,
            'period' => $this->faker->numberBetween(1, 12),
            'product_id' => $this->faker->unique()->numberBetween(1, 30000),
            'product_name' => $this->faker->word,
            'quantity' => $this->faker->numberBetween(1, 100),
            'available' => $this->faker->boolean,
            'generic_code' => $this->faker->unique()->numberBetween(1, 10000),
        ];
    }
}

