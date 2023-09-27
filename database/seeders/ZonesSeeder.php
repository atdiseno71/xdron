<?php

namespace Database\Seeders;

use App\Models\Zona;
use App\Models\Zone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZonesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $zonas = [
            'NORTE',
            // 'NORESTE',
            'ESTE',
            // 'SURESTE',
            'SUR',
            // 'SUROESTE',
            'OESTE',
            // 'NOROESTE',
        ];

        foreach ($zonas as $key => $value) {
            Zone::create([
                'name' => $value
            ]);
        }
    }
}
