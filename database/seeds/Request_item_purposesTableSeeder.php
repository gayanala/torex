<?php

use App\Request_item_purpose;
use Illuminate\Database\Seeder;

class Request_item_purposesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('request_item_purposes')->delete();
        Request_item_purpose::create(['id' => 1, 'purpose_name' => 'Raffle/Door Prize', 'purpose_description' => 'Raffle/Door Prize']);
        Request_item_purpose::create(['id' => 2, 'purpose_name' => 'Live Auction', 'purpose_description' => 'Live Auction']);
        Request_item_purpose::create(['id' => 3, 'purpose_name' => 'Silent Action', 'purpose_description' => 'Silent Action']);
        Request_item_purpose::create(['id' => 4, 'purpose_name' => 'Online Auction', 'purpose_description' => 'Online Auction']);
        Request_item_purpose::create(['id' => 5, 'purpose_name' => 'Supporting Services', 'purpose_description' => 'Participate in facilitating the event']);
        Request_item_purpose::create(['id' => 6, 'purpose_name' => 'Awareness', 'purpose_description' => 'Increasing awareness for the event']);
        Request_item_purpose::create(['id' => 7, 'purpose_name' => 'Funding Event', 'purpose_description' => 'Pay for Costs of Event']);
        Request_item_purpose::create(['id' => 8, 'purpose_name' => 'Donation', 'purpose_description' => 'Contribute toward requesters Goal']);
        Request_item_purpose::create(['id' => 9, 'purpose_name' => 'Other (please explain)', 'purpose_description' => 'Other Purposes']);
    }
}