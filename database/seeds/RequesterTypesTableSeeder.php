<?php

use App\Requester_type;
use Illuminate\Database\Seeder;

class RequesterTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('requester_types')->delete();
        Requester_type::create(['id' => 1, 'type_name' =>  'Restaurant', 'type_description' => 'Restaurant']);
        Requester_type::create(['id' => 2, 'type_name' =>  'Retail', 'type_description' => 'Retail']);
        Requester_type::create(['id' => 3, 'type_name' =>  'Health/Beauty', 'type_description' => 'Health/Beauty']);;
        Requester_type::create(['id' => 4, 'type_name' =>  'Entertainment', 'type_description' => 'Entertainment']);
        Requester_type::create(['id' => 5, 'type_name' =>  'Hospitality/Travel', 'type_description' => 'Hospitality/Travel']);
        Requester_type::create(['id' => 6, 'type_name' =>  'B2B Service', 'type_description' => 'B2B Service']);
        Requester_type::create(['id' => 7, 'type_name' =>  'B2C Service', 'type_description' => 'B2C Service']);
        Requester_type::create(['id' => 8, 'type_name' =>  'Others', 'type_description' => 'Anything other than the above options']);
    }
}

