<?php

namespace App\Http\Controllers;

use App\Rule_type;
use Auth;
use App\Rule;
use App\DonationRequest;
use App\Organization;
use App\User;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use Illuminate\Http\withErrors;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
//use Illuminate\Database\Eloquent\Builder;
use phpDocumentor\Reflection\Types\Integer;
use Carbon\Carbon;
use timgws\QueryBuilderParser;

// use timgws\JoinSupportingQueryBuilderParser;

class RuleEngineController extends Controller
{
    public function index(Request $request)
    {
        // dd($request);
        $rule_types = Rule_type::where('active', '=', 1)->pluck('type_name', 'id');
        $orgId = Auth::user()->organization_id;
        $ruleType = $request->rule ?? 1;
        $ruleRow = Rule::query()->where([['rule_owner_id', '=', $orgId], ['rule_type_id', '=', $ruleType], ['active', '=', true]])->first();
        //dd($ruleRow);
        if ($ruleRow) {
            $queryBuilderJSON = $ruleRow->rule;
        } else {
            $queryBuilderJSON = ''; //'{"condition": "AND", "rules": [{}], "not": false, "valid": true }';
        }
        //dd($queryBuilderJSON);
        return view('rules.rules')->with('rule', $queryBuilderJSON)->with('rule_types', $rule_types)->with('ruleType', $ruleType);
    }

    public function loadRule($request)
    {
        // dd($request);
        $rule_types = Rule_type::where('active', '=', 1)->pluck('type_name', 'id');
        $orgId = Auth::user()->organization_id;
        $ruleType = $request->rule ?? 1;
        $ruleRow = Rule::query()->where([['rule_owner_id', '=', $orgId], ['rule_type_id', '=', $ruleType], ['active', '=', true]])->first();
        //dd($ruleRow);
        if ($ruleRow) {
            $queryBuilderJSON = $ruleRow->rule;
        } else {
            $queryBuilderJSON = ''; //'{"condition": "AND", "rules": [{}], "not": false, "valid": true }';
        }
        //dd($queryBuilderJSON);
    }

    public function saveRule(Request $request)
    {
        //
        $strJSON = $request->ruleSet;
        $ruleType = $request->ruleType;
        $ruleOwner = Auth::user()->organization_id;
        //dd($strJSON);
        /*$rule = new Rule;
        $rule->rule_type_id = 2;
        $rule->rule_owner_id = Auth::user()->organization_id;
        $rule->rule = $strJSON;*/
        Rule::updateOrCreate(['rule_owner_id' => $ruleOwner, 'rule_type_id' => $ruleType], ['rule' => $strJSON]);
        return redirect()->back();
    }

    public function runRule(Request $request)
    {
        $ruleOwner = Auth::user()->organization_id;
        $this->runAutoRejectRule($ruleOwner);
        $this->runPendingApprovalRule($ruleOwner);
        $this->runPendingRejectionRule($ruleOwner);

        return redirect()->to('/donationrequests'); //->back(); //->with('msg', Response::JSON($rows));
    }

    protected function runAutoRejectRule($ruleOwner)
    {
        $table = DB::table('donation_requests');
        $ruleRow = Rule::query()->where([['rule_owner_id', '=', $ruleOwner], ['rule_type_id', '=', 1], ['active', '=', 1]])->first();
        if ($ruleRow) {
            $queryBuilderJSON = $ruleRow->rule;
            $json = json_decode($queryBuilderJSON);
            $qbp = new QueryBuilderParser(
                ['id', 'requester', 'requester_type', 'needed_by_date', 'tax_exempt', 'dollar_amount', 'approved_organization_id', 'approval_status_id']
            );
            $query = $qbp->parse(json_encode($json), $table)->where([['organization_id', '=', $ruleOwner], ['approval_status_id', '=', 1]]);
            //$rows =
            $query->update(['approval_status_id' => 4, 'approved_organization_id' => $ruleOwner, 'rule_process_date' => Carbon::now()]);
            //$rows = $query->get();
            //dd($query);
            //dd($rows);
        }
    }

    protected function runPendingApprovalRule($ruleOwner)
    {
        $table = DB::table('donation_requests');
        $ruleRow = Rule::query()->where([['rule_owner_id', '=', $ruleOwner], ['rule_type_id', '=', 2], ['active', '=', 1]])->first();
        if ($ruleRow) {
            $queryBuilderJSON = $ruleRow->rule;
            $json = json_decode($queryBuilderJSON);
            $qbp = new QueryBuilderParser(
                ['id', 'requester', 'requester_type', 'needed_by_date', 'tax_exempt', 'dollar_amount', 'approved_organization_id', 'approval_status_id']
            );
            //dd(json_encode($json));
            $query = $qbp->parse(json_encode($json), $table)->where([['organization_id', '=', $ruleOwner], ['approval_status_id', '=', 1]]);
            //$rows =
            $query->update(['approval_status_id' => 3, 'rule_process_date' => Carbon::now()]);
            //$rows = $query->get();
            //dd($query);
            //dd($rows);
        }
    }

    protected function runPendingRejectionRule($ruleOwner)
    {
        $query = DB::table('donation_requests')->where([['organization_id', '=', $ruleOwner], ['approval_status_id', '=', 1]]);
        //$rows =
        $query->update(['approval_status_id' => 2, 'rule_process_date' => Carbon::now()]);
        //$rows = $query->get();
        //dd($query);
        //dd($rows);
    }

    public function runBudgetCheckRule()
    {
        // Get Active organizations
        $organizations = Organization::query()->where('trial_ends_at', '>=', Carbon::now()->toDateTimeString())->get(['id']);

        foreach ($organizations as $organization) {
            $monthlyBudget = Organization::query()->where('id', '=', $organization->id)->get(['monthly_budget'])->first()->monthly_budget;
            $amountSpent = DonationRequest::query()->whereMonth('needed_by_date', '=', Carbon::today()->month)->whereYear('needed_by_date', '=', Carbon::today()->year)
                ->where([['approved_organization_id', $organization->id], ['approval_status_id', 5]])
                ->sum('approved_dollar_amount');
            $donationRequests = DonationRequest::query()->where([['organization_id', '=', $organization->id], ['approval_status_id', '<', 4]])->get();
            foreach ($donationRequests as $donationRequest)
            {
                $requestAmount = $donationRequest->dollar_amount;
                If (($requestAmount + $amountSpent) >= $monthlyBudget)
                {
                    // auto-reject each request that would put organization over budget
                    $donationRequest->approval_status_id = 4;
                    $donationRequest->approved_organization_id = $organization->id;
                    $donationRequest->rule_process_date = Carbon::now();
                    $donationRequest->save();
                }
            }
        }
        return redirect()->back();
    }
}