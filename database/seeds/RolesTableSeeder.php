<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Tagg Owner',
        ]);
        DB::table('roles')->insert([
            'name' => 'Administrator',
        ]);
        DB::table('roles')->insert([
            'name' => 'Business Admin',
        ]);
        DB::table('roles')->insert([
            'name' => 'Business User',
        ]);
    }
}
