<?php

namespace App\Http\Controllers;

use App\UserSecurityQuestion;
use Illuminate\Http\Request;
use Auth;
use App\Security_question;

class UserSecurityQuestionController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $securityquestions = Security_question::pluck('question', 'id');
        //$users = $request->session()->get('userId');
        return view('securityquestions.create', compact('user', 'securityquestions'))->with('question', $securityquestions);
    }

    public function store(Request $request)
    {
        $user_securityquestion = new UserSecurityQuestion($request->all());
//        dd($user_securityquestion);

//        $validator = Validator::make($request->all(), [
//            'question_id' => 'required',
//            'answer' => 'required',
//        ]);
//
//        if ($validator->fails()) {
//            return redirect('securityquestions/create')
//                ->withErrors($validator)
//                ->withInput();
//        }

        $user_securityquestion->save();


        return redirect('/home');
//        return redirect('securityquestions');
    }
}
