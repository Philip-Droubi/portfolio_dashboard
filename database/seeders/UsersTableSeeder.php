<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'philip',
                'email' => 'philipdroubi@gmail.com',
                'password' => '$2y$10$adOe0HGbfz5HG46mcGdyOulQxNyRHyUC7Y1VQA05L3pkqfxT7LhLu',
                'last_seen' => NULL,
                'remember_token' => NULL,
                'created_at' => '2023-09-04 04:55:02',
                'updated_at' => '2023-09-04 04:55:02',
            ),
        ));
        
        
    }
}