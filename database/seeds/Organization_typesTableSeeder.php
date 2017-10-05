<?php

use App\Organization_type;
use Illuminate\Database\Seeder;

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

        Organization_type::create(['id' => 1, 'type_name' => 'Animal Services', 'type_description' => 'Veterinary Practices, Pet Stores, etc.']);
        Organization_type::create(['id' => 2, 'type_name' => 'Education', 'type_description' => 'Colleges, Trade Schools, etc.']);
        Organization_type::create(['id' => 3, 'type_name' => 'Financial', 'type_description' => 'Banking, Insurance, etc.']);;
        Organization_type::create(['id' => 4, 'type_name' => 'Food Services', 'type_description' => 'Restaurants, Fast Food, etc.']);
        Organization_type::create(['id' => 5, 'type_name' => 'Infrastructure', 'type_description' => 'Construction, etc.']);
        Organization_type::create(['id' => 6, 'type_name' => 'Legal', 'type_description' => 'Law Practices']);
        Organization_type::create(['id' => 7, 'type_name' => 'Retail', 'type_description' => 'Retail & Home Improvement Stores, etc.']);
        Organization_type::create(['id' => 8, 'type_name' => 'Transportation', 'type_description' => 'Rail, Trucking, etc.']);
        Organization_type::create(['id' => 9, 'type_name' => 'Others', 'type_description' => 'It is for others']);

    }
}
