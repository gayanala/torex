<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable=[
        'first_name',
        'last_name',
        'address',
        'city',
        'state',
        'zip_code',
        'phone_number',
        'organization_name',
        'user_name',
        'password'
    ];

}
