<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization_type extends Model
{
    protected $fillable = [
        'id',
        'type_name',
        'type_description',
        'active'
    ];

    protected $table = 'organization_types';

    public function organizations() {
        return $this->hasMany('App\Organization');
    }
}
