<?php
/**
 * Created by PhpStorm.
 * User: SanKp
 * Date: 9/30/2017
 * Time: 9:51 PM
 */

namespace App\Http\Controllers;

use Auth;
use App\Organization;
use App\DonationRequest;

class DashboardController extends Controller
{


    public function index()
    {
        $organizationId = Auth::user()->organization_id;
        $organization = Organization::findOrFail($organizationId);
        $organizationName = $organization->org_name;
        $donationrequests = DonationRequest::where('organization_id', '=', $organizationId)->get();
        //dd($donationrequests);
        return view('dashboard.index', compact('donationrequests', 'organizationName'));
    }


}