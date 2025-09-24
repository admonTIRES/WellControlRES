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
            'username' => 'SMC12adm',
            'email' => 'SMC12adm',
            'password' => Hash::make('G2k!h7Zp3Tj8'),
            'rol' => 2,//ROLES DE DEMOS
            'created_at' => now(), 
            'updated_at' => now()
             ],
              [
            'username' => 'SMC12stu',
            'email' =>  'SMC12stu',
            'password' => Hash::make('R$9wX1nL6fP4'),
            'rol' => 1,//ROLES DE DEMOS
            'created_at' => now(), 
            'updated_at' => now()
              ],
               [
            'username' => 'SMC22adm',
            'email' => 'SMC22adm',
            'password' => Hash::make('Y8c#v5M7qD2b'),
            'rol' => 2,//ROLES DE DEMOS
            'created_at' => now(), 
            'updated_at' => now()
               ],
                [
            'username' => 'SMC22stu',
            'email' => 'SMC22stu',
            'password' => Hash::make('B4j*a6K9rF3s'),
            'rol' => 1,//ROLES DE DEMOS
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
