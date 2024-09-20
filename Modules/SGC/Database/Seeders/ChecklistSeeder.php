<?php

namespace Modules\SGC\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Modules\SGC\App\Models\Checklist;

class ChecklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);
        Checklist::factory()->create([
            'cycle_id' => 1,
            'type' => 'Auditoria',
            'destination_id' => 1,
            'process' => 'LOGISTICA',
            'date_activity' => Carbon::parse('03/10/2023'),
            'responsible' => 'Ariana Cantero
                             Tania Martinez
                             Kelly Petro',
            'audited' => 'Manuel Ragel
                         Nel Guerra
                        Aldair Hoyos',
            'documents' => 'ISO 9001:2015 numerales 4.2 ...',
            'observations' => 'Se identifica fortalez en la identificación y trazabilidad del producto',
            'prepared_by' => 'Ariana Cantero Auditor Lider',
            'accepted_by' => 'Manuel Ragel auditado',
        ]);

        Checklist::factory()->create([
            'cycle_id' => 1,
            'type' => 'Auditoria',
            'destination_id' => 1,
            'process' => 'Planeación y Control',
            'date_activity' => Carbon::parse('04/10/2023'),
            'responsible' => 'Estefania Bolaño
                             manuel Ragel',
            'audited' => 'MOnica Montes
                         Ariana Cantero
                        Elainis Parodi',
            'documents' => 'ISO 9001:2015 numerales 4.2 ...',
            'observations' => 'Se identifica fortalez en la identificación y trazabilidad del producto',
            'prepared_by' => 'Manuel Rangel Auditor Lider',
            'accepted_by' => 'Monica Montes Auditado',
        ]);

        Checklist::factory()->create([
            'cycle_id' => 1,
            'type' => 'Auditoria',
            'destination_id' => 1,
            'process' => 'Seguimiento y Mejora',
            'date_activity' => Carbon::parse('06/10/2023'),
            'responsible' => 'Manuel Ragel
                            Observador:
                            Alexandra Begambre',
            'audited' => 'Ariana Cantero',
            'documents' => 'ISO 9001:2015 numerales 4.2 ...',
            'observations' => 'Se identifica fortalez en la identificación y trazabilidad del producto',
            'prepared_by' => 'Manuel Rangel Auditor Lider',
            'accepted_by' => 'Ariana Cantero Auditado',
        ]);

        Checklist::factory()->create([
            'cycle_id' => 2,
            'type' => 'Auditoria',
            'destination_id' => 1,
            'process' => 'LOGISTICA',
            'date_activity' => Carbon::parse('03/10/2023'),
            'responsible' => 'Ariana Cantero
                             Tania Martinez
                             Kelly Petro',
            'audited' => 'Manuel Ragel
                         Nel Guerra
                        Aldair Hoyos',
            'documents' => 'ISO 9001:2015 numerales 4.2 ...',
            'observations' => 'Se identifica fortalez en la identificación y trazabilidad del producto',
            'prepared_by' => 'Ariana Cantero Auditor Lider',
            'accepted_by' => 'Manuel Ragel auditado',
        ]);
    }
}
