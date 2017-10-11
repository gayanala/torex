<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
       protected $fillable=[
        'template_type_id',
        'organization_id',
        'email_subject',
        'email_message'
    ];
}
