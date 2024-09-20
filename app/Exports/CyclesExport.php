<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\SGC\App\Models\Cycle;

class CyclesExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    use Exportable;

    private $cycles;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($cycles = null)
    {
        $this->cycles = $cycles;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(): mixed
    {
        return $this->cycles ?: Cycle::all();
    }

    /**
     * devolvemos los encabezados de la tabla
     * @return array
     */
    public function headings(): array
    {
        return [
            'Id',
            'Año',
            'Descripción',
            'Estado',
            'Creado Por',
            'Actaulizado Por',
        ];
    }
}
