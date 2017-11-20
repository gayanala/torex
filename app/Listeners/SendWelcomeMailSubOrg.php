<?php

namespace App\Listeners;

use App\Events\NewSubBusiness;
use App\Mail\UserCreated;
use App\PasswordReset;
use Carbon\Carbon;
use Mail;
use App\EmailTemplate;
use App\Custom\Constant;

class SendWelcomeMailSubOrg
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
     * @param  NewSubBusiness  $event
     * @return void
     */
    public function handle(NewSubBusiness $event)
    {
        //generate a token similar to the one laravel generates
        $reset_token = strtolower(str_random(40));
        $hashed_token = hash_hmac('sha256', $reset_token, env('APP_KEY'));
        $hashed_token_bcrypt = bcrypt($hashed_token);

        //insert created bcrypted token to the database along with email id and timestamp.
        //Email id to authenticate that particular user and timestamp to timeout reset link.

        PasswordReset::insert([
            'email' => $event->user->email,
            'token' => $hashed_token_bcrypt,
            'created_at' => Carbon::now(),
        ]);

        //send out an email to just created user with hashed token appended to reset link,
        // which will redirect user to reset password page.

        $resetLink = route('password.reset', [$hashed_token]);

        //get email template for add new user
        $emailTemplate = EmailTemplate::where('template_type_id', Constant::NEW_USER)->get();

        Mail::to($event->user->email)->send(new UserCreated($emailTemplate, $resetLink, $event->user));

    }
}
