@extends('app')

@section('content')
    <h1>Profile Management</h1>
    <!--
    <a href="{{url('users')}}" class="btn btn-success"> Template</a>
        -->

    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Street Address 1</th>
            <th>Street Address 2</th>
            <th>City</th>
            <th>State</th>
            <th>Zip Code</th>
            <th>Phone Number</th>
            <th colspan="3"> You can </th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->street_address1 }}</td>
                <td>{{ $user->street_address2 }}</td>
                <td>{{ $user->city }}</td>
                <td>{{ $user->state }}</td>
                <td>{{ $user->zipcode }}</td>
                <td>{{ $user->phone_number }}</td>
                <td><a href="{{route('users.edit',$user->id)}}" class="btn btn-warning">Update</a></td>


            </tr>
        @endforeach

        </tbody>

    </table>
@endsection

