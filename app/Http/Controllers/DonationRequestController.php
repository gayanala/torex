<?php

namespace App\Http\Controllers;

use App\Custom\Constant;
use App\DonationRequest;
use App\EmailTemplate;
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



class DonationRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('create','store');
    }

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

    public function admin()
    {
        $organizationId = Auth::user()->organization_id;

        $organization = Organization::findOrFail($organizationId);
        $organizationName = $organization->org_name;
        $arr = ParentChildOrganizations::where('parent_org_id', $organizationId)->pluck('child_org_id')->toArray();
        array_push($arr, $organizationId);
        $donationrequests = DonationRequest::whereIn('organization_id', $arr)->get();
        $today = Carbon::now()->toDateString();
        return view('donationrequests.admin-index', compact('donationrequests', 'organizationName', 'today'));

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

        if ($request->hasFile('attachment') && $request->taxexempt==1) {
            $imageName = time() . '.' . $request->attachment->getClientOriginalExtension();
            $imageName = Storage::disk('s3')->url($imageName);
            $donationRequest->file_url = $imageName;
        }
        $donationRequest->item_requested = $request->item_requested;
        $donationRequest->other_item_requested = $request->item_requested_explain;
        $donationRequest->dollar_amount = $request->dollar_amount;
        $donationRequest->item_purpose = $request->item_purpose;
        $donationRequest->other_item_purpose = $request->item_purpose_explain;
        $donationRequest->needed_by_date = $request->needed_by_date;
        $donationRequest->event_name = $request->eventname;
        $donationRequest->event_start_date = $request->startdate;
        $donationRequest->event_type = $request->event_type;
        $donationRequest->est_attendee_count = $request->formAttendees;
        $donationRequest->venue = $request->venue;
        $donationRequest->marketing_opportunities = $request->marketingopportunities;
        $donationRequest->approval_status_id = Constant::SUBMITTED;
        $donationRequest->approval_status_reason = Constant::STATUS_REASON_DEFAULT;
        $this->validate($request, [

            'needed_by_date' => 'after:today',
            'startdate' => 'after:today',
            'taxexempt' => "required",
            'phonenumber' => 'required|regex:/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/',
        ]);




        $donationRequest->save();
        if ($request->hasFile('attachment') && $request->taxexempt==1) {
            $this->validate($request, [
                    'attachment' => 'required|mimes:doc,docx,pdf,jpeg,png,jpg,svg|max:2048',
                ]);
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
        $id = decrypt($id);
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
        $donation_id = $request->id;
        $donation = DonationRequest::where('id', $donation_id)->get();
        $donation = $donation[0]; //convert collection into an array
        $page_from = 'donationrequests';
        $ids_string = (string)$donation->id;
        $names = $donation->first_name.' '.$donation->last_name;
        $emails = $donation->email;

        if ($request->input('approve') == 'Approve') {
            $approved_amount = $request->approved_amount;
            $donation->update(['approved_dollar_amount' => $approved_amount]);
            $email_template = EmailTemplate::where('template_type_id', Constant::REQUEST_APPROVED)->where('organization_id', $organizationId)->get();
            $email_template = $email_template[0]; //convert collection into an array

            return view('emaileditor.approvesendmail', compact('email_template', 'emails', 'names', 'ids_string', 'page_from'));

//            $organization = Organization::findOrFail($organizationId);
//            $organizationName = $organization->org_name;
//            $donationrequests = DonationRequest::where('organization_id', '=', $organizationId)->get();
//            $today = Carbon::now()->toDateString();
            //return view('donationrequests.index', compact('donationrequests', 'organizationName', 'today'));

        } elseif ($request->input('reject') == 'Reject') {
            $email_template = EmailTemplate::where('template_type_id', Constant::REQUEST_REJECTED)->where('organization_id', $organizationId)->get();
            $email_template = $email_template[0]; //convert collection into an array

            return view('emaileditor.rejectsendmail', compact('email_template', 'emails', 'names', 'ids_string', 'page_from'));


//            $organization = Organization::findOrFail($organizationId);
//            $organizationName = $organization->org_name;
//            $donationrequests = DonationRequest::where('organization_id', '=', $organizationId)->get();
//            $today = Carbon::now()->toDateString();
//            return view('donationrequests.index', compact('donationrequests', 'organizationName', 'today'));
        }

    }

    public function updatestatus(Request $request)
    {
        dd($request);
    }

    public function showAllDonationRequests($id)
    {
        $id = decrypt($id);
        $organization = Organization::findOrFail($id);

        return view('donationrequests.donation-organization', compact('organization'));
    }
}
