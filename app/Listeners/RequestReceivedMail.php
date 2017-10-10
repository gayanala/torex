<?php

namespace App\Listeners;

use App\Events\DonationRequestReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\GotDonationRequest;

class RequestReceivedMail
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
     * @param  DonationRequestReceived  $event
     * @return void
     */
    public function handle(DonationRequestReceived $event)
    {
        Mail::to($event->donationRequest)->send(new GotDonationRequest($event->donationRequest));
    }
}
