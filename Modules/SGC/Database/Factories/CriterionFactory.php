<?php

namespace Modules\SGC\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CriterionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\SGC\App\Models\Criterion::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

