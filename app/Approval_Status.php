<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approval_status extends Model
{
    protected $fillable = [
        'status_name',
        'status_description'
    ];

}
