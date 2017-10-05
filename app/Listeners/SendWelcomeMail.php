<?php

namespace App\Listeners;

use App\Events\NewBusiness;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailer;
use Illuminate\Mail;
use App\Mail\RegistrationSuccessful;
use Illuminate\Support\Facades\Auth;

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


        $userFirstName = $event->user->first_name;
        $userEmail = $event->user->email;
/*        Mail::send(['text'=>'emails.startmail'],[],function($message){
            $message->to(Auth::user()->email,Auth::user()->first_name)->subject('Welcome to CommUnityQ');
            $message->from('tagg@gmail.com','tagg');
        });*/
        Mail::send(new RegistrationSuccessful())
                ->to($userEmail);
        //return redirect('\home');

    }
}
