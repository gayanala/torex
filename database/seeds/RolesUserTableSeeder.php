<?php

use Illuminate\Database\Seeder;
use App\RoleUser;

class RolesUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->delete();
        RoleUser::create([
            'id' => '1',
            'role_id' => '1',
            'user_id' => '1',
        ]);

        RoleUser::create([
            'id' => '2',
            'role_id' => '2',
            'user_id' => '2',
        ]);

        RoleUser::create([
            'id' => '3',
            'role_id' => '3',
            'user_id' => '3',
        ]);

        RoleUser::create([
            'id' => '4',
            'role_id' => '4',
            'user_id' => '4',
        ]);

        RoleUser::create([
            'id' => '5',
            'role_id' => '5',
            'user_id' => '5',
        ]);

        RoleUser::create([
            'id' => '6',
            'role_id' => '4',
            'user_id' => '6',
        ]);

        RoleUser::create([
            'id' => '7',
            'role_id' => '4',
            'user_id' => '7',
        ]);
    }
}
