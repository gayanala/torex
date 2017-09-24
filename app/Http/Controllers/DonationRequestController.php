<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonationRequest;
use Illuminate\Support\Facades\Auth;
use Validator;
//use Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\withErrors;

class DonationRequestController extends Controller
{
    public function index()
    {
        $donationrequest = DonationRequest::all();
        return view('donationrequests.Index', compact('donationrequest'));
    }

//    public function show($id)
//    {
//        $donationrequest=DonationRequest::find($id);
//        return view('donationrequests.show',compact('donationrequest'));
//   }


    public function create()
    {
        return view('donationrequests.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(DonationRequest $donationrequest)
    {
        $validator = Validator::make($donationrequest->all(), [
            'organization' => 'required',
            'formOrganization' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phonenumber' => 'required',
            'address1' => 'required',
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
            'marketingopportunities' => 'required']);
        if ($validator->fails()) {
            return redirect('donationrequest/create')
                ->withErrors($validator)
                ->withInput();


        }
        $donationrequest = Request::all();
        DonationRequest::create($donationrequest);
        return redirect('/show');
    }
}



//$donationrequest = new DonationRequest($donationrequests->all());
//        {


    /**
        $donationrequest = new DonationRequestModel;
        $donationrequest ->organization = $donationrequest->input('organization');
        $donationrequest ->formOrganization = $donationrequest->input('formOrganization');
        $donationrequest ->firstname = $donationrequest->input('firstname');
        $donationrequest ->lastname = $donationrequest->input('lastname');
        $donationrequest ->email = $donationrequest->input('email');
        $donationrequest ->phonenumber = $donationrequest->input('phonenumber');
        $donationrequest ->address1 = $donationrequest->input('address1');
        $donationrequest ->addres21 = $donationrequest->input('address2');
        $donationrequest ->city = $donationrequest->input('city');
        $donationrequest ->state = $donationrequest->input('state');
        $donationrequest ->zipcode = $donationrequest->input('zipcode');
        $donationrequest ->taxexempt = $donationrequest->input('taxexempt');
        $donationrequest ->formRequestFor = $donationrequest->input('formRequestFor');
        $donationrequest ->formDonationPurpose = $donationrequest->input('formDonationPurpose');
        $donationrequest ->eventname = $donationrequest->input('eventname');
        $donationrequest ->eventdate = $donationrequest->input('eventdate');
        $donationrequest ->enddate = $donationrequest->input('enddate');
        $donationrequest ->eventpurpose = $donationrequest->input('eventpurpose');
        $donationrequest ->formAttendees = $donationrequest->input('formAttendees');
        $donationrequest ->venue = $donationrequest->input('venue');
        $donationrequest ->marketingopportunities = $donationrequest->input('marketingopportunities');
        $donationrequest ->save();
        return redirect('/')->with('response', 'Your donation request has been recieved.');
    }
*/



