<?php

use App\EmailTemplate;
use Illuminate\Database\Seeder;


class email_template extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('email_templates')->delete();

       EmailTemplate::create(['template_type_id' => 1, 'organization_id' => 1, 'email_subject' => 'Welcome(Admin)', 'email_message' => 'Thank you for registering your business on CharityQ.

We look forward to helping your business save time and make it easy to support the charities you truly care about. A few things you can do with CharityQ: All requests for donation are streamlined and organized.

Filters can be used to ensure the organizations your business wants to support are front and center Automatically decline donation requests that don’t make sense for your business. Add additional users to assist with approving or declining requests.

Please follow the link below to login to your account:

Community Q

Thank you! CharityQ Team']);

        EmailTemplate::create(['template_type_id' => 2, 'organization_id' => 1, 'email_subject' => 'Welcome(User)', 'email_message' => 'You have been added as a new user to CharityQ! Please follow the link below to set up your new account.']);
       	EmailTemplate::create(['template_type_id' => 3, 'organization_id' => 1, 'email_subject' => 'Decision about your donation request', 'email_message' => 'Dear Thank you for entering a request for donation on our website. We have reviewed your request and determined we would like to help out with your event. Instructions will follow with information about how to pick up your request. Thank you']);
        EmailTemplate::create(['template_type_id' => 4, 'organization_id' => 1, 'email_subject' => 'Your donation request has been declined', 'email_message' => 'Dear Thank you for entering a request for donation on our website. Unfortunately, at this time we are not able to help out with your event. Kind regards, TAGG provides an innovative way for schools, nonprofits, places of worship, teams and even team members to raise money year-round without asking for donations or selling. Please consider registering your organization on the TAGG website by following the link below. http://www.togetheragreatergood.com/causes/']);
         EmailTemplate::create(['template_type_id' => 5, 'organization_id' => 1, 'email_subject' => 'Password Change', 'email_message' => 'Dear <name>
We received a request to update the password associated with this email address.
Click the link below, or paste it into your browser. You’ll be taken to a secure page where you can change your password.
<insert link>
The link will expire in 12 hours.
Sincerely
CharityQ Team
']);
    }
}
