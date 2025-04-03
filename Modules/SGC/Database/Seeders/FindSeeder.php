<?php

namespace Modules\SGC\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\SGC\App\Models\Find;

class FindSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Find::factory()->count(30)->create();
    }
}
