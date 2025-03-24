<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'vroa1974',
            'email' => 'vroa74@vroa74.com',
            'password' => Hash::make('password123') // Contraseña encriptada para todos
        ])->assignRole('admin');

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test123@example.com',
//            'password' => Hash::make('password123') // Contraseña encriptada para todos
//
//        ]);
//        User::factory(50)->create([
//            'password' => Hash::make('password123') // Contraseña encriptada para todos
//        ]);
//        $this->call(RoleSeeder::class);

    }
}
