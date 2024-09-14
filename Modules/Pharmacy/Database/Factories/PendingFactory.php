<?php

namespace Modules\Pharmacy\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PendingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Pharmacy\App\Models\Pending::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['Pedido', 'Requisición', 'Mensaje Interno']),
            'destination_id' => $this->faker->numberBetween(1, 10),
            'product_id' => $this->faker->numberBetween(1, 100),
            'quantity' => $this->faker->numberBetween(1, 100),
            'send_quantity' => $this->faker->numberBetween(1, 100),
            'reason' => 'Razón de prueba',
            'duration' => $this->faker->numberBetween(1, 12),
            'EPS' => $this->faker->randomElement(['SANITAS', 'NUEVA EPS', 'SALUD TOTAL', 'COOSALUD']),
            'contracting_modality' => $this->faker->word,
            'user_id' => $this->faker->numberBetween(1, 50),
            'invoicing_method' => $this->faker->randomElement(['Capitado', 'Evento']),
            'manager' => $this->faker->name,
            'order' => $this->faker->numberBetween(1000, 2000),
            'circular' => $this->faker->numberBetween(1000, 2000),
            'observations' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['Pendiente', 'Aprobado', 'Rechazado', 'Enviado', 'Recibido']),
        ];
    }
}

