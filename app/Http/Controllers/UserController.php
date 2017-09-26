<?php

namespace App\Http\Controllers;

use App\User;
use App\Organization;
use Illuminate\Http\Request;
use App\Http\Controllers\Route;

class UserController extends Controller
{

    public function index()
    {
        //
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }


    public function create(Request $request)
    {
        $organization = new Organization;
        $organization->org_name = $request->org_name;
        $organization->org_description = $request->org_description;
        $organization->street_address1 = $request->street_address1;
        $organization->street_address2 = $request->street_address2;
        $organization->city = $request->city;
        $organization->state = $request->state;
        $organization->zipcode = $request->zipcode;
        $organization->phone_number = $request->phone_number;
        $organization->save();

        User::create
        ([
            /*'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'user_name' => $request['user_name'],*/
            'name' => $request['first_name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'street_address1' => $request['street_address1'],
            'street_address2' => $request['street_address2'],
            'city' => $request['city'],
            'state' => $request['state'],
            'zipcode' => $request['zipcode'],
            'phone_number' => $request['phone_number'],
            'organization_id' => $organization->id,
        ])->roles()->attach(3);

        $userid => user->id
        return redirect('/securityquestions/create', $userid );
        //return view('users.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $user = Request::all();
        User::create($user);
        return redirect('users');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
        $userUpdate = Request::all();
        $user = User::find($id);
        $user->update($userUpdate);
        return redirect('users');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('users');
    }
}
