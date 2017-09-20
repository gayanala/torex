@extends('app')

@section('content')
        <h1>Profile Management</h1>
        <!--
    <a href="{{url('/posts/create')}}" class="btn btn-success"> Template</a>
        -->

    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip Code</th>
            <th>Phone Number</th>
            <th>Organization Name</th>
            <th colspan="3">More details</th>
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
                <td>{{ $post->organization_name }}</td>
                <td><a href="{{url('posts',$post->id)}}" class="btn btn-primary">View</a></td>
                <td><a href="{{route('posts.edit',$post->id)}}" class="btn btn-warning">Update</a></td>

                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['posts.destroy', $post->id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>



            </tr>
        @endforeach

        </tbody>

    </table>
@endsection

