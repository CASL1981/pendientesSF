<?php

namespace Database\Seeders;

use App\Models\Classification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

        Classification::factory()->create([
            'code' => 'PEND',
            'level' => 1,
            'parent' => 'PEND',
            'name' => 'GESTION DE PENDIENTES',
            'impute' => false,
        ]);
        Classification::factory()->create([
            'code' => 'PENPED',
            'level' => 2,
            'parent' => 'PENDE',
            'name' => 'PENDIENTE PEDIDO',
            'impute' => true,
        ]);
        Classification::factory()->create([
            'code' => 'AUMDEM',
            'level' => 2,
            'parent' => 'PENDE',
            'name' => 'AUMENTO DE DEMANDA',
            'impute' => true,
        ]);
        Classification::factory()->create([
            'code' => 'BAJROT',
            'level' => 2,
            'parent' => 'PENDE',
            'name' => 'BAJA ROTACIÓN',
            'impute' => true,
        ]);
        Classification::factory()->create([
            'code' => 'ENTPRO',
            'level' => 2,
            'parent' => 'PENDE',
            'name' => 'ENTREGA PROGRAMADA',
            'impute' => true,
        ]);
        Classification::factory()->create([
            'code' => 'PENLAB',
            'level' => 2,
            'parent' => 'PENDE',
            'name' => 'PEDIDO LABORATORIO CLINICO',
            'impute' => true,
        ]);
        Classification::factory()->create([
            'code' => 'PENODO',
            'level' => 2,
            'parent' => 'PENDE',
            'name' => 'PEDIDO ODONTOLOGIA',
            'impute' => true,
        ]);
        Classification::factory()->create([
            'code' => 'PENIMA',
            'level' => 2,
            'parent' => 'PENDE',
            'name' => 'PEDIDO IMAGENOLOGIA',
            'impute' => true,
        ]);
        Classification::factory()->create([
            'code' => 'PENEST',
            'level' => 2,
            'parent' => 'PENDE',
            'name' => 'PEDIDO ESTERILIZACION',
            'impute' => true,
        ]);
        Classification::factory()->create([
            'code' => 'PENCIT',
            'level' => 2,
            'parent' => 'PENDE',
            'name' => 'PEDIDO CITOLOGIA',
            'impute' => true,
        ]);
    }
}
