<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = [
        'id',
        'name'
    ];

//    public function roleusers()
//    {
//        return $this->hasOne('App\RoleUser', 'role_id');
//    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
