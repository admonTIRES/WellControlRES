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
        $newUsers = [
             [
            'username' => 'correoEstudiante',
            'email' => 'estudiante@mail.com',
            'password' => Hash::make('KW5SEwnE'),
            'rol' => 1,
            'created_at' => now(), 
            'updated_at' => now()
        ]
        ];


        // Insertar solo si no existen
        foreach ($newUsers as $user) {
            if (!DB::table('users')->where('email', $user['email'])->exists()) {
                DB::table('users')->insert($user);
            }
        }
    }
}
