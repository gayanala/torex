<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\State;
use App\Organization_type;
use Auth;


class OrganizationController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $orgID = $user->organization_id;
        $organization = Organization::findOrFail($orgID);

        $type_organization_id = $organization->organization_type_id;
        $type_organization = Organization_type::findOrFail($type_organization_id);
        $type_organization_name = $type_organization->type_name;

        return view('organizations.index')->with(compact('organization', 'type_organization_name'));
    }

    public function edit($id)
    {
        $organization=Organization::find($id);
        $states = State::pluck('state_name', 'state_code');
        $Organization_types = Organization_type::pluck('type_name', 'id');
        return view('organizations.edit', compact('organization', 'states', 'Organization_types'));
    }

    public function update(Request $request, $id)
    {
//        $organization= new Organization($request->all());
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|regex:/[0-9]{9}/',
            'zipcode' => 'required|regex:/[0-9]{5}/',
            'state' => 'required',
        ]);

        if ($validator->fails())
        {
            return redirect() ->back()->withErrors($validator)->withInput();
        }

        $organizationUpdate = $request->all();
        Organization::find($id)->update($organizationUpdate);
        return redirect('organizations');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'org_name' => 'required|string|max:255',
            'organization_type_id' => 'required',
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
            'organization_type_id' => $request['org_description'],
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
