<?php

namespace App\Listeners;

use App\Events\NewSubBusiness;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\UserCreated;
use App\PasswordReset;
use Carbon\Carbon;

class SendWelcomeMailSubOrg
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
     * @param  NewSubBusiness  $event
     * @return void
     */
    public function handle(NewSubBusiness $event)
    {
        //Mail::to($event->user->email)->send(new UserCreated($event->user));
        //send reset passwprd link
        $reset_token = strtolower(str_random(40));
        $hashed_token = hash_hmac ( 'sha256' , $reset_token , env('APP_KEY'));
        $hashed_token_bcrypt = bcrypt($hashed_token);
        PasswordReset::insert([
            'email' => $event->user->email,
            'token' => $hashed_token_bcrypt,
            'created_at' => Carbon::now(),
        ]);
        Mail::to($event->user->email)->send(new UserCreated($reset_token, $event->user));
        //dd($hashed_token);
    }
}
