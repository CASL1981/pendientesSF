<?php

namespace Modules\Pharmacy\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Pharmacy\App\Models\Stock;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stock::factory()->count(3)->create();
    }
}
