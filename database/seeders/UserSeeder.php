<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Demo usuario
        User::create([
            'name' => fake()->name(),
            'username' => fake()->username(),
            'lastname' => fake()->lastname(),
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
            'active' => 1,
            'id_role' => "1",
            'id_type_document' => "1",
            'document_number' => "12345678",
        ])->assignRole('super.root');
        User::create([
            'name' => fake()->name(),
            'username' => fake()->username(),
            'lastname' => fake()->lastname(),
            'email' => 'piloto@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
            'active' => 1,
            'id_role' => "3",
            'id_type_document' => "1",
            'document_number' => "1006465338",
        ])->assignRole('piloto');
        // Usuarios falsos para pruebas
        // User::factory()->count(5000)->create();
    }
}
