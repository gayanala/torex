<?php

namespace App\Http\Controllers;

use App\Events\AddDefaultTemplates;
use App\Events\NewBusiness;
use App\Events\NewSubBusiness;
use App\Http\Controllers\Route;
use App\Custom\Constant;
use App\Organization;
use App\ParentChildOrganizations;
use App\RoleUser;
use App\State;
use App\User;
use App\Role;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\withErrors;
use Illuminate\Validation\Rule;
use Session;
use Validator;


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
        $roles = Role::whereIn('id', [Constant::BUSINESS_ADMIN, Constant::BUSINESS_USER])->pluck('name', 'id');
        $organizationId = Auth::user()->organization_id;
        $arr = ParentChildOrganizations::where('parent_org_id', $organizationId)->pluck('child_org_id')->toArray();
        array_push($arr, $organizationId);

        $parentChildOrg = ParentChildOrganizations::where('parent_org_id', '=', Auth::user()->organization->id)->get();
        $parentOrgIds = $parentChildOrg->pluck('parent_org_id');
        $childOrgIds = $parentChildOrg->pluck('child_org_id');

        $childOrgNames = Organization::wherein('id', $arr)
            ->pluck('org_name', 'id');

        return view('users.show', compact('roles', 'childOrgNames'));
//        return view('users.show', compact('user', 'childOrgNames'));

    }

    public function indexUsers()
    {
        $organizationId = Auth::user()->organization_id;
        $arr = ParentChildOrganizations::where('parent_org_id', $organizationId)->pluck('child_org_id')->toArray();
        array_push($arr, $organizationId);
        $users = User::whereIn('organization_id', $arr)->get();
        $admin = $users[0];
        $users->shift();

        return view('users.indexUsers', compact('users', 'admin'));

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

        //fire AddDefaultTemplates event to update database with default email templates

        event(new AddDefaultTemplates($organization->id));

        if (env('securityquestion') == 'true') {
            return redirect('/securityquestions/create')->with('userId', $userid);
        } else {
            $credentials = array(
                'email' => $request->email,
                'password' => $request->password
            );

            if (Auth::attempt($credentials)) {
                return redirect('subscription');
            }
            else
            {
                return redirect('subscription');
            }
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $user_details = User::findOrFail(Auth::user()->id);
        $organization = Organization::findOrFail($user_details->organization_id);

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->user_name = $request->email;
        $user->email = $request->email;
        $string = str_random(10);
        $user->password = bcrypt($string);
        $user->street_address1 = $organization->street_address1;
        $user->street_address2 = $organization->street_address2;
        $user->city = $organization->city;
        $user->state = $organization->state;
        $user->zipcode = $organization->zipcode;
        $user->organization_id = $request->location;
        $user->phone_number = $organization->phone_number;

        $user->save();

        $user->roles()->attach($request->role_id);

        //fire NewBusiness event to initiate sending welcome mail

        event(new NewSubBusiness($user));


        return redirect('user/manageusers');
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
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|numeric|digits:10',
            'zipcode' => 'required|numeric|digits:5',
            'state' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
        ]);

        if ($validator->fails()) {
            return redirect() ->back()->withErrors($validator)->withInput();
        }
        $user = Auth::user();

        $userUpdate = $request->all();
        User::find($id)->update($userUpdate);

        return view('users.index', compact('user'));
    }

    public function editsubuser($id)
    {
        $roles = Role::whereIn('id', [Constant::BUSINESS_ADMIN, Constant::BUSINESS_USER])->pluck('name', 'id');
        $user = User::findOrFail($id);
        $parentChildOrg = ParentChildOrganizations::where('parent_org_id', '=', Auth::user()->organization->id)->get();
        $childOrgIds = $parentChildOrg->pluck('child_org_id');
        $parentOrgIds = $parentChildOrg->pluck('parent_org_id');
        $childOrgNames = Organization::wherein('id', $childOrgIds)
            ->orWhere('id', $parentOrgIds)
            ->pluck('org_name', 'id');

        $states = State::pluck('state_name', 'state_code');
        return view('users.editsubuser', compact('user', 'childOrgNames', 'roles'))->with('states', $states);
    }

    public function updatesubuser(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $userUpdate = $request->all();
        User::findorFail($id)->update($userUpdate);

        RoleUser::findorFail($id)->update($request->all());

        $organizationId = Auth::user()->organization_id;
        $arr = ParentChildOrganizations::where('parent_org_id', $organizationId)->pluck('child_org_id')->toArray();
        array_push($arr, $organizationId);
        $users = User::whereIn('organization_id', $arr)->get();
        $admin = $users[0];
        $users->shift();

        return view('users.indexUsers', compact('users', 'admin'));
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('users');
    }
}
