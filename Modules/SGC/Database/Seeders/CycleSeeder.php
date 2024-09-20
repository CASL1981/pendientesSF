<?php

namespace Modules\SGC\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\SGC\App\Models\Cycle;

class CycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cycle::factory()->create([
            'year' => 2024,
            'description' => 'Auditoria interna 2024',
            'status' => true,
        ]);
    }
}
