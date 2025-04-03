<?php

namespace Modules\SGC\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Modules\SGC\App\Models\Report;

class ReporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Report::factory()->create([
            'cycle_id' => 1,
            'star_date' => Carbon::parse('03/10/2023'),
            'end_date' => Carbon::parse('03/10/2023'),
            'objective' => 'Verificar la conformidad del sistema de gestión de calidad de COODESCOR en la prestación de sus servicios, frente a los requisitos de la norma ISO 9001:2015 y los lineamientos establecidos internamente por la Cooperativa en su información documentada de los procesos. Así como también el cumplimiento de requisitos legales y normativos que le sean de aplicación a la cooperativa.',
            'scope' => 'Todos los requisitos de la norma ISO 9001:2015 aplicables a los procesos de la cooperativa.',
            'auditores' => 'Ariana Cantero Muñoz -Coordinador de sistemas de gestión
                            Johana Arguello-auxiliar de ventas
                            Manuel Rangel- coordinador de CEDIS
                            Estefanía Bolaños-Coordinador de TH
                            Carlos Sibaja-coordinador contable
                            Kelly Petro-Tesorera
                            Fernando Berrocal-auxiliar de archivo
                            Katerin Pertuz -Auxiliar contable (Observador)
                            Danilo Gómez- Auxiliar logístico CEDIS (Observador)
                            Alexandra Begambre-asistente de gerencia (Observador)
                            Carlos Martínez (observador)',
            'auditados' => 'Ariana Cantero Muñoz -Coordinador de sistemas de gestión
                            Johana Arguello-auxiliar de ventas
                            Manuel Rangel- coordinador de CEDIS
                            Estefanía Bolaños-Coordinador de TH
                            Carlos Sibaja-coordinador contable
                            Kelly Petro-Tesorera
                            Fernando Berrocal-auxiliar de archivo
                            Katerin Pertuz -Auxiliar contable (Observador)
                            Danilo Gómez- Auxiliar logístico CEDIS (Observador)
                            Alexandra Begambre-asistente de gerencia (Observador)
                            Carlos Martínez (observador)',
            'documents' => 'Descrita en el plan de auditoría 2023',
            'observations' => 'Quia laudantium repudiandae aut accusamus beatae dolores in facere est consequatur omnis vitae.
            Quia laudantium repudiandae aut accusamus beatae dolores in facere est consequatur omnis vitae.
            
            Quia laudantium repudiandae aut accusamus beatae dolores in facere est consequatur omnis vitae.
            Quia laudantium repudiandae aut accusamus beatae dolores in facere est consequatur omnis vitae.Quia laudantium repudiandae aut accusamus beatae dolores in facere est consequatur omnis vitae.
            
            Quia laudantium repudiandae aut accusamus beatae dolores in facere est consequatur omnis vitae.
            Quia laudantium repudiandae aut accusamus beatae dolores in facere est consequatur omnis vitae.',
            'diverging_opinions' => 'Quia laudantium repudiandae aut accusamus beatae dolores in facere est consequatur omnis vitae.
            Quia laudantium repudiandae aut accusamus beatae dolores in facere est consequatur omnis vitae.Quia laudantium repudiandae aut accusamus beatae dolores in facere est consequatur omnis vitae.
            Quia laudantium repudiandae aut accusamus beatae dolores in facere est consequatur omnis vitae.',
            'conclusions' => 'Quia laudantium repudiandae aut accusamus beatae dolores in facere est consequatur omnis vitae.
                                Quia laudantium repudiandae aut accusamus beatae dolores in facere est consequatur omnis vitae.
                                Quia laudantium repudiandae aut accusamus beatae dolores in facere est consequatur omnis vitae.
                                Quia laudantium repudiandae aut accusamus beatae dolores in facere est consequatur omnis vitae.',
        ]);
    }
}
