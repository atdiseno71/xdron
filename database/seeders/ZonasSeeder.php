<?php

namespace Database\Seeders;

use App\Models\Zona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZonasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $zonas = [
            'NORTE',
            'NORESTE',
            'ESTE',
            'SURESTE',
            'SUR',
            'SUROESTE',
            'OESTE',
            'NOROESTE',
        ];

        foreach ($zonas as $key => $value) {
            Zona::create([
                'name' => $value
            ]);
        }
    }
}
