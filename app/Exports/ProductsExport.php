<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\Shopping\App\Models\Product;

class ProductsExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    use Exportable;

    private $products;

    public function __construct($products = null)
    {
        $this->products = $products;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->products ?: Product::all();
    }

    /**
     * devolvemos los encabezados de la tabla
     * @return array
     */
    public function headings(): array
    {
        return [
            'Id',
            'Item',
            'Descripción',
            'Marca',
            'ATC',
            'Invima',
            'UM',
            'Presentación',
            'Form Farmacéutica',
            'Concentración',
            'Nombre Generico',
            'Código',
            'IVA'
        ];
    }
}
