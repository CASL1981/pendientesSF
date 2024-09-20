<?php

namespace Modules\SGC\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CycleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\SGC\App\Models\Cycle::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'year' => date('Y'),
            'description' => $this->faker->sentence(5),
            'status' => true,
        ];
    }
}

