<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Modules\Pharmacy\App\Models\Stock;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Modules\Shopping\App\Models\Product;

class StockImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Crear y devolver una nueva instancia de Stock
        return new Stock([
            'year'         => $row['year'],        // Nombre del encabezado
            'period'       => $row['period'],      // Nombre del encabezado
            'product_id'   => $row['productid'],  // Nombre del encabezado
            'product_name' => $row['productname'],// Nombre del encabezado
            'quantity'     => $row['disponible'],    // Nombre del encabezado
            'generic_code' => Product::where('item', $row['productid'])->first()->generic_code, //conuslta a la tabla productos para obtener el codigo generico
        ]);
    }


    /**
     * Define desde qué fila comienza la lectura (para saltar filas iniciales).
     */
    public function startRow(): int
    {
        return 2; // Asumiendo que los datos útiles empiezan en la fila 2
    }
}
