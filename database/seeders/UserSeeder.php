<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $administrador = User::factory()->create([
            "identification"=> 7383633,
            "name"=> "Carlos",
            "lastname"=> "Sibaja",
            'email' => 'contabilidad@coodescor.org.co',
            'status' => true,
            'role_id' => 1,
        ]);

        $admin = Role::create(['name' => 'administrador']);
        $SF = Role::create(['name' => 'Director y Auxiliar SF']);
        $ventasFarmacias = Role::create(['name' => 'Auxiliar de Ventas Farmacias']);

        //permissions from the CRUD

        $permissions = [
            'create',
            'read',
            'update',
            'delete',
            'toggle'
        ];

        $modules = [
            'destination',
            'user',
            'role',
        ];

        foreach($modules as $rol){
            foreach($permissions as $per){
                Permission::create([
                    'name' => "{$rol} $per",
                    'modelo' => "{$rol}"
                ]);
            }
        }

        //assign the permissions to the role
        $admin->syncPermissions(Permission::all());


        //assign the role to the user
        $administrador->assignRole('administrador');
    }
}
