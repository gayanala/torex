<?php

namespace App\Http\Controllers;

use Request;
use App\DonationRequest;

class DonationRequestController extends Controller
{
    public function index()
    {

        $donationrequests=DonationRequest::all();
        return view('posts.index',compact('donationrequests'));
    }

    public function show($id)
    {
        $donationrequest=DonationRequest::find($id);
        return view('posts.show',compact('donationrequest'));
    }


    public function create()
    {
        return view('donationrequest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store()
    {
        $DonationRequest=Request::all();
        DonationRequest::create($DonationRequest);
        return redirect('donationrequests');
    }


}
