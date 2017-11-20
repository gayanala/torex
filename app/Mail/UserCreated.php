<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $resetLink;
    public $emailTemplate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailTemplate, $resetLink, User $user)
    {
        $this->user = $user;
        $this->resetLink = $resetLink;
        $this->emailTemplate = $emailTemplate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->markdown('emails.user.usercreatedmail');
        return $this ->from('noreply@charityq.com')
            ->subject($this->emailTemplate->email_subject)
            ->view('emails.user.usercreatedmail');
    }
}
