<?php

namespace App\Listeners;

use App\Events\SendAutoRejectEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\AutoRejectMail;
use Mail;
use App\DonationRequest;

class SendAutoRejectMessage
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
     * @param  SendAutoRejectEmail  $event
     * @return void
     */
    public function handle(SendAutoRejectEmail $event)
    {
        Mail::to($event ->donationrequest -> email)->send(new AutoRejectMail());
    }
}
