<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\EmailTemplate;



use App\Http\Controllers\Controller;

class EmailTemplateController extends Controller
{
    public function index()
    {
    	
    	$emailtemplates = EmailTemplate::all();
    	return view('emailtemplates.index', compact('emailtemplates'));
    }

    public function update(Request $request, $id)
    {

        $emailtemplate = EmailTemplate::find($id);
        $emailtemplate -> update($request->all());
        $emailtemplate->save();
        return redirect('emailtemplates');
    }

    public function edit($id)
    {
        $emailtemplate = EmailTemplate::findOrFail($id);
        return view('emailtemplates.edit', compact('emailtemplate'));
    }

    public function send(Request $request)//$id, $email)
    {//dd($request->id);
        $this->email = $request->email;
        $emailtemplate = EmailTemplate::findOrFail($request->id);
        return view('emaileditor.editsendmail', compact('emailtemplate', 'email'));
    }
}

