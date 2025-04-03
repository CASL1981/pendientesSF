<?php

namespace Modules\Pharmacy\Database\Seeders;

use Illuminate\Database\Seeder;

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
    }
}
