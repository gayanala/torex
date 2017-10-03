<?php

use Illuminate\Database\Seeder;
use App\Organization_type;

class Organization_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organization_types')->delete();

        Organization_type::create(['id' => 1, 'type_name' => 'Animal Welfare', 'type_description' => 'This is an Animal Welfare']);
        Organization_type::create(['id' => 2, 'type_name' => 'Arts, Culture & Humanities', 'type_description' => 'These are Arts, Culture & Humanities']);
        Organization_type::create(['id' => 3, 'type_name' => 'Civil Rights, Social Action & Advocacy', 'type_description' => 'These are Civil Rights, Social Action & Advocacy']);
        Organization_type::create(['id' => 4, 'type_name' => 'Community Improvement', 'type_description' => 'This is Community Improvement']);
        Organization_type::create(['id' => 5, 'type_name' => 'Corporate Giving', 'type_description' => 'This is Corporate Giving']);
        Organization_type::create(['id' => 6, 'type_name' => 'Education K-12', 'type_description' => 'This is an Education K-12']);
        Organization_type::create(['id' => 7, 'type_name' => 'Environment', 'type_description' => 'This is an Environment']);
        Organization_type::create(['id' => 8, 'type_name' => 'Faith/Religious', 'type_description' => 'This is a Faith/Religious']);
        Organization_type::create(['id' => 9, 'type_name' => 'Food, Agriculture & Nutrition', 'type_description' => 'This is a Food, Agriculture & Nutrition']);
        Organization_type::create(['id' => 10, 'type_name' => 'Health Care', 'type_description' => 'This is for Health Care']);
        Organization_type::create(['id' => 11, 'type_name' => 'Human Services', 'type_description' => 'This is for Human Services']);
        Organization_type::create(['id' => 12, 'type_name' => 'Youth Sports/Activities', 'type_description' => 'This is for Youth Sports/Activities']);
        Organization_type::create(['id' => 13, 'type_name' => 'Others', 'type_description' => 'It is for others']);

    }
}
