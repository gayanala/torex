<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable=[
        'first_name',
        'last_name',
        'user_name',
        'email',
        'address1',
        'address2',
        'city',
        'zipcode',
        'state',
        'phone_number'
    ];

}
