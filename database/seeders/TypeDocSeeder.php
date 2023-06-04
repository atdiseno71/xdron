<?php

namespace Database\Seeders;

use App\Models\TypeDocument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeDocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeDocument::create([
            'name' => 'REGISTRO CIVIL',
        ]);

        TypeDocument::create([
            'name' => 'TARJETA DE IDENTIDAD',
        ]);

        TypeDocument::create([
            'name' => 'CEDULA DE CIUDADANIA',
        ]);

        TypeDocument::create([
            'name' => 'CEDULA DE EXTRANJERIA',
        ]);

        TypeDocument::create([
            'name' => 'NUMERO DE IDENTIFICACION PERSONAL',
        ]);

        TypeDocument::create([
            'name' => 'NUMERO DE IDENTIFICACION TRIBUTARIA',
        ]);

        TypeDocument::create([
            'name' => 'PASAPORTE',
        ]);

    }
}
