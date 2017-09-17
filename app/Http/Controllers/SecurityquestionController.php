<?php

namespace App\Http\Controllers;

use Request;

use App\Securityquestion;

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
        return view('securityquestions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $securityquestion=Request::all();
        Securityquestion::create($securityquestion);
        return redirect('securityquestions');
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
