<?php
namespace App\Http\Controllers;

use App\DonationRequest;
use App\File;
use App\Request_event_type;
use App\Request_item_purpose;
use App\Request_item_type;
use App\Requester_type;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Http\withErrors;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Events\DonationRequestReceived;
use App\Organization_type;


class DonationRequestController extends Controller
{
    public function index()
    {
        $donationrequests = DonationRequest::paginate(5);
//        $type_organization_id = $donationrequests->requester_type;
//        dd($type_organization_id);
//        $type_organization = Organization_type::findOrFail($type_organization_id);
//        $type_organization_name = $type_organization->type_name;

        return view('donationrequests.index', compact('donationrequests'));
    }

    public function create()
    {
        $states = State::pluck('state_name', 'state_code');
        $requester_types = Requester_type::pluck('type_name', 'id');
        $request_item_types = Request_item_type::pluck('item_name', 'id');
        $request_item_purpose = Request_item_purpose::pluck('purpose_name', 'id');
        $request_event_type = Request_event_type::pluck('type_name', 'id');
        return view('donationrequests.create')->with('states', $states)->with('requester_types', $requester_types)->with('request_item_types', $request_item_types)
            ->with('request_item_purpose', $request_item_purpose)->with('request_event_type', $request_event_type);
    }

    public function edit($id)
    {
        $states = State::pluck('state_name', 'state_code');
        $requester_types = Requester_type::pluck('type_name', 'id');
        $request_item_types = Request_item_type::pluck('item_name', 'id');
        $request_item_purpose = Request_item_purpose::pluck('purpose_name', 'id');
        $request_event_type = Request_event_type::pluck('type_name', 'id');
        $donationrequest=DonationRequest::find($id);
        return view('donationrequests.edit', compact('donationrequest'))->with('states', $states)->with('requester_types', $requester_types)->with('request_item_types', $request_item_types)
            ->with('request_item_purpose', $request_item_purpose)->with('request_event_type', $request_event_type);
//        return view('donationrequests.edit',compact('donationrequest', 'requester_types'));
    }

    public function update($id,Request $request)
    {

        $donationrequest= new DonationRequest($request->all());
        $donationrequest=DonationRequest::find($id);
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
        /*$validator = Validator::make($request->all(), [
            'requester' => 'required',
            'requester_type' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phonenumber' => 'required',
            'address1' => 'required',
            // 'address2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'taxexempt' => 'required',
            'item_requested' => 'required',
            'item_purpose' => 'required',
            'eventname' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
            'event_type' => 'required',
            'formAttendees' => 'required',
            'venue' => 'required',
            'marketingopportunities' => 'required'
        ]);
        //dd($request);
        if ($validator->fails())
        {
            return redirect('donationrequests') ->withErrors($validator)->withInput();
        }*/
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
        $donationRequest->item_requested = $request->item_requested;
        $donationRequest->item_purpose = $request->item_purpose;
        $donationRequest->event_name = $request->eventname;
        $donationRequest->event_start_date = $request->startdate;
        $donationRequest->event_end_date = $request->enddate;
        $donationRequest->event_type = $request->event_type;
        $donationRequest->est_attendee_count = $request->formAttendees;
        $donationRequest->venue = $request->venue;
        $donationRequest->marketing_opportunities = $request->marketingopportunities;
        $donationRequest->save();
        if($request->hasFile('attachment')) {
            $file = new File();
            $file->donation_request_id = $donationRequest->id;
            $file->original_filename = $request->file('attachment')->getClientOriginalName();
            $file->file_path = Storage::putFile('public', $request->file('attachment') );
            $file->file_type='attachment';
            $file->save();
        }

        //fire NewBusiness event to initiate sending welcome mail

        event(new DonationRequestReceived($donationRequest));

        return redirect('/');
    }

    public function show($id)
    {
        $donationrequest = DonationRequest::findOrFail($id);
        $event_purpose_id = $donationrequest->event_type;
        $event_purpose = Request_item_type::findOrFail($event_purpose_id);
        $event_purpose_name = $event_purpose->item_name;

        $donation_purpose_id = $donationrequest->item_purpose;
        $donation_purpose = Request_item_purpose::findOrFail($donation_purpose_id);
        $donation_purpose_name = $donation_purpose->purpose_name;

        $item_requested_id = $donationrequest->item_requested;
        $item_requested = Request_event_type::findOrFail($item_requested_id);
        $item_requested_name = $item_requested->type_name;

        $type_organization_id = $donationrequest->requester_type;
        $type_organization = Organization_type::findOrFail($type_organization_id);
        $type_organization_name = $type_organization->type_name;

        return view('donationrequests.show',compact('donationrequest', 'event_purpose_name', 'donation_purpose_name'
        , 'item_requested_name', 'type_organization_name'));
    }

    public function searchDonationRequest(Request $request) {

        $query = $request->q;
        $donationrequests = DonationRequest::where('requester', 'LIKE', "%$query%")->paginate(3);
        return view('donationrequests.index', compact('donationrequests'));
    }
}
