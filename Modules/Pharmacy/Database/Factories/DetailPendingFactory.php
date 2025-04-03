<?php

namespace Modules\Pharmacy\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Shopping\App\Models\Product;

class DetailPendingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Pharmacy\App\Models\DetailPending::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'product_id' => $productId = $this->faker->numberBetween(1, 1000),
            'product_name' => Product::find($productId)->description,
            'brand' => 'Marca',
            'pending_id' => 100,
            'destination' => $this->faker->randomElement(['1000', '1100', '1300', '1600']),
            'quantity' => $this->faker->numberBetween(1, 100),
            'send_quantity' => 0,
            'order' => '',
            'circular' => '',
            'observations' => '',
        ];
    }
}

