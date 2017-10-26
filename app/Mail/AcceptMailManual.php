<?php

namespace App\Mail;

use App\DonationRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Organization;

class AcceptMailManual extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $request;
    public $org;

    public function __construct($request)
    {
        $this->request = $request;
        $org = Organization::findOrFail($request->organization_id);
        $org =$org->org_name;
        $this->org = $org;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.decisionmail.acceptmail')
            ->subject('Your Donation Request has been approved')
            ->from('noreply@charityq.com');
    }
}
