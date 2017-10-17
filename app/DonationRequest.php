<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{
    protected $fillable = [
        'organization_id',
        'requester',
        'requester_type',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'street_address1',
        'street_address2',
        'city',
        'state',
        'zipcode',
        'tax_exempt',
        'item_requested',
        'dollar_amount',
        'item_purpose',
        'other_item_purpose',
        'needed_by_date',
        'event_name',
        'event_type',
        'est_attendee_count',
        'event_start_date',
        'event_end_date',
        'est_attendee_count',
        'venue',
        'marketing_opportunities'
    ];
//     protected $table = 'donation_requests';

    public function donationRequestTypes() {
        return $this->hasOne('App\Requester_type', 'id');
    }

    public function donationRequestType() {
        return $this->belongsTo('App\Request_item_type', 'id');
    }

    public function donationRequestPurpose() {
        return $this->hasOne('App\Request_item_purpose');
    }

    public function donationOrganization() {
        return $this->hasOne('App\Organization_type');
    }

    public function donationApprovalStatus() {
        return $this->belongsTo('App\Approval_Status', 'id');
    }
}