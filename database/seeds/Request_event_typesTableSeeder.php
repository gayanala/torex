<?php

use App\Request_event_type;
use Illuminate\Database\Seeder;

class Request_event_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('request_event_types')->delete();
        Request_event_type::create(['id' => 1, 'type_name' => 'Fundraiser/Gala', 'type_description' => 'Fundraiser']);
        Request_event_type::create(['id' => 2, 'type_name' => 'Walk/Run/Ride Event', 'type_description' => 'Walk/Run/Ride Event']);
        Request_event_type::create(['id' => 3, 'type_name' => 'Charity Dinner', 'type_description' => 'Spaghetti, Pancake, etc. feed.']);
        Request_event_type::create(['id' => 4, 'type_name' => 'Other (please explain)', 'type_description' => 'Other Purposes']);
    }
}
