<?php

namespace Database\Seeders;

use App\Models\TypeProduct;
use Illuminate\Database\Seeder;

class TypeProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'Fumigante',
            'Insecticida',
            'Madurente-Fertilizante',
            'Fertilizante',
            'Fungicida',
            'Herbicida',
            'Insecticida',
            'Madurante',
            'Madurante Orgánico',
            'Microorganismo',
            'Orgánico',
            'Pos-emergente',
            'Premergente',
        ];

        foreach ($names as $key => $value) {
            TypeProduct::create([
                'name' => $value,
            ]);
        }
    }
}
