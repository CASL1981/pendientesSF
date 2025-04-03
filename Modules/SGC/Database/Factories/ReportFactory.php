<?php

namespace Modules\SGC\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\SGC\App\Models\Report::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

