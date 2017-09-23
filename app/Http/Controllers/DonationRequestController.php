<?php

namespace App\Http\Controllers;

use Request;
use App\DonationRequest;

class DonationRequestController extends Controller
{
    public function index()
    {

        $donationrequest=DonationRequest::all();
        return view('donationrequests.index',compact('donationrequest'));
    }

    public function show($id)
    {
        $donationrequest=DonationRequest::find($id);
        return view('donationrequests.show',compact('donationrequest'));
    }


    public function create()
    {
        return view('donationrequests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store()
    {
        $donationrequest=Request::all();
        DonationRequest::create($donationrequest);
        return redirect('donationrequest');
    }


}
