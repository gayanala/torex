<?php

namespace App\Http\Controllers;

use App\UserSecurityQuestion;
use Illuminate\Http\Request;
use Auth;
use App\Security_question;
use Validator;

class UserSecurityQuestionController extends Controller
{
    public function create(Request $request)
    {
        $user = $request->session()->get('userId');
//        dd($user);
        $securityquestions = Security_question::pluck('question', 'id');
        //$users = $request->session()->get('userId');
        return view('securityquestions.create', compact('user', 'securityquestions'))->with('question', $securityquestions);
    }

    public function store(Request $request)
    {

        for ($i = 0; $i < sizeof($request->answer); $i++ ) {
            $user_securityquestion = new UserSecurityQuestion();
            $user_securityquestion->user_id = $request->user_id;
            $user_securityquestion->question_id = $request->question_id[$i];
            $user_securityquestion->answer = $request->answer[$i];
            $user_securityquestion->save();
        }



        $validator = Validator::make($request->all(), [
            'question_id' => 'required',
            'answer' => 'required',
        ]);

        if ($validator->fails()) {

            return redirect('securityquestions/create')
                ->withErrors($validator)
                ->withInput();
        }

//        $user_securityquestion->save();

        else {
            return redirect('/home');
        }
//        return redirect('/home');
//        return redirect('securityquestions');
    }

    public function insertcheck(Request $request)
    {
        $users = Auth::id();
        $user_securityquestion = UserSecurityQuestion::where('user_id', $users)->inRandomOrder()->first();
        $question_name_id = $user_securityquestion->question_id;
        $question = Security_question::findOrFail($question_name_id);
        $question_name = $question->question;
        //dd($question_name);
        return view('securityquestions.insertcheck', compact('user_securityquestion', 'question_name'));
    }
}
