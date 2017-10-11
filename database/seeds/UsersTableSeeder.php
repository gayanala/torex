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
            'first_name' => 'Rahul',
            'last_name' => 'Dravid',
            'user_name' => 'email1@gmail.com',
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
            'id' => '2',
            'first_name' => 'Zaheer',
            'last_name' => 'Khan',
            'user_name' => 'email2@gmail.com',
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
            'id' => '3',
            'first_name' => 'Sachin',
            'last_name' => 'Tendulkar',
            'user_name' => 'email3@gmail.com',
            'email' => 'email3@gmail.com',
            'password' => bcrypt('password'),
            'organization_id' => '1',
            'street_address1' => 'tagg user',
            'street_address2' => 'tagg user',
            'city' => 'Tagg',
            'zipcode' => '67654',
            'state' => 'NE',
            'phone_number' => '9876543210',]);

        User::create([
            'id' => '4',
            'first_name' => 'Gil',
            'last_name' => 'Christ',
            'user_name' => 'email4@gmail.com',
            'email' => 'email4@gmail.com',
            'password' => bcrypt('password'),
            'organization_id' => '1',
            'street_address1' => 'business admin',
            'street_address2' => 'business admin',
            'city' => 'Tagg',
            'zipcode' => '67654',
            'state' => 'NE',
            'phone_number' => '9876543210',]);

        User::create([
            'id' => '5',
            'first_name' => 'Wasim',
            'last_name' => 'Akram',
            'user_name' => 'email5@gmail.com',
            'email' => 'email5@gmail.com',
            'password' => bcrypt('password'),
            'organization_id' => '1',
            'street_address1' => 'business user',
            'street_address2' => 'business user',
            'city' => 'Tagg',
            'zipcode' => '67654',
            'state' => 'NE',
            'phone_number' => '9876543210',]);

        User::create([
            'id' => '6',
            'first_name' => 'Fabio',
            'last_name' => 'Lanzoni',
            'user_name' => 'email6@gmail.com',
            'email' => 'email6@gmail.com',
            'password' => bcrypt('password'),
            'organization_id' => '2',
            'street_address1' => 'business user',
            'street_address2' => 'business user',
            'city' => 'Tagg',
            'zipcode' => '67654',
            'state' => 'NE',
            'phone_number' => '9876543210',]);

        User::create([
            'id' => '7',
            'first_name' => 'Reginald',
            'last_name' => 'Howe',
            'user_name' => 'email7@gmail.com',
            'email' => 'email7@gmail.com',
            'password' => bcrypt('password'),
            'organization_id' => '2',
            'street_address1' => 'business user',
            'street_address2' => 'business user',
            'city' => 'Tagg',
            'zipcode' => '67654',
            'state' => 'NE',
            'phone_number' => '9876543210',]);
    }
}
