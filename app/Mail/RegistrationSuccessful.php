<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class RegistrationSuccessful extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $emailTemplate;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    //public function __construct()
    public function __construct($emailTemplate, User $user)
    {
        $this->user = $user;
        $this->emailTemplate = $emailTemplate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this ->from('noreply@charityq.com')
                     ->subject($this->emailTemplate->email_subject)
                     ->markdown('emails.user.welcomemail');
    }
}
