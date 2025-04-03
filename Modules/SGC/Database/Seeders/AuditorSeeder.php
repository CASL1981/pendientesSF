<?php

namespace Modules\SGC\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\SGC\App\Models\Auditor;

class AuditorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Auditor::factory()->create([
            'cycle_id' => 1,
            'identification' => 1143365495,
            'first_name' => 'Ariana Gisela',
            'last_name' => 'Cantero Muñoz',
            'position' => 'Coordiandor Sistema de Gestion',
            'rol_auditor' => 'Auditor Lider',
        ]);

        Auditor::factory()->create([
            'cycle_id' => 1,
            'identification' => 7383633,
            'first_name' => 'Carlos Arturo',
            'last_name' => 'Sibaja López',
            'position' => 'Coordiandor Contable',
            'rol_auditor' => 'Auditor',
        ]);

        Auditor::factory()->create([
            'cycle_id' => 1,
            'identification' => 1067908130,
            'first_name' => 'Katerin',
            'last_name' => 'Pertuz Jimenez',
            'position' => 'Auxiliar Contable',
            'rol_auditor' => 'Observador',
        ]);
    }
}
