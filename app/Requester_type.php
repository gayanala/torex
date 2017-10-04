<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Requester_type extends Model
{
    use Notifiable;
    protected $fillable = [
        'type_name',
        'type_description',
        'active',
    ];
}
