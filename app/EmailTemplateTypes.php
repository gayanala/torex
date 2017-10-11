<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailTemplateTypes extends Model
{
     protected $fillable=[
        'id',
        'template_type'
    ];
}
