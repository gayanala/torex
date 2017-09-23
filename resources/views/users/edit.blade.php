@extends('app')
@section('content')
    <h1>Update Profile</h1>

    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif

    @if(session('response'))
        <div class="col-md-8 alert alert-success">
            {{@session('response')}}
        </div>
    @endif

    {!! Form::model($user,['method' => 'PATCH','route'=>['users.update',$user->id]]) !!}

    <div class="form-group">
        {!! Form::label('First Name', 'First Name:') !!}
        {!! Form::text('first_name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Last Name', 'Last Name:') !!}
        {!! Form::text('last_name',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Email', 'Email:') !!}
        {!! Form::text('email',null,['class'=>'form-control']) !!}
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
        {!! Form::text('state',null,['class'=>'form-control' ]) !!}


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
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
        {!! Form::submit('Cancel', ['class' => 'btn btn-primary']) !!}

        <h2>Thank You</h2>
    </div>
    {!! Form::close() !!}
@stop
