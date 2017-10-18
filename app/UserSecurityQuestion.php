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

    public function securityQuestionsName()
    {
        return $this->belongsTo('App\Security_question', 'id');
    }

    protected $table = 'user_security_questions';


}
