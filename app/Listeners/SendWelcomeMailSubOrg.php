<?php

namespace App\Listeners;

use App\Events\NewSubBusiness;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\UserCreated;

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
        Mail::to($event->user->email)->send(new UserCreated($event->user));
    }
}
