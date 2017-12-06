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
    }
}
