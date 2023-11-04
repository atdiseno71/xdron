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
        $role5 = Role::create(['name' => 'ayudante']);

        /* GENERALES */
        Permission::create(['name' => 'home.index'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'home.welcome'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

        /* USUARIOS */
        Permission::create(['name' => 'users.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.show'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'users.active'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.asignar'])->syncRoles([$role1, $role2]);

        /* PERMISOS EXCLUSIVOS PARA PILOTOS - MODULO OPERACION */
        Permission::create(['name' => 'operations.index'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'operations.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'operations.show'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'operations.edit'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'operations.destroy'])->syncRoles([$role1, $role2]);

        $views = [
            'assistants',
            'clients',
            'departments',
            'drons',
            'estates',
            'lucks',
            'municipalities',
            'products',
            'statuses',
            'type-products',
            'type-documents',
            'zones',
        ];

        $viewsPilotCreate = [
            'estates',
        ];

        // firstOrNew es para buscar o crear uno nuevo
        /* PERMISOS DE VISTAS TIENEN ACCESO TODOS LOS ROLES */
        foreach ($views as $view) {
            $indexPermission = Permission::create(['name' => "$view.index"]);
            $createPermission = Permission::create(['name' => "$view.create"]);
            if (in_array($view, $viewsPilotCreate)) {
                $createPermission->syncRoles([$role1, $role2, $role3, $role4, $role5]);
                $indexPermission->syncRoles([$role3]);
            } else {
                $createPermission->syncRoles([$role1, $role2, $role4, $role5]);
                $indexPermission->syncRoles([$role1, $role2, $role4, $role5]);
            }
            Permission::create(['name' => "$view.edit"])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
            Permission::create(['name' => "$view.show"])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        }

        /* PERMISOS USUARIOS NORMALES */
        foreach ($views as $view) {
            Permission::create(['name' => "$view.destroy"])->syncRoles([$role1, $role2]);
        }

    }
}
