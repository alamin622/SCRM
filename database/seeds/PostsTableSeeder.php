<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('posts')->delete();
        
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'shirt',
                'image' => 'image.jpg',
                'visiting_hours' => NULL,
                'area' => 'dhaka',
                'description' => '<p>hello</p>',
                'category_id' => 1,
                'customer_id' => 1,
                'start_time' => '19:22:00',
                'end_time' => '17:24:00',
                'created_at' => '2021-06-06 11:22:21',
                'updated_at' => '2021-06-06 11:22:21',
            ),
        ));
        
        
    }
}