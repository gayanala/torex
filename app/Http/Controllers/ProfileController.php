<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;

class ProfileController extends Controller
{
    public function register(Request $request){
        $this->validate($request, 
        	[
            'name' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'state' => 'required'
            ]);

        $profile = new Profile;
        $profile ->name = $request->input('name');
        $profile ->address1 = $request->input('address1');
        $profile ->address2 = $request->input('address2');
        $profile ->city = $request->input('city');
        $profile ->zipcode = $request->input('zipcode');
        $profile ->state = $request->input('state');
        $profile->save();
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

return redirect('/home')->with('response', 'This Is Your Dashboard');

//dd('success');


    }
}
