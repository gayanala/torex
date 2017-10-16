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
        Rule::create(['id' => 1, 'rule_type_id' => 1, 'rule_owner_id' => 1, 'active' => true,
            'rule' => "{
                id: 'name',
                label: 'Name',
                type: 'string'
            }, {
        id: 'category',
                label: 'Category',
                type: 'integer',
                input: 'select',
                values: {
            1: 'Athletics',
                    2: 'Cancer Research',
                    3: 'Health Care',
                    4: 'Housing',
                    5: 'Youth Organization',
                    6: 'Veteran Affairs'
                },
                operators: ['equal', 'not_equal', 'in', 'not_in', 'is_null', 'is_not_null']
            }, {
        id: 'in_stock',
                label: 'In stock',
                type: 'integer',
                input: 'radio',
                values: {
            1: 'Yes',
                    0: 'No'
                },
                operators: ['equal']
            }, {
        id: 'amount',
                label: 'Amount',
                type: 'double',
                validation: {
            min: 0,
                    step: 0.01
                }
            }, {
        id: 'id',
                label: 'Identifier',
                type: 'string',
                placeholder: '____-____-____',
                operators: ['equal', 'not_equal'],
                validation: {
            format: /^.{4}-.{4}-.{4}$/
                }
            }"
            ]);
    }
}
