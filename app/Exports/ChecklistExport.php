<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\SGC\App\Models\Checklist;

class ChecklistExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    use Exportable;

    private $checklist;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($checklist = null)
    {
        $this->checklist = $checklist;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(): mixed
    {
        return $this->checklist ?: Checklist::all();
    }

    /**
     * devolvemos los encabezados de la tabla
     * @return array
     */
    public function headings(): array
    {
        return [
            'Id',
            'tipo',
            'Centro Costo', 
            'Proceso', 
            'Fecha Actividad', 
            'Responsable', 
            'Auditados', 
            'Documentos de refeencia',
            'Observaciones', 
            'Elaborado por',
            'Creado Por',
            'Actaulizado Por',
        ];
    }
}
