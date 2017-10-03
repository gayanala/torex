<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmailTemplate;
use App\Http\Controllers\Controller;


class EmailTemplateController extends Controller
{
      public function index()
    {
    	
    
    	return view('emailtemplates.index', compact('emailtemp'));
    }

		public function create()
    {
        return view('emailtemplates.create');
    }


}
