<?php

namespace App\Listeners;

use App\Events\NewBusiness;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use App\Mail\RegistrationSuccessful;
use Auth;

class SendWelcomeMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewBusiness  $event
     * @return void
     */
    public function handle(NewBusiness $event)
    {

        Mail::send(['text'=>'emails.startmail'],[],function($message){
            $message->to(\Auth::user()->email,\Auth::user()->first_name)->subject('Welcome to CommUnityQ');
            $message->from('tagg@gmail.com','tagg');
        });
        return redirect('\home');

    }
}
