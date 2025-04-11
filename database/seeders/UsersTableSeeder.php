<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // ¡Esta línea es la que faltaba!
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Borrar datos existentes (opcional)
        DB::table('users')->truncate();

        // Crear usuarios de prueba
        $users = [
            [
                'username' => 'AdminRES',
                'email' => 'admin@example.com',
                'password' => Hash::make('12345'), // Encriptar contraseña
                'rol' => 1, // 1 para administrador
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'username' => 'SmithMason',
                'email' => 'usuario1@example.com',
                'password' => Hash::make('12345'),
                'rol' => 2, // 2 para usuario normal
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'username' => 'usuario2',
                'email' => 'usuario2@example.com',
                'password' => Hash::make('12345'),
                'rol' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('users')->insert($users);
    }
}
