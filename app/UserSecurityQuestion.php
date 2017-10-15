<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSecurityQuestion extends Model
{
    protected $fillable = [
        'user_id',
        'question_id',
        'answer'
    ];

    protected $table = 'user_security_questions';

    public function securityQuestions()
    {
        return $this->belongsTo('App\Security_question');
    }
}
