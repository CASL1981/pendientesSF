<?php

namespace Modules\Pharmacy\Database\Factories;

use Carbon\Carbon;
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
        // Definimos los meses que queremos usar para distribuir los datos
        $meses = [1, 2, 3, 4, 6, 7, 8];
        $mesSeleccionado = $this->faker->randomElement($meses);
        $anio = now()->year; // O puedes ajustar el año según convenga
        // Para evitar problemas con días inválidos, usamos un rango seguro
        $dia = $this->faker->numberBetween(1, 28);

        return [
            'type' => $this->faker->randomElement(['Pedido', 'Requisición', 'Mensaje Interno']),
            'destination' => $this->faker->randomElement(['1000', '1100', '1300', '1600']),
            'category' => $this->faker->randomElement(['AUMENTO DE DEMANDA', 'BAJA ROTACIÓN', 'ENTREGA PROGRAMADA', 'PEDIDO ODONTOLOGIA']),
            'reason' => 'Razón de prueba',
            'duration' => $this->faker->numberBetween(1, 12),
            'EPS' => $this->faker->randomElement(['SANITAS', 'NUEVA EPS', 'SALUD TOTAL', 'COOSALUD']),
            'contracting_modality' => $this->faker->randomElement(['EVENTO', 'CAPITADO']),
            'user_id' => $this->faker->numberBetween(1, 10),
            'invoicing_method' => $this->faker->randomElement(['Capitado', 'Evento']),
            'manager' => $this->faker->name,
            'observations' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['Activo', 'Terminado']),
            // Generamos una fecha aleatoria en uno de los meses indicados
            'created_at' => Carbon::create(
                $anio,
                $mesSeleccionado,
                $dia,
                $this->faker->numberBetween(0, 23),
                $this->faker->numberBetween(0, 59),
                $this->faker->numberBetween(0, 59)
            ),
            'updated_at' => now(),
        ];
    }
}

