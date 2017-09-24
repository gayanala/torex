<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable=[
      'name',
      'address1',
      'address2',
      'city',
      'zipcode',
      'state',
      
    ];
}
