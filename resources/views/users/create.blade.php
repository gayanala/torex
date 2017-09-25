@extends('app')
@section('content')

    <h1>Template</h1>

    {!! Form::open(['url' => 'users']) !!}

    <div class="form-group">
        {!! Form::label('First Name', 'First Name:') !!}
        {!! Form::text('first_name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Last Name', 'Last Name:') !!}
        {!! Form::text('last_name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('User Name', 'User Name:') !!}
        {!! Form::text('user_name',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Email', 'Email:') !!}
        {!! Form::text('email',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Password', 'Password:') !!}
        {!! Form::text('password',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Street Address', 'Street Address 1:') !!}
        {!! Form::text('street_address1',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Street Address', 'Street Address 2:') !!}
        {!! Form::text('street_address2',null,['class'=>'form-control']) !!}
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
        {!! Form::text('zipcode',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Phone Number', 'Phone Number:') !!}
        {!! Form::text('phone_number',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop