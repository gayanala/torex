<?php

namespace App\Listeners;

use App\Events\TriggerRejectEmailEvent;
use App\Mail\RejectMailManual;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;


class TriggerRejectMailView
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
     * @param  TriggerRejectEmailEvent  $event
     * @return void
     */
    public function handle(TriggerRejectEmailEvent $event)
    {
        Mail::to($event->request)->send(new RejectMailManual($event->request));
    }
}
