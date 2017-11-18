<?php
/**
 * Created by PhpStorm.
 * User: SanKp
 * Date: 9/30/2017
 * Time: 9:51 PM
 */

namespace App\Http\Controllers;

use App\Custom\Constant;
use App\DonationRequest;
use App\Organization;
use App\ParentChildOrganizations;
use App\User;
use Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $organizationId = Auth::user()->organization_id;
        $organization = Organization::findOrFail($organizationId);

        $organizationName = $organization->org_name;
        $donationrequests = DonationRequest::where('organization_id', '=', $organizationId)
            ->whereIn('approval_status_id', [Constant::SUBMITTED, Constant::PENDING_REJECTION, Constant::PENDING_APPROVAL])->get();
        $amountDonated = DonationRequest::where('approval_status_id', Constant::APPROVED)->where('organization_id', $organizationId)->sum('approved_dollar_amount');
        $rejectedNumber = DonationRequest::where('approval_status_id', Constant::REJECTED)->where('organization_id', $organizationId)->count();
        $approvedNumber = DonationRequest::where('approval_status_id', Constant::APPROVED)->where('organization_id', $organizationId)->count();
        $pendingNumber = DonationRequest::whereIn('approval_status_id', [Constant::PENDING_REJECTION, Constant::PENDING_APPROVAL])->where('organization_id', $organizationId)->count();

        return view('dashboard.index', compact('donationrequests', 'organizationName', 'amountDonated', 'rejectedNumber', 'approvedNumber', 'pendingNumber'));
    }

    public function indexTaggAdmin() {

        $organizations = Organization::all();

        $parentOrgs = Organization::where('trial_ends_at', '>=', Carbon::now()->toDateTimeString())->pluck('id')->toArray();
        $organizationsArray = ParentChildOrganizations::whereIn('parent_org_id', $parentOrgs)->pluck('child_org_id')->toArray();
        array_push($organizationsArray, $parentOrgs);

        $numActiveLocations = sizeOf($organizationsArray);
        $userCount = User::whereIn('organization_id', $organizationsArray)->count();

        $userThisWeek = Organization::where('created_at', '>=', Carbon::now()->startOfWeek())->whereNotNull('trial_ends_at')->count();
        $userThisMonth = Organization::where('created_at', '>=', Carbon::now()->startOfMonth())->whereNotNull('trial_ends_at')->count();
        $userThisYear = Organization::where('created_at', '>=', Carbon::now()->startOfYear())->whereNotNull('trial_ends_at')->count();

        $avgAmountDonated = floatval(DonationRequest::where('approval_status_id', 5)->avg('dollar_amount'));
        $rejectedNumber = DonationRequest::where('approval_status_id', 4)->count();
        $approvedNumber = DonationRequest::where('approval_status_id', 5)->count();
        $pendingNumber = DonationRequest::whereIn('approval_status_id', [2, 3])->count();

        return view('dashboard.admin-index', compact('organizations', 'avgAmountDonated', 'rejectedNumber', 'approvedNumber', 'pendingNumber', 'numActiveLocations', 'userCount', 'userThisWeek', 'userThisMonth', 'userThisYear'));
    }
}