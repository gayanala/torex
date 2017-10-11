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
            'org_name' => 'Together A Greater Good',
            'organization_type_id' => 3,
            'org_description' => 'Administrator and Owner of CommunityQ',
            'street_address1' => '123 Main St',
            'city' => 'Omaha',
            'state' => 'NE',
            'zipcode' => '12345',
            'phone_number' => '555-555-5555',
        ]);
        Organization::create([
            'id' => 2,
            'org_name' => 'Not Your Mommas Meatballs',
            'organization_type_id' => 4,
            'org_description' => 'Best Italian on the Planet!',
            'street_address1' => '321 Main St',
            'city' => 'Omaha',
            'state' => 'NE',
            'zipcode' => '12345',
            'phone_number' => '555-555-5555',
        ]);
        Organization::create([
            'id' => 3,
            'org_name' => 'The Law Offices of Dewey, Cheatem & Howe',
            'organization_type_id' => 6,
            'org_description' => 'Corporate Law and Tax Attorneys',
            'street_address1' => '123 Brattle St',
            'city' => 'Cambridge',
            'state' => 'MA',
            'zipcode' => '02139',
            'phone_number' => '555-555-5555',
        ]);
    }
}
