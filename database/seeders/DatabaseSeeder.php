<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);

        \App\Models\User::factory(50)->create();

        $this->call(DestinationSeeder::class);
        $this->call(PermissionTableSeeder::class);



        //importar datos desde archivos de excel
        $this->call([
            SpreadsheetSeeder::class,
        ]);
    }
}
