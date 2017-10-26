<?php

namespace App\Listeners;

use App\Events\TriggerAcceptEmailEvent;
use App\Mail\AcceptMailManual;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;


class TriggerAcceptMailView
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
     * @param  TriggerAcceptEmailEvent  $event
     * @return void
     */
    public function handle(TriggerAcceptEmailEvent $event)
    {
        //dd($event->request);
        Mail::to($event->request)->send(new AcceptMailManual($event->request));
    }
}
