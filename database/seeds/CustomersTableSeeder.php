<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('customers')->delete();
        
        \DB::table('customers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'abeer',
                'nickname' => 'alamin',
                'phone' => '01742667781',
                'email' => 'abeersaif622@gmail.com',
                'present_address' => 'mirpur',
                'permanent_address' => 'bhola',
                'image' => '/storage/customer/1622978511.png',
                'shop_name' => 'Cherag',
                'nid_number' => '1023',
                'nid_image' => 'C:\\xampp\\tmp\\php11B9.tmp',
                'religion' => 'islam',
                'birthdate' => '2021-06-08',
                'marriage_dob' => '2021-06-09',
                'family_member' => '5',
                'father_name' => 'Shekh Farid',
                'mother_name' => 'Zarina Begum',
                'occupation' => 'business',
                'website' => 'c.com',
                'connected_company_name' => 'bdsoft it solution',
                'business_nature' => 'good',
                'business_year' => '10',
                'number_of_children' => '5',
                'children_dob' => NULL,
                'area' => 'dhaka',
                'division' => 'dhaka',
                'district' => 'bhola',
                'type_id' => 1,
                'created_at' => '2021-06-06 11:21:51',
                'updated_at' => '2021-06-06 11:21:51',
            ),
        ));
        
        
    }
}