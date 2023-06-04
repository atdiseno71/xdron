<?php

namespace Database\Seeders;

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
        $role1 = Role::create(['name' => 'super.root']);
        $role2 = Role::create(['name' => 'root']);
        $role3 = Role::create(['name' => 'piloto']);
        $role4 = Role::create(['name' => 'cliente']);

        /* GENERALES */
        Permission::create(['name' => 'home.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'home.welcome'])->syncRoles([$role1, $role2, $role3, $role4]);

        /* USUARIOS */
        Permission::create(['name' => 'users.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'users.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.show'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$role1, $role2]);

        /* FINCAS */
        Permission::create(['name' => 'fincas.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'fincas.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'fincas.show'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'fincas.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'fincas.destroy'])->syncRoles([$role1, $role2]);

        /* ZONAS */
        Permission::create(['name' => 'zonas.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'zonas.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'zonas.show'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'zonas.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'zonas.destroy'])->syncRoles([$role1, $role2]);

        /* SUERTES */
        Permission::create(['name' => 'suertes.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'suertes.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'suertes.show'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'suertes.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'suertes.destroy'])->syncRoles([$role1, $role2]);

    }
}
