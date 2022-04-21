<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check if table contacts is empty
        if(DB::table('contacts')->get()->count() == 0){
            DB::table('contacts')->insert([
                [   
                    'name'       => 'José Alves Souza',
                    'contact'    => '912578125',
                    'email'      => 'jose.alves@gmail.com',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [   
                    'name'       => 'João da Silva',
                    'contact'    => '981478125',
                    'email'      => 'joao.silva@gmail.com',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [   
                    'name'       => 'Maria Helena Oliveira',
                    'contact'    => '912578154',
                    'email'      => 'maria.oliver@gmail.com',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [   
                    'name'       => 'Nicolas Arthur Calebe Dias',
                    'contact'    => '912552157',
                    'email'      => 'nicolas.dias@gmail.com',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [   
                    'name'       => 'Rodrigo Isaac Viana',
                    'contact'    => '918352142',
                    'email'      => 'rodrigo.viana@gmail.com',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            ]);

        } 
        else { 
            echo "Unable to run the seed. The table is not empty."; 
        }
    }
}
