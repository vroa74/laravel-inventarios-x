<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(50)->create([
            'password' => Hash::make('password123') // Contraseña encriptada para todos
        ]);

    }
}
