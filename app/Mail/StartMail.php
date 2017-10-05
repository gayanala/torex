<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StartMail extends Mailable
{
    use Queueable, SerializesModels;

    public $title;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title)
    {
        //
        $this->title = $title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('noreply@testqapp.com')
                    ->view('emails.startmail');
    }
}
