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
            'first_name' => 'Root',
            'last_name' => 'User',
            'user_name' => 'user',
            'email' => 'email1@gmail.com',
            'password' => bcrypt('password'),
            'organization_id' => '1',
            'street_address1' => 'Root User',
            'street_address2' => 'Root User',
            'city' => 'Root',
            'zipcode' => '67654',
            'state' => 'LA',
            'phone_number' => '9876543210',]);

        User::create([
            'first_name' => 'Johnny',
            'last_name' => 'Tagg Owner',
            'user_name' => 'user',
            'email' => 'email2@gmail.com',
            'password' => bcrypt('password'),
            'organization_id' => '1',
            'street_address1' => 'Tagg Owner',
            'street_address2' => 'Tagg Owner',
            'city' => 'Tagg',
            'zipcode' => '67654',
            'state' => 'NE',
            'phone_number' => '9876543210',]);

        User::create([
            'first_name' => 'English',
            'last_name' => 'Tagg User',
            'user_name' => 'user',
            'email' => 'email3@gmail.com',
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
