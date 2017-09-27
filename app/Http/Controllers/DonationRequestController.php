<?php

namespace App\Http\Controllers;

use App\DonationRequest;
use Illuminate\Http\Request;
use Illuminate\Http\withErrors;
use Validator;

class DonationRequestController extends Controller
{
    public function index()
    {
        $donationrequest = DonationRequest::all();
        return view('donationrequests.Index', compact('donationrequest'));
    }

    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'organization' => 'required',
                'formOrganization' => 'required',
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required',
                'phonenumber' => 'required',
                'address1' => 'required',
                'address2' => 'required',
                'city' => 'required',
                'state' => 'required',
                'zipcode' => 'required',
                'taxexempt' => 'required',
                'formRequestFor' => 'required',
                'formDonationPurpose' => 'required',
                'eventname' => 'required',
                'eventdate' => 'required',
                'enddate' => 'required',
                'eventpurpose' => 'required',
                'formAttendees' => 'required',
                'venue' => 'required',
                'marketingopportunities' => 'required'
            ]);
        $donationRequest = new DonationRequest;
        $donationRequest->organization = $request->organization;
        $donationRequest->formOrganization = $request->formOrganization;
        $donationRequest->firstname = $request->formOrganization;
        $donationRequest->lastname = $request->lastname;
        $donationRequest->email = $request->email;
        $donationRequest->phonenumber = $request->phonenumber;
        $donationRequest->address1 = $request->address1;
        $donationRequest->city = $request->city;
        $donationRequest->state = $request->state;
        $donationRequest->zipcode = $request->zipcode;
        $donationRequest->taxexempt = $request->taxexempt;
        $donationRequest->formRequestFor = $request->formRequestFor;
        $donationRequest->formDonationPurpose = $request->formDonationPurpose;
        $donationRequest->eventname = $request->eventname;
        $donationRequest->enddate = $request->enddate;
        $donationRequest->eventpurpose = $request->eventpurpose;
        $donationRequest->formAttendees = $request->formAttendees;
        $donationRequest->venue = $request->venue;
        $donationRequest->marketingopportunities = $request->marketingopportunities;
        $donationRequest->save();

        return redirect('/');
    }
}