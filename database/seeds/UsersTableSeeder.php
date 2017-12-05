<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'id' => '1',
            'first_name' => 'root',
            'last_name' => 'admin',
            'user_name' => 'email1@mailinator.com',
            'email' => 'email1@mailinator.com',
            'password' => bcrypt('password'),
            'organization_id' => '1',
            'street_address1' => 'Root User',
            'street_address2' => 'Root User',
            'city' => 'Root',
            'zipcode' => '67654',
            'state' => 'LA',
            'phone_number' => '9876543210',]);
    }
}
