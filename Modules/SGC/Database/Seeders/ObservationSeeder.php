<?php

namespace Modules\SGC\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\SGC\App\Models\Observation;

class ObservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Observation::factory()->count(50)->create();
    }
}
