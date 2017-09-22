@extends('app')

@section('content')
    <h1>Profile Management</h1>
    <!--
    <a href="{{url('posts')}}" class="btn btn-success"> Template</a>
        -->

    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip Code</th>
            <th>Phone Number</th>
            <th>Company Name</th>
            <th>User Name</th>
            <th colspan="3"> You can </th>
        </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->first_name }}</td>
                <td>{{ $post->last_name }}</td>
                <td>{{ $post->address }}</td>
                <td>{{ $post->city }}</td>
                <td>{{ $post->state }}</td>
                <td>{{ $post->zip_code }}</td>
                <td>{{ $post->phone_number }}</td>
                <td>{{ $post->company_name }}</td>
                <td>{{ $post->user_name }}</td>
                <td><a href="{{route('posts.edit',$post->id)}}" class="btn btn-warning">Update</a></td>


            </tr>
        @endforeach

        </tbody>

    </table>
@endsection

