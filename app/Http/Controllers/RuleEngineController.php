<?php

namespace App\Http\Controllers;

use App\Rule;
use App\DonationRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\withErrors;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
//use Illuminate\Database\Eloquent\Builder;
use timgws\QueryBuilderParser;

// use timgws\JoinSupportingQueryBuilderParser;

class RuleEngineController extends Controller
{
<<<<<<< HEAD
    public function rulesGui(){
        return view('rules.guirules');
    }
    public function rules(){
        $ruleRow = Rule::findOrFail(1)->first();
        $queryBuilderJSON = $ruleRow->rule;

        //dd($queryBuilderJSON);
        return view('rules.rules')->with('rule', $queryBuilderJSON);
    }
    public function runRule(Request $request){
        $input = $request->all();
        $table = DB::table('donation_requests');
        $ruleRow = Rule::findOrFail(1)->first();
        $queryBuilderJSON = $ruleRow->rule;
        $qbp = new QueryBuilderParser(
            ['id','requester','needed_by_date','tax_exempt','dollar_amount','approved_organization_id','approval_status_id']
        );
        //dd($queryBuilderJSON);
        //$query = DonationRequest::with('organizations','approval_statuses');
        $query = $qbp->parse($queryBuilderJSON,  $table);
        $rows = $query->get();
        //Session::flash('msg', 'Thanks for voting');
        dd($query);
        dd($rows);
        // return view('rules.rules');
        return redirect('/rules')->with('msg', Response::JSON($rows));
    }
=======
  public function rulesPending(){
       return view('rules.pending_rules');
   }
   public function rulesDenial(){
       return view('rules.denial_rules');
   }
   public function rulesAcceptance(){
       return view('rules.acceptance_rules');
   }
   public function rulesAutodenial(){
       return view('rules.autodenial_rules');
   }
   public function rulesGUI(){
       return view('rules.rules');
   }
>>>>>>> f761f275b00a7f60dafe9b0d9259bbf426ff3730
    function displayUserDatatable() {
        /* builder is POST'd by the datatable */
        $queryBuilderJSON = Input::get('rules');

        $show_columns = array('id', 'user_name', 'email');

        $query = new QueryBuilderParser($show_columns);

        /** Illuminate/Database/Query/Builder $queryBuilder **/
        $queryBuilder = $query->parse(DB::table('users'));

        return Datatable::query($queryBuilder)
            ->showColumns($show_columns)
            ->orderColumns($show_columns)
            ->searchColumns($show_columns)
            ->make();
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
