<?php

namespace App\Http\Controllers;

class HomeController extends Controller
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
    public function index()
    {
        $loggedInUserId = \Auth::user()->id;
        $user = \App\User::find($loggedInUserId);
        $userRole = $user->roles[0]->name;

        return view('home', ['role' => $userRole]);
    }


}