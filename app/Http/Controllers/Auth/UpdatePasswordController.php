<?php
// Thanks to http://paulcracknell.com/9/create-a-change-password-page-laravel-5-3/ for the reset password code
namespace App\Http\Controllers\Auth;

use App\Events\PasswordUpdate;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    /*
    * Ensure the user is signed in to access this page
    */
    public function __construct()
    {

        $this->middleware('auth');

    }

    /**
     * Update the password for the user.
     *
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'old' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::find(Auth::id());
        $hashedPassword = $user->password;

        if (Hash::check($request->old, $hashedPassword)) {

            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();

            $request->session()->flash('success', 'Your password has been changed.');

            //Password changed email notification event trigger

            event(new PasswordUpdate($user));

            return back();
        }

        $request->session()->flash('failure', 'Your password has not been changed.');

        return back();


    }
}