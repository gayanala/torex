<?php

namespace App\Http\Controllers;

use App\User;
use App\Organization;
use Illuminate\Http\Request;
use App\Http\Controllers\Route;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

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
        $orgId = $organization->id;

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->user_name = $request->email;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->street_address1 = $request->street_address1;
        $user->street_address2 = $request->street_address2;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->zipcode = $request->zipcode;
        $user->phone_number = $request->phone_number;
        $user->organization_id = $orgId;
        $user->save();
        $user->roles()->attach(3);

        $userid = $user->id;

        return redirect('/securityquestions/create')-> with('userId',$userid);



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
    public function update(Request $request, $id)
    {
        //
        $userUpdate = $request->all();
        //dd($userUpdate);
        User::find($id)->update($userUpdate);
        //$user;
        return redirect('users');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('users');
    }
}
