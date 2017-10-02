<?php

namespace App\Listeners;

use App\Events\NewBusiness;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationSuccessful;

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
        Mail::to($event->user->email)->send(new RegistrationSuccessful($event->user));
    }
}
