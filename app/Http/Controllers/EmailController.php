<?php

namespace App\Http\Controllers;
use App\Mail\RegistrationSuccessful;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class EmailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function email()
    {
        Mail::to(Auth::user()->email)->send(new RegistrationSuccessful());
        return view('home');
    }
}