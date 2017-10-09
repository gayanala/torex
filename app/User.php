<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'user_name',
        'email',
        'password',
        'organization_id',
        'street_address1',
        'street_address2',
        'city',
        'zipcode',
        'state',
        'phone_number',
    ];

    protected $events =[
        'creating' => Events\NewBusiness::class
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //user has many to many relationship with roles

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    //user has one to many(inverse) relationship with organizations

    public function organization() {
        return $this->belongsTo('App\Organization');
    }

}
