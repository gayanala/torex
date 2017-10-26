<?php

use App\Rule_type;
use Illuminate\Database\Seeder;

class RuleTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rules')->delete();
        DB::table('rule_types')->delete();
        Rule_type::create(['id' => 1, 'type_name' => 'Auto-Reject', 'type_description' => 'Donation Requests that match the criteria of this rule will be automatically rejected by the system.', 'active' => true]);
        Rule_type::create(['id' => 2, 'type_name' => 'Pre-Accept', 'type_description' => 'Donation Requests that match the criteria of this rule will be flagged as ready for acceptance by the user.', 'active' => true]);
    }
}
