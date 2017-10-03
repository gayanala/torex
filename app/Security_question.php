<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Security_question extends Model
{
    protected $fillable = [
        'id',
        'question'
    ];
}
