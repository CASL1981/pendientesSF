<?php

namespace Modules\SGC\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SGCDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call(CycleSeeder::class);
        // $this->call(ChecklistSeeder::class);
        $this->call(FindSeeder::class);
        $this->call(ObservationSeeder::class);
        $this->call(ReporteSeeder::class);
        $this->call(AuditorSeeder::class);
        $this->call(AuditedSeeder::class);

        $admin = Role::find(1);

        $auditor = Role::create(['name' => 'Auditor Interno']);

        $modules = [
            'cycle',
            'checklist',
            'criterion',
            'find',
            'observation',
            'report',
            'auditor',
            'audited',
        ];

        //CRUD
        $permissions = [
            'create',
            'read',
            'update',
            'delete',
            'toggle',
            'process',
            'reverse'
        ];


        foreach($modules as $rol){
            foreach($permissions as $per){
                Permission::create([
                    'name' => "{$rol} $per",
                    'modelo' => "{$rol}"
                ]);
            }
        }

        $admin->syncPermissions(Permission::all());

        $auditor->syncPermissions(Permission::where('name', 'like', '%cycle%')
                                                            ->orWhere('name', 'like', '%checklist%')
                                                            ->orWhere('name', 'like', '%criterion%')->get());
    }
}
