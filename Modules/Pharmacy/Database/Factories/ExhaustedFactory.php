<?php

namespace Modules\Pharmacy\Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExhaustedFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Pharmacy\App\Models\Exhausted::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'generic_code' => $productId = $this->faker->numberBetween(1, 1000),
            'generic_name' => $this->faker->word,
            'product_name' => $this->faker->sentence,
            'manufacturer' => $this->faker->company,
            'classification' => $this->faker->randomElement(['MEDICAMENTOS DE CONTROL', 'MEDICAMENTOS', 'IMAGENES DIAGNOSTICAS', 'EQUIPO DE LABORATORIO']),
            'circular_date' => Carbon::now(),
            'circular' => '',
        ];
    }
}

