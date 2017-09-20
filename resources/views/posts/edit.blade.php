@extends('app')
@section('content')
    <h1>Update Profile</h1>
    {!! Form::model($post,['method' => 'PATCH','route'=>['posts.update',$post->id]]) !!}
    <div class="form-group">
        {!! Form::label('First Name', 'First Name:') !!}
        {!! Form::text('first_name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Last Name', 'Last Name:') !!}
        {!! Form::text('last_name',null,['class'=>'form-control']) !!}

        <div class="form-group">
            {!! Form::label('Address', 'Address:') !!}
            {!! Form::text('address',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('City', 'City:') !!}
            {!! Form::text('city',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('State', 'State:') !!}
            {!! Form::text('state',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Zip Code', 'Zip Code:') !!}
            {!! Form::text('zip_code',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Phone Number', 'Phone Number:') !!}
            {!! Form::text('phone_number',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Organization Name', 'Organization Name:') !!}
            {!! Form::text('organization_name',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('User Name', 'User Name:') !!}
            {!! Form::text('user_name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Password', 'Password:') !!}
            {!! Form::text('password',null,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
        {!! Form::submit('Cancel', ['class' => 'btn btn-primary']) !!}

        <h3> Thank You!!!</h3>
    </div>
    {!! Form::close() !!}
@stop
