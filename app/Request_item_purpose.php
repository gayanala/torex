<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Request_item_purpose extends Model
{
    use Notifiable;
    protected $fillable = [
        'id',
        'purpose_name',
        'purpose_description',
        'active',
    ];
}