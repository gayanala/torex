<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(Security_questionsTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(Organization_typesTableSeeder::class);
        $this->call(RequesterTypesTableSeeder::class);
        $this->call(Request_item_typesTableSeeder::class);
        $this->call(Request_item_purposesTableSeeder::class);
        $this->call(Request_event_typesTableSeeder::class);
    }
}
