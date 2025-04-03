<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\Pharmacy\App\Models\Pending;

class PendingsExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    use Exportable;

    private $pendings;

    public function __construct($pendings = null)
    {
        $this->pendings = $pendings;
    }

    /**
     * devolvemos los encabezados de la tabla
     * @return array
     */
    public function headings(): array
    {
        return [
            'Id',
            'Tipo',
            'Categoría',
            'Destino',
            'Razón',
            'Duración',
            'EPS',
            'Modalidad de Contratación',
            'Usuario',
            'Método de Facturación',
            'Gerente',
            'Observaciones',
            'Estado'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->pendings ?: Pending::all();
    }
}
