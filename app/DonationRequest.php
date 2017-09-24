<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{
    protected $fillable=[
        'id',
        'organization',
        'formOrganization',
        'firstname',
        'lastname',
        'email',
        'phonenumber',
        'address1',
        'address2',
        'city',
        'state',
        'zipcode',
        'taxexempt',
        'formRequestFor',
        'formDonationPurpose',
        'eventname',
        'eventdate',
        'enddate',
        'eventpurpose',
        'formAttendees',
        'venue',
        'marketingopportunities'];

        protected $table = 'donation_requests';

}
