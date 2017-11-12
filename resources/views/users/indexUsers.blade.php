@extends('layouts.app')
@section('content')
    <div class="container">
        @if(Session::has('flash_message'))
            <div class="col-md-8 alert alert-success">
                {{Session::get('flash_message')}}
            </div>
        @endif
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1> Manage Users </h1>
                        <a href="{{route('users.show', $admin->id)}}" class="btn btn-primary" style="position: absolute; top: 26px; right:32px;">[+] Add User </a>
                    </div>

                    <div class="panel-body">

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr class="bg-info">
                                <th class="text-center">Business User</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Business Location</th>
                                <th class="text-center">City & Zip code</th>
                                <th colspan="3" class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr class="text-center">
                                <td style="vertical-align: middle">{{ $user->first_name }} {{ $user->last_name }}</td>
                                <td style="vertical-align: middle">{{ $user->roles[0]->name }}</td>
                                <td style="vertical-align: middle">{{ $user->organization->org_name }}</td>
                                <td style="vertical-align: middle">{{ $user->organization->city }}, {{ $user->organization->zipcode }}</td>
                                <td style="vertical-align: middle"><a href="{{route('editsubuser',$user->id)}}" class="btn btn-warning"> Edit </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection