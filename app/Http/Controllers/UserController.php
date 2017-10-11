<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Route;
use App\Organization;
use App\State;
use App\User;
use App\Events\NewBusiness;
use App\Events\NewSubBusiness;
use Illuminate\Http\Request;
use Illuminate\Http\withErrors;
use Auth;
use Validator;
use Illuminate\Validation\Rule;


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
        $user = Auth::user();
        return view('users.index', compact('user'));
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
        $organization->organization_type_id = $request->organization_type_id;
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
        $user->roles()->attach(4);

        $userid = $user->id;

        //fire NewBusiness event to initiate sending welcome mail

        event(new NewBusiness($user));

        return redirect('/securityquestions/create')-> with('userId',$userid);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $loggedInUserDetails = User::findOrFail(Auth::user()->id);

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->user_name = $request->email;
        $user->email = $request->email;
        $user->password = bcrypt('password');
        $user->street_address1 = $loggedInUserDetails->street_address1;
        $user->street_address2 = $loggedInUserDetails->street_address2;
        $user->city = $loggedInUserDetails->city;
        $user->state = $loggedInUserDetails->state;
        $user->zipcode = $loggedInUserDetails->zipcode;
        $user->organization_id = $loggedInUserDetails->organization_id;
        $user->phone_number = $loggedInUserDetails->phone_number;

        $user->save();

        $user->roles()->attach(5);

        //dd($loggedInUserDetails);

        //User::create($user);

        //fire NewBusiness event to initiate sending welcome mail

        event(new NewSubBusiness($user));


        return redirect('users');
    }

    public function edit($id)
    {
        $states = State::pluck('state_name', 'state_code');
        $user = User::find($id);
        return view('users.edit', compact('user'))->with('states', $states);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {//dd($request);
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|regex:/[0-9]{9}/',
            'zipcode' => 'required|regex:/[0-9]{5}/',
            'state' => 'required',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')->ignore($id),
                ],
        ]);

        if ($validator->fails())
        {
            return redirect() ->back()->withErrors($validator)->withInput();
        }

        $userUpdate = $request->all();
        User::find($id)->update($userUpdate);

        return redirect('users');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('users');
    }
}
