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
        Requester_type::create(['id' => 1, 'type_name' => 'Animal Welfare', 'type_description' => 'This is an Animal Welfare']);
        Requester_type::create(['id' => 2, 'type_name' => 'Arts, Culture & Humanities', 'type_description' => 'These are Arts, Culture & Humanities']);
        Requester_type::create(['id' => 3, 'type_name' => 'Civil Rights, Social Action & Advocacy', 'type_description' => 'These are Civil Rights, Social Action & Advocacy']);
        Requester_type::create(['id' => 4, 'type_name' => 'Community Improvement', 'type_description' => 'This is Community Improvement']);
        Requester_type::create(['id' => 5, 'type_name' => 'Corporate Giving', 'type_description' => 'This is Corporate Giving']);
        Requester_type::create(['id' => 6, 'type_name' => 'Education K-12', 'type_description' => 'This is an Education K-12']);
        Requester_type::create(['id' => 7, 'type_name' => 'Environment', 'type_description' => 'This is an Environment']);
        Requester_type::create(['id' => 8, 'type_name' => 'Faith/Religious', 'type_description' => 'This is a Faith/Religious']);
        Requester_type::create(['id' => 9, 'type_name' => 'Food, Agriculture & Nutrition', 'type_description' => 'This is a Food, Agriculture & Nutrition']);
        Requester_type::create(['id' => 10, 'type_name' => 'Health Care', 'type_description' => 'This is for Health Care']);
        Requester_type::create(['id' => 11, 'type_name' => 'Human Services', 'type_description' => 'This is for Human Services']);
        Requester_type::create(['id' => 12, 'type_name' => 'Youth Sports/Activities', 'type_description' => 'This is for Youth Sports/Activities']);
        Requester_type::create(['id' => 13, 'type_name' => 'Others', 'type_description' => 'Other Types of Requesters']);
    }
}
