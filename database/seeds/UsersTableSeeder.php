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
                'name' => 'abeer',
                'email' => 'abeer@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$mS9b3RxrF2coPkjXnyHStu9Q90qzEkK.VpNeNm7c9Wp3p16dew1mi',
                'type_id' => NULL,
                'remember_token' => NULL,
                'created_at' => '2021-06-06 11:19:40',
                'updated_at' => '2021-06-06 11:19:40',
            ),
        ));
        
        
    }
}