<?php

namespace Modules\Pharmacy\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Pharmacy\App\Models\Exhausted;

class PharmacyDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(PendingTableSeeder::class);
        $this->call(StockSeeder::class);
        $this->call(DetailPendingSeeder::class);
        $this->call(ExhaustedSeeder::class);
    }
}
