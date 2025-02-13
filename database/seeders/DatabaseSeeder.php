<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            DepartmentsSeeder::class,
            MunicipalitySeeder::class,
            TypeDocSeeder::class,
            ZonesSeeder::class,
            StatusesSeeder::class,
            UserSeeder::class,
            // TypeProductSeeder::class,
            ClientSeeder::class,
            OperationSeeder::class,
        ]);
    }
}
