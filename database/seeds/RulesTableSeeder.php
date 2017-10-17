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
        DB::table('rules')->delete();
        Rule::create(['id' => 1, 'rule_type_id' => 1, 'rule_owner_id' => 1, 'active' => true,
            'rule' => "{  \"condition\": \"AND\",  \"rules\": [ {\"id\": \"dollar_amount\",\"field\": \"dollar_amount\",\"type\": \"double\",\"input\": \"number\",\"operator\": \"less\",\"value\": \"500\" }, {\"id\": \"needed_by_date\",\"field\": \"needed_by_date\",\"type\": \"date\",\"input\": \"text\",\"operator\": \"not_between\",\"value\": [  \"10/22/2017\",  \"10/28/2017\"] }  ],  \"not\": false,  \"valid\": true}"
            ]);
    }
}
