<?php

namespace App\Http\Controllers;

use App\Rule_type;
use Auth;
use App\Rule;
use App\DonationRequest;
use App\Organization;
use App\ParentChildOrganizations;
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
use PhpParser\Node\Expr\Array_;
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

    public function runRuleOnSubmit(DonationRequest $donationRequest)
    {
        // This will execute the rule workflow for a donation request using the rules of the organization it was submitted to.
        $parentOrg = ParentChildOrganizations::query()->where('child_org_id', $donationRequest->organization_id)->get(['parent_org_id'])->first();
        If ($parentOrg) {
            $ruleOwner = $parentOrg->parent_org_id;
        }
        else
        {
            $ruleOwner = $donationRequest->organization_id;
        }
        $this->runAutoRejectOnSubmit($donationRequest, $ruleOwner);
        $this->runPendingApprovalOnSubmit($donationRequest, $ruleOwner);
        $this->runPendingRejectionOnSubmit($donationRequest);
    }
    protected function runAutoRejectOnSubmit(DonationRequest $donationRequest, $ruleOwner)
    {
        $ruleRow = Rule::query()->where([['rule_owner_id', '=', $ruleOwner], ['rule_type_id', '=', 1], ['active', '=', 1]])->first();
        if ($ruleRow) {
            $table = DB::table('donation_requests');
            $queryBuilderJSON = $ruleRow->rule;
            $json = json_decode($queryBuilderJSON, true);
            $arr = $this->filteredQueryBuilderJsonArray($json, $donationRequest->id, false);
            $qbp = new QueryBuilderParser(
                ['id', 'organization_id', 'requester', 'requester_type', 'needed_by_date', 'tax_exempt', 'dollar_amount', 'approved_organization_id', 'approval_status_id']
            );
            $query = $qbp->parse(json_encode($arr), $table);
            //dd($query->get());
            $exists = $query->get(['id']);
            if($exists->isNotEmpty())
            {
                // Apply Rule
                $query->update(['approval_status_id' => 4, 'approved_organization_id' => $ruleOwner, 'rule_process_date' => Carbon::now(), 'updated_at' => Carbon::now()]);
            }
        }
    }
    protected function runPendingApprovalOnSubmit(DonationRequest $donationRequest, $ruleOwner)
    {
        $ruleRow = Rule::query()->where([['rule_owner_id', '=', $ruleOwner], ['rule_type_id', '=', 2], ['active', '=', 1]])->first();
        if ($ruleRow) {
            $table = DB::table('donation_requests');
            $queryBuilderJSON = $ruleRow->rule;
            $json = json_decode($queryBuilderJSON, true);
            $arr = $this->filteredQueryBuilderJsonArray($json, $donationRequest->id, false);
            $qbp = new QueryBuilderParser(
                ['id', 'organization_id', 'requester', 'requester_type', 'needed_by_date', 'tax_exempt', 'dollar_amount', 'approved_organization_id', 'approval_status_id']
            );
            $query = $qbp->parse(json_encode($arr), $table);
            //dd($query->get());
            $exists = $query->get(['id']);
            if($exists->isNotEmpty())
            {
                // Apply Rule
                $query->update(['approval_status_id' => 3, 'rule_process_date' => Carbon::now(), 'updated_at' => Carbon::now()]);
            }
        }
    }
    protected function runPendingRejectionOnSubmit(DonationRequest $donationRequest)
    {
        //Flag all requests that do not meet either of the previous two rules as ready for rejection
        $query = DB::table('donation_requests')->where([['id', '=', $donationRequest->id], ['approval_status_id', '=', 1]]);
        $exists = $query->get(['id']);
        if($exists->isNotEmpty())
        {
            $query->update(['approval_status_id' => 2, 'rule_process_date' => Carbon::now(), 'updated_at' => Carbon::now()]);
        }
    }

    public function manualRunRule(Request $request)
    {
        $ruleOwner = Auth::user()->organization_id;
        $this->manualRunAutoRejectRule($ruleOwner);
        $this->manualRunPendingApprovalRule($ruleOwner);
        $this->manualRunPendingRejectionRule($ruleOwner);

        return redirect()->to('/donationrequests'); //->back(); //->with('msg', Response::JSON($rows));
    }
    protected function manualRunAutoRejectRule($ruleOwner)
    {
        $table = DB::table('donation_requests');
        $ruleRow = Rule::query()->where([['rule_owner_id', '=', $ruleOwner], ['rule_type_id', '=', 1], ['active', '=', 1]])->first();
        if ($ruleRow) {
            $queryBuilderJSON = $ruleRow->rule;
            $json = json_decode($queryBuilderJSON, true);
            $arr = $this->filteredQueryBuilderJsonArray($json, $ruleOwner);
            //dd($arr);
            //dd($json);
            $qbp = new QueryBuilderParser(
                ['id', 'organization_id', 'requester', 'requester_type', 'needed_by_date', 'tax_exempt', 'dollar_amount', 'approved_organization_id', 'approval_status_id']
            );
            //dd($table);
            $query = $qbp->parse(json_encode($arr), $table);
            //dd($query);
            //$rows = $query->get();
            $query->update(['approval_status_id' => 4, 'approved_organization_id' => $ruleOwner, 'rule_process_date' => Carbon::now(), 'updated_at' => Carbon::tomorrow()]);
            //dd($rows);
        }
    }
    protected function manualRunPendingApprovalRule($ruleOwner)
    {
        $table = DB::table('donation_requests');
        $ruleRow = Rule::query()->where([['rule_owner_id', '=', $ruleOwner], ['rule_type_id', '=', 2], ['active', '=', 1]])->first();
        if ($ruleRow) {
            $queryBuilderJSON = $ruleRow->rule;
            $json = json_decode($queryBuilderJSON, true);
            $arr = $this->filteredQueryBuilderJsonArray($json, $ruleOwner);
            $qbp = new QueryBuilderParser(
                ['id', 'organization_id', 'requester', 'requester_type', 'needed_by_date', 'tax_exempt', 'dollar_amount', 'approved_organization_id', 'approval_status_id']
            );
            $query = $qbp->parse(json_encode($arr), $table);
            $query->update(['approval_status_id' => 3, 'rule_process_date' => Carbon::now(), 'updated_at' => Carbon::now()]);
            //$rows = $query->get();
            //dd($query);
            //dd($rows);
        }
    }
    protected function manualRunPendingRejectionRule($ruleOwner)
    {
        $query = DB::table('donation_requests')->where([['organization_id', '=', $ruleOwner], ['approval_status_id', '=', 1]]);
        $exists = $query->get(['id']);
        if($exists->isNotEmpty())
        {
            $query->update(['approval_status_id' => 2, 'rule_process_date' => Carbon::now(), 'updated_at' => Carbon::now()]);
        }
    }

    protected function filteredQueryBuilderJsonArray(Array $jsonArray, $iD, $isOrgId = true)
    {
        $array['condition'] = 'AND';
        $array['not'] = 'false';
        if ($isOrgId)
        {
            $array['rules'][0]['field'] = 'organization_id';
            $array['rules'][0]['id'] = 'organization_id';
            $array['rules'][0]['input'] = 'text';
            $array['rules'][0]['operator'] = 'equal';
            $array['rules'][0]['type'] = 'integer';
            $array['rules'][0]['value'] = $iD;
        }
        else
        {
            $array['rules'][0]['field'] = 'id';
            $array['rules'][0]['id'] = 'id';
            $array['rules'][0]['input'] = 'text';
            $array['rules'][0]['operator'] = 'equal';
            $array['rules'][0]['type'] = 'integer';
            $array['rules'][0]['value'] = $iD;
        }
        $array['rules'][1]['field'] = 'approval_status_id';
        $array['rules'][1]['id'] = 'approval_status_id';
        $array['rules'][1]['input'] = 'text';
        $array['rules'][1]['operator'] = 'equal';
        $array['rules'][1]['type'] = 'integer';
        $array['rules'][1]['value'] = 1;
        array_push( $array['rules'], $jsonArray);

        return $array;
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
            $pendingDonationRequests = DonationRequest::query()->where([['organization_id', '=', $organization->id], ['approval_status_id', '<', 4]])->get();
            foreach ($pendingDonationRequests as $donationRequest)
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