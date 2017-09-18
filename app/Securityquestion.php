<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Securityquestion extends Model
{
    protected $fillable=[
        'user_id',
        'question',
        'answer'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
