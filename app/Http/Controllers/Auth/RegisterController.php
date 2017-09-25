<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed|string|min:6|',
            'street_address1' => 'required|string|max:255',
            'street_address1' => 'string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zipcode' => 'required',
            'phone_number' => 'required',

            /*'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed|string|min:6|',*/
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {dd('');
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'user_name' => $data['email'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'street_address1' => $data['street_address1'],
            'street_address2' => $data['street_address1'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zipcode' => $data['zipcode'],
            'phone_number' => $data['phone_number']
        ]);
    }
}
