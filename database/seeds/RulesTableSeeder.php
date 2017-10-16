<?php

use Illuminate\Database\Seeder;
use App\Rule;

class RulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rule::create(['id' => 1, 'rule_type' => 1, 'rule_owner' => 1, 'active' => true,
            'rule' => ''
            ]);
    }
}
