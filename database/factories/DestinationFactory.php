<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destination>
 */
class DestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'costcenter' => $this->faker->randomElement(['1400', '1500', '1600', '1800', '1900', '2000', '2100']),
            'name' => $this->faker->randomElement(['Farmacia Monteria', 'Farmacia planeta rica', 'Farmacia San Antero', 'Farmacia la apartada', 'Farmacia puerto escondido', 'Farmacia puerto libertador' , 'Farmacia Nueva']),
            'address' => 'Interno de la ESE',
            'phone' => '6052222222',
            'location' => $this->faker->randomElement(['1400', '1500', '1600', '1800', '1900', '2000', '2100']),
            'minimun' => $this->faker->numberBetween(1, 10),
            'maximun' => $this->faker->numberBetween(1, 10),
        ];
    }
}
