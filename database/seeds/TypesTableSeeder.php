<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('types')->delete();
        
        \DB::table('types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'business',
                'description' => 'good',
                'created_at' => '2021-06-06 11:20:20',
                'updated_at' => '2021-06-06 11:20:20',
            ),
        ));
        
        
    }
}