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

        Organization_type::create(['id' => 1, 'type_name' => 'Restaurant', 'type_description' => 'Restaurant']);
        Organization_type::create(['id' => 2, 'type_name' => 'Retail', 'type_description' => 'Retail']);
        Organization_type::create(['id' => 3, 'type_name' => 'Health/Beauty', 'type_description' => 'Health/Beauty']);;
        Organization_type::create(['id' => 4, 'type_name' => 'Entertainment', 'type_description' => 'Entertainment']);
        Organization_type::create(['id' => 5, 'type_name' => 'Hospitality/Travel', 'type_description' => 'Hospitality/Travel']);
        Organization_type::create(['id' => 6, 'type_name' => 'B2B Service', 'type_description' => 'B2B Service']);
        Organization_type::create(['id' => 7, 'type_name' => 'B2C Service', 'type_description' => 'B2C Service']);
        Organization_type::create(['id' => 8, 'type_name' => 'Others', 'type_description' => 'Anything other than the above options']);

    }
}

