@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1> View & Update Profile </h1></div>

                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr class="bg-info">
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone Number</th>
                                <th colspan="3">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->street_address1 }} {{ $user->street_address2 }} {{ $user->city }} {{ $user->state }} {{ $user->zipcode }}</td>
                                    <td>{{ $user->phone_number }}</td>
                                    <td><a href="{{route('users.edit',$user->id)}}" class="btn btn-warning"> Edit </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="panel-heading"><h1>Add a User</h1></div>
                        <td><a href="{{route('users.show',$user->id)}}" class="btn btn-warning"> Create Account </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection