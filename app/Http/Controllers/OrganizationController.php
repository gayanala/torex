<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Organization;


class OrganizationController extends Controller
{
    public function index()
    {
        return view('auth.organization');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'org_name' => 'required|string|max:255',
            'org_description' => 'required',
            'street_address1' => 'required|string|max:255',
            'street_address2' => 'string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zipcode' => 'required',
            'phone_number' => 'required',

            /*'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed|string|min:6|',*/
        ]);
    }

    protected function create(Request $request)
    {
        return Organization::create([
            'org_name' => $request['org_name'],
            'org_description' => $request['org_description'],
            'street_address1' => $request['street_address1'],
            'street_address2' => $request['street_address2'],
            'city' => $request['city'],
            'state' => $request['state'],
            'zipcode' => $request['zipcode'],
            'phone_number' => $request['phone_number'],
        ]);
    }

// include organization id in the donation request URL//


}
