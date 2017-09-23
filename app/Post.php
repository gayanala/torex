<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable=[
        'first_name',
        'last_name',
        'email',
        'street_address1',
        'street_address2',
        'city',
        'state',
        'zipcode',
        'phone_number',
        'organization_name'
    ];

}
