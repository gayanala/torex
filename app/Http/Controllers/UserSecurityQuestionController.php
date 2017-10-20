<?php

namespace App\Http\Controllers;

use App\UserSecurityQuestion;
use Illuminate\Http\Request;
use Auth;
use App\Security_question;
use Validator;
use App\User;
use Hash;


class UserSecurityQuestionController extends Controller
{
    public function create(Request $request)
    {
        $user = $request->session()->get('userId');
        $securityquestions = Security_question::pluck('question', 'id');
        return view('securityquestions.create', compact('user', 'securityquestions'))->with('question', $securityquestions);
    }

//    public function withValidator($validator)
//    {
//        $validator->after(function ($validator) {
//            if ($this->somethingElseIsInvalid()) {
//                $validator->errors()->add('field', 'Something is wrong with this field!');
//            }
//        });
//    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question_id' => 'required',
            'answer' => 'required',
        ]);

//        $validator->after(function ($validator) {
//            if ($this->somethingElseIsInvalid()) {
//                $validator->errors()->add('field', 'Something is wrong with this field!');
//            }
//        });

        if ($validator->fails()) {

            return redirect('securityquestions/create')
                ->withErrors($validator)
                ->withInput();
        }

        for ($i = 0; $i < sizeof($request->answer); $i++ ) {
            $user_securityquestion = new UserSecurityQuestion();
            $user_securityquestion->user_id = $request->user_id;
            $user_securityquestion->question_id = $request->question_id[$i];
            $user_securityquestion->answer = $request->answer[$i];
            $user_securityquestion->answer = strtolower($user_securityquestion->answer);
            $user_securityquestion->answer = Hash::make($user_securityquestion->answer);
            $user_securityquestion->save();
        }


        return redirect('/home');



//        else {
//            return redirect('/home');
//        }
    }




    public function showemailpage() {
        return view('securityquestions/insertemail');
    }

    public function insertcheck(Request $request)
    {
        $email_address = $request->email;
        $user_info = User::where('email', $email_address)->first();

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'email' => 'exists:users,email'
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $users = $user_info->id;
        $user_securityquestion = UserSecurityQuestion::where('user_id', $users)->inRandomOrder()->first();
        $question_name_id = $user_securityquestion->question_id;
        $question = Security_question::findOrFail($question_name_id);
        $question_name = $question->question;
        return view('securityquestions.insertcheck', compact('user_securityquestion', 'question_name', 'email_address'));
    }

    public function check(Request $request)
    {
        $checkanswer = strtolower($request->answer_by_user);
        $question_id1 = $request->question_id;
        $email_address = $request->email_address;

        $user_info = User::where('email', $email_address)->first();
        $users = $user_info->id;

        $user_securityquestion = UserSecurityQuestion::where('user_id', $users)->where('question_id', $question_id1)->first();

        $user_answer = $user_securityquestion->answer;

        if (Hash::check($checkanswer, $user_answer))
        {
            return view('auth.passwords.email', compact('email_address'));
        }
        else {
            return back()->with('error', '* Answers do not match the record.');
        }
    }
}
