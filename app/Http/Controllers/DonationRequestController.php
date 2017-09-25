<?php

namespace App\Http\Controllers;

use App\DonationRequest;
use Illuminate\Http\Request;
use Illuminate\Http\withErrors;
use Validator;

class DonationRequestController extends Controller
{
    public function index()
    {//dd();
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
    {//dd('Yup');
        //dd($request);
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

        /**
         * $donationrequest = new DonationRequestModel;
         * $donationrequest ->organization = $donationrequest->input('organization');
         * $donationrequest ->formOrganization = $donationrequest->input('formOrganization');
         * $donationrequest ->firstname = $donationrequest->input('firstname');
         * $donationrequest ->lastname = $donationrequest->input('lastname');
         * $donationrequest ->email = $donationrequest->input('email');
         * $donationrequest ->phonenumber = $donationrequest->input('phonenumber');
         * $donationrequest ->address1 = $donationrequest->input('address1');
         * $donationrequest ->addres21 = $donationrequest->input('address2');
         * $donationrequest ->city = $donationrequest->input('city');
         * $donationrequest ->state = $donationrequest->input('state');
         * $donationrequest ->zipcode = $donationrequest->input('zipcode');
         * $donationrequest ->taxexempt = $donationrequest->input('taxexempt');
         * $donationrequest ->formRequestFor = $donationrequest->input('formRequestFor');
         * $donationrequest ->formDonationPurpose = $donationrequest->input('formDonationPurpose');
         * $donationrequest ->eventname = $donationrequest->input('eventname');
         * $donationrequest ->eventdate = $donationrequest->input('eventdate');
         * $donationrequest ->enddate = $donationrequest->input('enddate');
         * $donationrequest ->eventpurpose = $donationrequest->input('eventpurpose');
         * $donationrequest ->formAttendees = $donationrequest->input('formAttendees');
         * $donationrequest ->venue = $donationrequest->input('venue');
         * $donationrequest ->marketingopportunities = $donationrequest->input('marketingopportunities');
         * $donationrequest ->save();
         * return redirect('/')->with('response', 'Your donation request has been recieved.');
         * }
         */
        /*if ($validator->fails()) {
            dd('fail');
            return redirect('donationrequest/create')
                ->withErrors($validator)
                ->withInput();
        }*/
        //$donationrequest = Request::all();
        //DonationRequest::create($donationrequest);
        return redirect('/');
    }
}