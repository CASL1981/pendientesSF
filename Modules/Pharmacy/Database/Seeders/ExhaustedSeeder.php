<?php

namespace Modules\Pharmacy\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Pharmacy\App\Models\Exhausted;

class ExhaustedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

        Exhausted::factory(20)->create();
    }
}
