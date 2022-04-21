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
                [   
                    'name'       => 'ALFASOFT',
                    'email'      => 'alfasoft@gmail.com',
                    'password'   => Hash::make('123456'),
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
