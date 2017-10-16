<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rule_type extends Model
{
    protected $fillable = [
        'type_name',
        'type_description',
        'active',
    ];
    protected $table = 'rule_types';
}
