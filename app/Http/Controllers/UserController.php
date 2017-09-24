<?php

namespace App\Http\Controllers;

use Request;

use App\User;

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


    public function create()
    {
        return view('users.create');
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
        $user = array(
            'first_name' => 'required',
        );
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
