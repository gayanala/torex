<?php

use App\Role;
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

        DB::table('roles')->delete();

        Role::create(['id' => 1, 'name' => 'Root User']);

        Role::create(['id' => 2, 'name' => 'Tagg Owner']);

        Role::create(['id' => 3, 'name' => 'Tagg User']);

        Role::create(['id' => 4, 'name' => 'Business Admin']);

        Role::create(['id' => 5, 'name' => 'Business User']);
    }
}
