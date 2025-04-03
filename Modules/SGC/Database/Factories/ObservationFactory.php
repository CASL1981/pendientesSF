<?php

namespace Modules\SGC\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ObservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\SGC\App\Models\Observation::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'checklist_id' => $this->faker->numberBetween(1, 8),
            'criterion_id' => $this->faker->numberBetween(1, 149),
            'description' => $this->faker->sentence(10),
            'evidence' => $this->faker->sentence(10),
            'consequence' => $this->faker->sentence(10),
            'requirement' => $this->faker->sentence(10),
            'status' => true,
        ];
    }
}

