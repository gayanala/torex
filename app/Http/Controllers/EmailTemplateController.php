<?php

namespace App\Http\Controllers;

use App\EmailTemplate;


class EmailTemplateController extends Controller
{
  public function index()
    {
    	
    	$emailtemplate = EmailTemplate::all();//find($template_type_id);
    	//dd($emailtemplate);
    	return view('emailtemplates.index', compact('emailtemplate'));
    }

 public function edit($id)
    {//dd($id);
        $emailtemplate = EmailTemplate::find(1);
        return view('emailtemplates.edit', compact('emailtemplate'));
    }
}

