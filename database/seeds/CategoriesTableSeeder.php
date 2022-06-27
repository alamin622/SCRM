<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'shirt',
                'slug' => 'shirt',
                'description' => 'good',
                'created_at' => '2021-06-06 11:20:00',
                'updated_at' => '2021-06-06 11:20:00',
            ),
        ));
        
        
    }
}