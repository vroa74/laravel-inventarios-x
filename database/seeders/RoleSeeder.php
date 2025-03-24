<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name'=> 'admin']);
        $role2 = Role::create(['name'=> 'director']);
        $role3 = Role::create(['name'=> 'admEmployeein']);
     //  generando permisos

        Permission::create(['name' => 'ages.index' ])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'ages.create' ])->assignRole($role1);
        Permission::create(['name' => 'ages.show' ])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'ages.edit' ])->assignRole($role1);
        Permission::create(['name' => 'ages.destroy' ])->assignRole($role1);
        Permission::create(['name' => 'cos.index' ])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'cos.create' ])->assignRole($role1);
        Permission::create(['name' => 'cos.show' ])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'cos.edit' ])->assignRole($role1);
        Permission::create(['name' => 'cos.destroy' ])->assignRole($role1);
        Permission::create(['name' => 'dashboard' ])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'add' ])->assignRole($role1);
        Permission::create(['name' => 'usuarios' ])->assignRole($role1);
        Permission::create(['name' => 'temp' ])->assignRole($role1);
        Permission::create(['name' => 'catalogos' ])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'componentes' ])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'reporteNormal' ])->syncRoles([$role1,$role2,$role3]);
    }
}
