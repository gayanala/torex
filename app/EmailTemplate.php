<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
       protected $fillable=[
        'template_type_id',
        'email_template_types',
        'email_subject',
        'email_message'
    ];

public $primaryKey = 'template_type_id';
}
