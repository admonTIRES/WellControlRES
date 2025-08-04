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
            'username' => 'ulisesfuentes',
            'email' => 'ulisesfv_19@hotmail.com',
            'password' => Hash::make('KW5SEwnE'),
            'rol' => 1, // Usuario normal/estudiante
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'username' => 'aristotelesfortuny',
            'email' => 'fortunycar_81@hotmail.com',
            'password' => Hash::make('bByPudxe'),
            'rol' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'username' => 'albertomeneses',
            'email' => 'alberto_meneses_@hotmail.com',
            'password' => Hash::make('TZHzp3AK'),
            'rol' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'username' => 'victorgarcia',
            'email' => 'garciaolayovictoriran@gmail.com',
            'password' => Hash::make('VF63GF3r'),
            'rol' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'username' => 'lindaperez',
            'email' => 'lperez@results-in-performance.com',
            'password' => Hash::make('Test1234'),
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
