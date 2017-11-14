<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    //
    protected $fillable = [
        'rule_type_id',
        'rule_owner_id',
        'rule',
        'active',
    ];
    public function ruleType() {
        return $this->belongsTo('App\rule_type', 'rule_type_id', 'id');
    }
}
