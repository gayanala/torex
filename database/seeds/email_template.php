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

        EmailTemplate::create(['id' => 1, 'template_type_id' => 1, 'organization_id' => 1, 'email_subject' => 'Welcome to CharityQ!', 'email_message' => '<p>Thank you &nbsp;<strong>{Addressee}</strong>&nbsp;&nbsp;for registering your business on CharityQ. We look forward to helping your business save time and make it easy to support the charities you truly care about.</p>
<p>You can log in any time to your account by using your email address as your user name.</p>
<p>Thank you again for using CharityQ.</p>']);

        EmailTemplate::create(['id' => 2, 'template_type_id' => 2, 'organization_id' => 1, 'email_subject' => 'Welcome to CharityQ!', 'email_message' => '<p>Hello &nbsp;<strong>{Addressee}</strong>&nbsp;,</p>
<p>You have been added as a new user to CharityQ for &nbsp;<strong>{My Business Name}.&nbsp;</strong>&nbsp;Please follow the link below to set up your new account.</p>
<p>Thank you!</p>
<p>&nbsp;- CharityQ Team</p>']);
        EmailTemplate::create(['id' => 3, 'template_type_id' => 3, 'organization_id' => 1, 'email_subject' => 'Decision about your donation request', 'email_message' => '<p>Dear &nbsp;<strong>{Addressee},&nbsp;</strong></p>
<p>Thank you for entering a submitting a donation request through our website. We have reviewed your request and determined we are able to help you out with your request.</p>
<p>&nbsp;</p>
<p>Here are the instruction to pick up your donation:</p>
<p>&nbsp;</p>
<p>Thank you,</p>
<p>&nbsp;<strong>{My Business Name}</strong>&nbsp;</p>']);
        EmailTemplate::create(['id' => 4, 'template_type_id' => 4, 'organization_id' => 1, 'email_subject' => 'Your donation request has been declined', 'email_message' => '<p style="background: white;"><span style="font-size: 10.5pt; font-family: Verdana; color: black;">Dear &nbsp;<strong><span>{Addressee},&nbsp;</span></strong></span></p>
<p style="background: white;"><span style="font-size: 10.5pt; font-family: Verdana; color: black;">Thank you for entering a request for donation on our website. Unfortunately, at this time we are not able to help out with your event.&nbsp;All of our Omaha locations have partnered with TAGG (Together a Greater Good) so that we can support as many local organizations as possible. In lieu of donating to specific raffles, auctions and galas, and sponsorships, we donate 5% of a guest&rsquo;s tab to an organization of their choosing. &nbsp;&nbsp;</span></p>
<p style="font-family: Calibri, sans-serif;"><span style="font-size: 10.5pt; font-family: Verdana; color: black;">This is done through the TAGG mobile app, which is available for download on iPhones and Androids. Just search &ldquo;Together a Greater Good&rdquo; and you should find it!</span></p>']);
        EmailTemplate::create(['id' => 5, 'template_type_id' => 5, 'organization_id' => 1, 'email_subject' => 'Password Change Request', 'email_message' => '<p>Dear &nbsp;<strong>{Addressee},&nbsp;</strong>&nbsp;</p>
<p>You have changed your password for CharityQ application. If it is not you that changed password please contact your admin as soon as possible.</p>
<p>Sincerely,</p>
<p>- CharityQ Team</p>']);
    }
}
