<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('subs')->delete();

        \DB::table('subs')->insert(array(
            0 =>
            array(
                'id' => 1,
                'email' => 'email@email.com',
                'IP' => '65.49.22.66',
                'country' => 'United States',
                'city' => 'Mound',
                'region' => 'Minnesota',
                'code' => 'US',
                'key' => '$2y$10$N7wy.WO6OgmrNRJQ8LOgee6pOWa22qKwcVTZaRpvGyfMPi6cGCI2i',
                'deactive_at' => null,
                'created_at' => '2023-09-18 18:53:12',
                'updated_at' => '2023-09-18 18:53:12',
            ),
        ));
    }
}
