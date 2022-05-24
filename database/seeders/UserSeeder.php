<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check if table users is empty
        if(DB::table('users')->get()->count() == 0){
            DB::table('users')->insert([
                // usuário admin
                [   
                    'name'       => 'José Alves Souza',
                    'email'      => 'teste@gmail.com',
                    'password'   => Hash::make('123456'),
                    'city'       => 'São Paulo',
                    'uf'         => 'SP',
                    'phone'      => '(11)99258-7123',
                    'is_admin'   => true,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'deleted_at' => null
                ],
                // clientes
                [   
                    'name'       => 'Emily Márcia Sales',
                    'email'      => 'emilyteste@gmail.com',
                    'password'   => Hash::make('123456'),
                    'city'       => 'São Paulo',
                    'uf'         => 'SP',
                    'phone'      => '(11)99174-8265',
                    'is_admin'   => false,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'deleted_at' => null
                ],
                [   
                    'name'       => 'Mateus Bento da Cunha',
                    'email'      => 'mateusteste@gmail.com',
                    'password'   => Hash::make('123456'),
                    'city'       => 'São Paulo',
                    'uf'         => 'SP',
                    'phone'      => '(11)99461-9147',
                    'is_admin'   => false,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'deleted_at' => null
                ],
                [   
                    'name'       => 'Bárbara Sarah Assunção',
                    'email'      => 'barbarateste@gmail.com',
                    'password'   => Hash::make('123456'),
                    'city'       => 'São Paulo',
                    'uf'         => 'SP',
                    'phone'      => '(11)98363-8790',
                    'is_admin'   => false,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'deleted_at' => null
                ]
            ]);

        } 
        else { 
            echo "Unable to run the seed. The table is not empty."; 
        }
    }
}
