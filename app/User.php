<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=[
        'first_name',
        'last_name',
        'email',
        'street_address1',
        'street_address2',
        'city',
        'state',
        'zipcode',
        'phone_number'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
