<?php

namespace Modules\HumanTalent\Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\HumanTalent\App\Models\Employee::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'identification' => $this->faker->numberBetween(1000000, 2000000),
			'first_name' => $this->faker->name,
			'last_name' => $this->faker->name,
            'status' => true,
            'type_document' => 'CC',
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'cel_phone' => $this->faker->phoneNumber,
			'entry_date' => Carbon::now(),
            'email' => $this->faker->unique()->safeEmail(),
			'gender' => $this->faker->randomElement(['M', 'F']),
			'birth_date' => Carbon::now(),
			'location_id' => $this->faker->numberBetween(1, 10),
			'photo_path' => '',
        ];
    }
}

