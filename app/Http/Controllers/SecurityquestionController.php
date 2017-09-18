<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Securityquestion;
use Illuminate\Support\Facades\Auth;
use App\User;

class SecurityquestionController extends Controller
{

    public function index()
    {
        //
        $securityquestions=Securityquestion::all();
        return view('securityquestions.index',compact('securityquestions'));
    }

//    public function show($id)
//    {
//        $securityquestion=Securityquestion::find($id);
//        return view('securityquestions.show',compact('securityquestion'));
//    }


    public function create()
    {
        $users = Auth::id();
//        $users = User::pluck('name','id');
        return view('securityquestions.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $securityquestion= new Securityquestion($request->all());
        $securityquestion->save();
        return redirect('/home');
//        return redirect('securityquestions');
    }


//    public function edit($id)
//    {
//        $securityquestion=Securityquestion::find($id);
//        return view('securityquestions.edit',compact('securityquestion'));
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
//    public function update($id)
//    {
//        //
//        $securityquestionUpdate=Request::all();
//        $securityquestion=Securityquestion::find($id);
//        $securityquestion->update($securityquestionUpdate);
//        return redirect('securityquestions');
//    }

    public function destroy($id)
    {
        Securityquestion::find($id)->delete();
        return redirect('securityquestions');
    }
}
