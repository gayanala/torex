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
    public function email(){

        Mail::send(['text'=>'emails.startmail'],[],function($message){
            $message->to(\Auth::user()->email,\Auth::user()->first_name)->subject('Welcome to CommUnityQ');
            $message->from('tagg@gmail.com','tagg');
        });
        return redirect('\home');

    }
}