<?php

use App\State;
use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('states')->delete();

        State::create(['state_code' => 'AA', 'state_name' => 'Armed Forces America']);
        State::create(['state_code' => 'AE', 'state_name' => 'Armed Forces']);
        State::create(['state_code' => 'AP', 'state_name' => 'Armed Forces Pacific']);
        State::create(['state_code' => 'AK', 'state_name' => 'Alaska']);
        State::create(['state_code' => 'AL', 'state_name' => 'Alabama']);
        State::create(['state_code' => 'AR', 'state_name' => 'Arkansas']);
        State::create(['state_code' => 'AZ', 'state_name' => 'Arizona']);
        State::create(['state_code' => 'CA', 'state_name' => 'California']);
        State::create(['state_code' => 'CO', 'state_name' => 'Colorado']);
        State::create(['state_code' => 'CT', 'state_name' => 'Connecticut']);
        State::create(['state_code' => 'DC', 'state_name' => 'Washington DC']);
        State::create(['state_code' => 'DE', 'state_name' => 'Delaware']);
        State::create(['state_code' => 'FL', 'state_name' => 'Florida']);
        State::create(['state_code' => 'GA', 'state_name' => 'Georgia']);
        State::create(['state_code' => 'GU', 'state_name' => 'Guam']);
        State::create(['state_code' => 'HI', 'state_name' => 'Hawaii']);
        State::create(['state_code' => 'IA', 'state_name' => 'Iowa']);
        State::create(['state_code' => 'ID', 'state_name' => 'Idaho']);
        State::create(['state_code' => 'IL', 'state_name' => 'Illinois']);
        State::create(['state_code' => 'IN', 'state_name' => 'Indiana']);
        State::create(['state_code' => 'KS', 'state_name' => 'Kansas']);
        State::create(['state_code' => 'KY', 'state_name' => 'Kentucky']);
        State::create(['state_code' => 'LA', 'state_name' => 'Louisiana']);
        State::create(['state_code' => 'MA', 'state_name' => 'Massachusetts']);
        State::create(['state_code' => 'MD', 'state_name' => 'Maryland']);
        State::create(['state_code' => 'ME', 'state_name' => 'Maine']);
        State::create(['state_code' => 'MI', 'state_name' => 'Michigan']);
        State::create(['state_code' => 'MN', 'state_name' => 'Minnesota']);
        State::create(['state_code' => 'MO', 'state_name' => 'Missouri']);
        State::create(['state_code' => 'MS', 'state_name' => 'Mississippi']);
        State::create(['state_code' => 'MT', 'state_name' => 'Montana']);
        State::create(['state_code' => 'NC', 'state_name' => 'North Carolina']);
        State::create(['state_code' => 'ND', 'state_name' => 'North Dakota']);
        State::create(['state_code' => 'NE', 'state_name' => 'Nebraska']);
        State::create(['state_code' => 'NH', 'state_name' => 'New Hampshire']);
        State::create(['state_code' => 'NJ', 'state_name' => 'New Jersey']);
        State::create(['state_code' => 'NM', 'state_name' => 'New Mexico']);
        State::create(['state_code' => 'NV', 'state_name' => 'Nevada']);
        State::create(['state_code' => 'NY', 'state_name' => 'New York']);
        State::create(['state_code' => 'OH', 'state_name' => 'Ohio']);
        State::create(['state_code' => 'OK', 'state_name' => 'Oklahoma']);
        State::create(['state_code' => 'OR', 'state_name' => 'Oregon']);
        State::create(['state_code' => 'PA', 'state_name' => 'Pennsylvania']);
        State::create(['state_code' => 'PR', 'state_name' => 'Puerto Rico']);
        State::create(['state_code' => 'RI', 'state_name' => 'Rhode Island']);
        State::create(['state_code' => 'SC', 'state_name' => 'South Carolina']);
        State::create(['state_code' => 'SD', 'state_name' => 'South Dakota']);
        State::create(['state_code' => 'TN', 'state_name' => 'Tennessee']);
        State::create(['state_code' => 'TX', 'state_name' => 'Texas']);
        State::create(['state_code' => 'UT', 'state_name' => 'Utah']);
        State::create(['state_code' => 'VA', 'state_name' => 'Virginia']);
        State::create(['state_code' => 'VI', 'state_name' => 'Virgin Islands']);
        State::create(['state_code' => 'VT', 'state_name' => 'Vermont']);
        State::create(['state_code' => 'WA', 'state_name' => 'Washington']);
        State::create(['state_code' => 'WI', 'state_name' => 'Wisconsin']);
        State::create(['state_code' => 'WV', 'state_name' => 'West Virginia']);
        State::create(['state_code' => 'WY', 'state_name' => 'Wyoming']);
    }
}
