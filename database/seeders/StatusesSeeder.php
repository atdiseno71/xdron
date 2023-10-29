<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $names = [
            'Creado',
            'Recibido',
            'En revisión',
            'Aprobado',
            'Rechazado',
        ];

        $slug = [
            'CRE',
            'RECI',
            'ENR',
            'APR',
            'REC',
        ];

        foreach ($names as $key => $value) {
            Status::create([
                'name' => $value,
                'slug' => $slug[$key]
            ]);
        }
    }
}
