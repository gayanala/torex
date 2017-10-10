<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Organization extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'org_name',
        'organization_type_id',
        'street_address1',
        'street_address2',
        'city',
        'zipcode',
        'state',
        'phone_number',
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
