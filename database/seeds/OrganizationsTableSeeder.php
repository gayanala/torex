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
            'org_name' => 'CharityQ',
            'organization_type_id' => 3,
            'org_description' => 'Administrator and Owner of CharityQ',
            'street_address1' => '17117 Oak Drive',
            'street_address2' => 'Ste. A',
            'city' => 'Omaha',
            'zipcode' => '68130',
            'state' => 'NE',
            'phone_number' => '(402) 715-5230'
        ]);

    }
}
