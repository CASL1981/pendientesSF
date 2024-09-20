<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::find(1);

        $modules = [
            'product',
            'pending',
            'employee',
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
    }
}
