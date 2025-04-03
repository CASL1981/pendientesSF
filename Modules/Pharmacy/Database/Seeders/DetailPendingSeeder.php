<?php

namespace Modules\Pharmacy\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Pharmacy\App\Models\DetailPending;

class DetailPendingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

        DetailPending::factory(10)->create();
    }
}
