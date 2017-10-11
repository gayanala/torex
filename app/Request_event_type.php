<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Request_event_type extends Model
{
    use Notifiable;
    protected $fillable = [
        'id',
        'type_name',
        'type_description',
        'active',
    ];
}