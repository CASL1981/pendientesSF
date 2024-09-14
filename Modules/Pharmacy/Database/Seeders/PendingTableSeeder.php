<?php

namespace Modules\Pharmacy\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Pharmacy\App\Models\Pending;

class PendingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

        Pending::factory(100)->create();
    }
}
