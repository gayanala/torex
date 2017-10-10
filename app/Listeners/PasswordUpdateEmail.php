<?php

namespace App\Listeners;

use App\Events\PasswordUpdate;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\PasswordIsUpdated;


class PasswordUpdateEmail
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
     * @param  PasswordUpdate  $event
     * @return void
     */
    public function handle(PasswordUpdate $event)
    {
        Mail::to($event->user)->send(new PasswordIsUpdated($event->user));
    }
}
