<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['first_name' => 'Tagg Owner',
            'first_name' => 'Tagg Owner',
            'last_name' => 'Tagg Owner',
            'user_name' => 'user',
            'email' => 'email@gmail.com',
            'password' => bcrypt('password'),
            'organization_id' => '1',
            'street_address1' => 'Tagg Owner',
            'street_address2' => 'Tagg Owner',
            'city' => 'Tagg',
            'zipcode' => '67654',
            'state' => 'NE',
            'phone_number' => '9876543210',]);
    }
}
