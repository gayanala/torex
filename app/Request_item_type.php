<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Request_item_type extends Model
{
    use Notifiable;
    protected $fillable = [
        'id',
        'item_name',
        'item_description',
        'active',
    ];
}
