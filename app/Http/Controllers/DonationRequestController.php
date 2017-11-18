<?php

namespace App\Http\Controllers;

use App\Custom\Constant;
use App\DonationRequest;
use App\Events\DonationRequestReceived;
use App\Events\TriggerAcceptEmailEvent;
use App\Events\TriggerRejectEmailEvent;
use App\Organization;
use App\ParentChildOrganizations;
use App\Request_event_type;
use App\Request_item_purpose;
use App\Request_item_type;
use App\Requester_type;
use App\State;
use Auth;
use Carbon\Carbon;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Http\withErrors;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use URL;

//use App\File;


class DonationRequestController extends Controller
{
    public function index()
    {
        $organizationId = Auth::user()->organization_id;
        $organization = Organization::findOrFail($organizationId);
        $organizationName = $organization->org_name;
        $arr = ParentChildOrganizations::where('parent_org_id', $organizationId)->pluck('child_org_id')->toArray();
        array_push($arr, $organizationId);
        $donationrequests = DonationRequest::whereIn('organization_id', $arr)->get();
        $today = Carbon::now()->toDateString();
        return view('donationrequests.index', compact('donationrequests', 'organizationName', 'today'));

    }

    public function create(Request $request)
    {
        $organization = Organization::where('id', $request->orgId)->get();
        $expireDate = $organization[0]->trial_ends_at;

        if ($expireDate > Carbon::now() OR ($organization[0]->parentOrganization->isNotEmpty() AND $organization[0]->parentOrganization[0]->parentOrganization->trial_ends_at >= Carbon::now())) {
            $states = State::pluck('state_name', 'state_code');
            $requester_types = Requester_type::where('active', '=', Constant::ACTIVE)->pluck('type_name', 'id');
            $request_item_types = Request_item_type::where('active', '=', Constant::ACTIVE)->pluck('item_name', 'id');
            $request_item_purpose = Request_item_purpose::where('active', '=', Constant::ACTIVE)->pluck('purpose_name', 'id');
            $request_event_type = Request_event_type::where('active', '=', Constant::ACTIVE)->pluck('type_name', 'id');
            return view('donationrequests.create')->with('states', $states)->with('requester_types', $requester_types)->with('request_item_types', $request_item_types)
                ->with('request_item_purpose', $request_item_purpose)->with('request_event_type', $request_event_type);
        } else {
            return view('donationrequests.expired');
        }
    }

    public function edit($id)
    {
        $states = State::pluck('state_name', 'state_code');
        $requester_types = Requester_type::where('active', '=', Constant::ACTIVE)->pluck('type_name', 'id');
        $request_item_types = Request_item_type::where('active', '=', Constant::ACTIVE)->pluck('item_name', 'id');
        $request_item_purpose = Request_item_purpose::where('active', '=', Constant::ACTIVE)->pluck('purpose_name', 'id');
        $request_event_type = Request_event_type::where('active', '=', Constant::ACTIVE)->pluck('type_name', 'id');
        $donationrequest = DonationRequest::find($id);
        return view('donationrequests.edit', compact('donationrequest'))->with('states', $states)->with('requester_types', $requester_types)->with('request_item_types', $request_item_types)
            ->with('request_item_purpose', $request_item_purpose)->with('request_event_type', $request_event_type);
//        return view('donationrequests.edit',compact('donationrequest', 'requester_types'));
    }


