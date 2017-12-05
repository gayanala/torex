<?php

use App\Organization;
use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizations')->delete();
        Organization::create([
            'id' => 1,
            'org_name' => 'Tagg',
            'organization_type_id' => 3,
            'org_description' => 'Administrator and Owner of CharityQ',
            'street_address1' => '123 Main St',
            'city' => 'Omaha',
            'state' => 'NE',
            'zipcode' => '12345',
            'phone_number' => '555-555-5555',
        ]);

    }
}
