<?php

namespace App\Listeners;

use App\Events\NewBusiness;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\RegistrationSuccessful;
use App\EmailTemplate;
use App\Custom\Constant;

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
        $emailTemplate = EmailTemplate::where('template_type_id', Constant::NEW_BUSINESS)->get();
        $emailTemplate = $emailTemplate[0];

        Mail::to($event->user->email)->send(new RegistrationSuccessful($emailTemplate, $event->user));
    }

}
