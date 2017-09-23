<?php
use Illuminate\Database\Seeder;
class postsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'id',
        ]);
        DB::table('users')->insert([
            'name' => 'first_name',
        ]);
        DB::table('users')->insert([
            'name' => 'last_name',
        ]);
        DB::table('users')->insert([
            'name' => 'address',
        ]);
        DB::table('users')->insert([
            'name' => 'city',
        ]);
        DB::table('users')->insert([
            'name' => 'state',
        ]);
        DB::table('users')->insert([
            'name' => 'zip_code',
        ]);
        DB::table('users')->insert([
            'name' => 'phone_number',
        ]);
        DB::table('users')->insert([
            'name' => 'company_name',
        ]);
        DB::table('users')->insert([
            'name' => 'user_name',
        ]);
    }
}