<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('roles')->insert([
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
        ]);*/
        DB::table('roles')->delete();

        Role::create(['name' => 'Tagg Owner']);

        Role::create(['name' => 'Administrator']);

        Role::create(['name' => 'Business Admin']);

        Role::create(['name' => 'Business User']);
    }
}
