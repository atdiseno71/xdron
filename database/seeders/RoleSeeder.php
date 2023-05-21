<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'name' => 'Super Administrador',
                'guard_name' => 'super.root',
            ],
            [
                'name' => 'Piloto',
                'guard_name' => 'piloto',
            ],
            [
                'name' => 'Clientes',
                'guard_name' => 'cliente',
            ],
        ]);
    }
}
