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
                'username' => 'Cristhel',
                'email' => 'cmendez@results-in-performance.com',
                'password' => Hash::make('xbCR20T20'),
                'rol' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'username' => 'Virginia',
                'email' => 'vlicona@results-in-performance.com',
                'password' => Hash::make('mAC9825x'),
                'rol' => 2,
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
