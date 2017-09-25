<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Organization;

class UserController extends Controller
{
    public function create(Request $request) {//dd($request);

        $organization = new Organization;
        $organization->org_name = $request['org_name'];
        $organization->org_description = $request['org_description'];
        $organization->street_address1 = $request['street_address1'];
        $organization->street_address2 = $request['street_address2'];
        $organization->city = $request['city'];
        $organization->state = $request['state'];
        $organization->zipcode = $request['zipcode'];
        $organization->phone_number = $request['phone_number'];
        $organization->save();

    	User::create
        ([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'user_name' => $request['user_name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'street_address1' => $request['street_address1'],
            'street_address2' => $request['street_address2'],
            'city' => $request['city'],
            'state' => $request['state'],
            'zipcode' => $request['zipcode'],
            'phone_number' => $request['phone_number'],
            'organization_id' => $organization->id,
        ]);

        return redirect('/home');

    }
}