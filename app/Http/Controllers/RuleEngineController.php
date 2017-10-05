<?php

namespace App\Http\Controllers;

use App\DonationRequest;
use timgws\QueryBuilderParser;

// use timgws\JoinSupportingQueryBuilderParser;

class RuleEngineController extends Controller
{
    public function rulesGui(){
        return view('rules.guirules');
    }

    function getDonationData($input){
        /*$table = DB::table('donation_requests');
        $qbp = new QueryBuilderParser(
            array(
                'event_type',
                'item_requested',
                'item_purpose',
                'tax_exempt',
                'requester_type',
                'requester'
            )
        );
        $query = $qbp->parse($input['querybuilder'], $table);
        $rows = $query->get();
    }
    function displayDonationData(){
        // builder is POST'd by the datatable
        $queryBuilderJSON = Input::get('rules');

        $show_columns = array(
            'event_type',
            'item_requested',
            'item_purpose',
            'tax_exempt',
            'requester_type',
            'requester'
        );

        $query = new QueryBuilderParser($show_columns);

        // Illuminate/Database/Query/Builder $queryBuilder
        $queryBuilder = $query->parse(DB::table('donation_requests'));

        return Datatable::query($queryBuilder)
            ->showColumns($show_columns)
            ->orderColumns($show_columns)
            ->searchColumns($show_columns)
            ->make();*/
        /* default query if it is NULL */
        $queryBuilderJSON =  '{"condition": "AND", "rules": [], "not": false, "valid": true }';
        if(Input::has('querybuilder') && Input::get('querybuilder') != 'null')
            $queryBuilderJSON = Input::get('querybuilder');
        $show_columns = array(
            'event_type',
            'item_requested',
            'item_purpose',
            'tax_exempt',
            'requester_type',
            'requester'
        );
        $query = new QueryBuilderParser($show_columns);
        $Q = DonationRequest::with(
            'event_type',
            'item_requested',
            'item_purpose',
            'tax_exempt',
            'requester_type',
            'requester'
        );
        $queryBuilder = $query->parse($queryBuilderJSON, $Q);
        return Datatables::of($queryBuilder->get())->make(true);
    }


}
