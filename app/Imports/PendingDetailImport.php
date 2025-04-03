<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Modules\Pharmacy\App\Models\DetailPending;
use Modules\Pharmacy\App\Models\Pending;

class PendingDetailImport implements ToModel, WithHeadingRow, SkipsEmptyRows, WithValidation
{
    // use SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Crear y devolver una nueva instancia del detalle de los pendientes
        return new DetailPending([
            'product_id'   => $row['item'],         // item del producto
            'pending_id'   => $row['idpendiente'],  // Id del pendiente
            'product_name' => $row['nombreproducto'],// Nombre del producto
            'brand'        => $row['marca'],        // Marca del producto
            'destination'  => $row['centrocosto'],  // Centro de costo del producto
            'quantity'     => $row['cantidad'],   // Cantidades solicitadas
        ]);
    }


    /**
     * Define desde qué fila comienza la lectura (para saltar filas iniciales).
     */
    public function startRow(): int
    {
        return 2; // Asumiendo que los datos útiles empiezan en la fila 2
    }

    /**
     * Define las reglas de validación para cada columna.
     */
    public function rules(): array
    {
        return [
            // Validamos que el campo "idpendiente" sea requerido y que el pendiente exista y esté activo.
            'idpendiente' => [
                'required',
                function ($attribute, $value, $fail) {
                    // Buscar el pendiente por su ID
                    $pending = Pending::find($value);
                    // Si no existe o su estado no es "activo", registramos el error
                    if (!$pending || $pending->status !== 'Activo') {
                        $fail("El pendiente con ID $value está cerrado o no existe.");
                    }
                }
            ],
            // Puedes agregar reglas adicionales para otros campos, si es necesario.
        ];
    }
}
