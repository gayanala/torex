<?php

namespace App\Listeners;

use App\Custom\Constant;
use App\Events\AddDefaultTemplates;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Organization;
use App\EmailTemplate;

class AddDefaultTemplatesListener
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
     * @param  AddDefaultTemplates  $event
     * @return void
     */
    public function handle(AddDefaultTemplates $event)
    {

        //get default templates for Accept and Reject donations email templates from TAGG.
        $emailtemplates = EmailTemplate::where('organization_id', 1)->whereIn ('template_type_id', [Constant::REQUEST_APPROVED, Constant::REQUEST_REJECTED])->get();

        foreach ($emailtemplates as $emailtemplate) {

            EmailTemplate::create(['template_type_id' => $emailtemplate->template_type_id, 'organization_id' => $event->orgid, 'email_subject' => $emailtemplate->email_subject, 'email_message' => $emailtemplate->email_message]);
        }
    }
}
