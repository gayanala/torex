<?php

use App\Request_item_type;
use Illuminate\Database\Seeder;

class Request_item_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('request_item_types')->delete();
        Request_item_type::create(['id' => 1, 'item_name' => 'Cash/Check', 'item_description' => 'Monetary Donation']);
        Request_item_type::create(['id' => 2, 'item_name' => 'Gift Card', 'item_description' => 'Store Credit']);
        Request_item_type::create(['id' => 3, 'item_name' => 'Product/Service Donation', 'item_description' => 'Donation of Items or Services']);
        Request_item_type::create(['id' => 4, 'item_name' => 'Sponsorship/Awareness', 'item_description' => 'Request for visibility']);
        Request_item_type::create(['id' => 5, 'item_name' => 'Other (please explain)', 'item_description' => 'Other Types of Requests']);

    }
}