    public function update($id, Request $request)
    {

        $donationrequest = new DonationRequest($request->all());
        $donationrequest = DonationRequest::find($id);
        $donationrequest->update($request->all());
        return redirect('donationrequests');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */


    public function store(Request $request)
    {
        $donationRequest = new DonationRequest;
        $donationRequest->organization_id = $request->orgId;
        $donationRequest->requester = $request->requester;
        $donationRequest->requester_type = $request->requester_type;
        $donationRequest->first_name = $request->firstname;
        $donationRequest->last_name = $request->lastname;
        $donationRequest->email = $request->email;
        $donationRequest->phone_number = $request->phonenumber;
        $donationRequest->street_address1 = $request->address1;
        $donationRequest->street_address2 = $request->address2;
        $donationRequest->city = $request->city;
        $donationRequest->state = $request->state;
        $donationRequest->zipcode = $request->zipcode;
        $donationRequest->tax_exempt = $request->taxexempt;
        if ($request->hasFile('attachment')) {
            $imageName = time() . '.' . $request->attachment->getClientOriginalExtension();
            // $image = $request->file('attachment');
            // $uploadStatus = Storage::disk('s3')->put($imageName, file_get_contents($image), 'public');
            $imageName = Storage::disk('s3')->url($imageName);
            $donationRequest->file_url = $imageName;
        }
        $donationRequest->item_requested = $request->item_requested;
        $donationRequest->dollar_amount = $request->dollar_amount;
        $donationRequest->item_purpose = $request->item_purpose;
        $donationRequest->needed_by_date = $request->needed_by_date;
        $donationRequest->event_name = $request->eventname;
        $donationRequest->event_start_date = $request->startdate;
        $donationRequest->event_type = $request->event_type;
        $donationRequest->est_attendee_count = $request->formAttendees;
        $donationRequest->venue = $request->venue;
        $donationRequest->marketing_opportunities = $request->marketingopportunities;
        $donationRequest->approval_status_id = Constant::SUBMITTED;
        $donationRequest->approval_status_reason = 'Business Rules failed to run on request.';
        $this->validate($request, [
            'needed_by_date' => 'after:today',
            'startdate' => 'after:today',
            'taxexempt' => "required",
        ]);
        $donationRequest->save();
        if ($request->hasFile('attachment')) {
            // $this->validate($request, [
            //         'attachment' => 'image|file|mimetypes:doc,docx,pdf,jpeg,png,jpg,gif,svg|max:2048',
            //     ]);
            $imageName = time() . '.' . $request->attachment->getClientOriginalExtension();
            $image = $request->file('attachment');
            $uploadStatus = Storage::disk('s3')->put($imageName, file_get_contents($image), 'public');

        }

        //fire NewBusiness event to initiate sending welcome mail
        event(new DonationRequestReceived($donationRequest));

        // Execute Business rules on newly submitted request
        app('App\Http\Controllers\RuleEngineController')->runRuleOnSubmit($donationRequest);
        return redirect('/');
    }

    public function show($id)
    {
        $donationAcceptanceFlag = 0;
        if (URL::previous() === URL::route('show-donation', ['id' => 1])) {
            $donationAcceptanceFlag = 0;
        } else {
            $donationAcceptanceFlag = 1;
        }
        $donationrequest = DonationRequest::findOrFail($id);

        if ($donationrequest->event_type) {
            $event_purpose = Request_event_type::findOrFail($donationrequest->event_type);
            $event_purpose_name = $event_purpose->type_name;
        }

        if ($donationrequest->item_purpose) {
            $donation_purpose = Request_item_purpose::findOrFail($donationrequest->item_purpose);
            $donation_purpose_name = $donation_purpose->purpose_name;
        }


        if ($donationrequest->item_requested) {
            $item_requested = Request_item_type::findOrFail($donationrequest->item_requested);
            $item_requested_name = $item_requested->item_name;
        }

        if ($donationrequest->requester_type) {
            $donationRequest = Requester_type::findOrFail($donationrequest->requester_type);
            $donationRequestName = $donationRequest->type_name;
        }

        return view('donationrequests.show', compact('donationrequest', 'event_purpose_name', 'donation_purpose_name'
            , 'item_requested_name', 'donationRequestName', 'donationAcceptanceFlag'));
    }

    public function changeDonationStatus(Request $request)
    {
        $userId = Auth::user()->id;
        $userName = Auth::user()->first_name . ' ' . Auth::user()->last_name;
        $organizationId = Auth::user()->organization_id;

        if ($request->input('approve') == 'Approve') {
            $approved_amount = $request->approved_amount;
            $donation_id = $request->id;
            $donation = DonationRequest::where('id', $donation_id)->get();
            $donation[0]->update(['approval_status_id' => Constant::APPROVED]);
            $donation[0]->update(['approved_dollar_amount' => $approved_amount]);
            $donation[0]->update(['approved_organization_id' => $organizationId]);
            $donation[0]->update(['approved_user_id' => $userId]);
            $donation[0]->update(['approval_status_reason' => 'Approved by ' . $userName]);
            event(new TriggerAcceptEmailEvent($donation[0]));

            $organization = Organization::findOrFail($organizationId);
            $organizationName = $organization->org_name;
            $donationrequests = DonationRequest::where('organization_id', '=', $organizationId)->get();
            $today = Carbon::now()->toDateString();
            return view('donationrequests.index', compact('donationrequests', 'organizationName', 'today'));

        } elseif ($request->input('reject') == 'Reject') {
            $donation_id = $request->id;
            $donation = DonationRequest::where('id', $donation_id)->get();
            $donation[0]->update(['approval_status_id' => Constant::REJECTED]);
            $donation[0]->update(['approved_organization_id' => $organizationId]);
            $donation[0]->update(['approved_user_id' => $userId]);
            $donation[0]->update(['approval_status_reason' => 'Rejected by ' . $userName]);
            event(new TriggerRejectEmailEvent($donation[0]));

            $organization = Organization::findOrFail($organizationId);
            $organizationName = $organization->org_name;
            $donationrequests = DonationRequest::where('organization_id', '=', $organizationId)->get();
            $today = Carbon::now()->toDateString();
            return view('donationrequests.index', compact('donationrequests', 'organizationName', 'today'));
        }

        $emailids = [];
        if ($request['status'] == 0) {
            $donation = DonationRequest::whereIn('id', $request['ids'])->update(['approval_status_id' => Constant::APPROVED, 'approval_status_reason' => 'Approved by ' . $userName, 'approved_organization_id' => $organizationId, 'approved_user_id' => $userId]);
            $acceptedrequests = DonationRequest::whereIn('id', $request['ids'])->get();

            foreach ($acceptedrequests as $acceptedrequest) {
                event(new TriggerAcceptEmailEvent($acceptedrequest));
                usleep(500000);
            }

        } elseif ($request['status'] == 1) {
            $donation = DonationRequest::whereIn('id', $request['ids'])->update(['approval_status_id' => Constant::REJECTED, 'approval_status_reason' => 'Rejected by ' . $userName, 'approved_organization_id' => $organizationId, 'approved_user_id' => $userId]);
            $rejectedrequests = DonationRequest::whereIn('id', $request['ids'])->get();

            foreach ($rejectedrequests as $rejectedrequest) {
                event(new TriggerRejectEmailEvent($rejectedrequest));
                usleep(500000);
            }
        }

        return response()->json(['idsArray' => $request['ids'], 'status' => $request['status']]);
    }

    public function updatestatus(Request $request)
    {
        dd($request);
    }

    public function showAllDonationRequests($id)
    {
        $organization = Organization::findOrFail($id);

        return view('donationrequests.donation-organization', compact('organization'));
    }
}
