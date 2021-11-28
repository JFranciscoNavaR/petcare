<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleA = Role::create(['name' => 'admin']);
        $roleU = Role::create(['name' => 'user']);

        //Asignar mas de un rol
        //Permission::create(['name' => 'index'])->syncRoles([$roleA, $roleU]);
        //Asignar un solo rol
        Permission::create(['name' => 'showpets'])->assignRole($roleA);
        Permission::create(['name' => 'showdates'])->assignRole($roleA);
        Permission::create(['name' => 'showtypes'])->assignRole($roleA);
        Permission::create(['name' => 'showstatus'])->assignRole($roleA);
        Permission::create(['name' => 'showusers'])->assignRole($roleA);
        Permission::create(['name' => 'showdonations'])->assignRole($roleA);
        
        Permission::create(['name' => 'showdatesuser'])->assignRole([$roleU]);
        Permission::create(['name' => 'showdonationsuser'])->assignRole([$roleU]);
    }
}
