@extends('app')
@section('content')
    <h3>Update Profile</h3>

    {!! Form::model($user,['method' => 'PATCH','route'=>['users.update',$user->id]]) !!}

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="form-group" aria-colspan="">
        {!! Form::label('First Name', '* First Name:') !!}
        {!! Form::text('first_name',null,['required'],['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Last Name', '* Last Name:') !!}
        {!! Form::text('last_name',null,['required'],['class'=>'form-control'] ) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Email', '* Email:') !!}
        {!! Form::text('email',null,['required'],['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('Street Address1', '* Street Address 1:') !!}
        {!! Form::text('street_address1',null,['required'],['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Street Address2', 'Street Address 2:') !!}
        {!! Form::text('street_address2', null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('City', '* City:') !!}
        {!! Form::text('city',null,['required'],['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('State', '* State:') !!}
        {!! Form::text('state',null,['required'],['class'=>'form-control' ]) !!}


    </div>
    <div class="form-group">
        {!! Form::label('Zip Code', '* Zip Code:') !!}
        {!! Form::text('zipcode',null,['required'],['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Phone Number', '* Phone Number:') !!}
        {!! Form::text('phone_number',null,['required'],['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
        {!! Form::submit('Cancel', ['class' => 'btn btn-primary']) !!}

        <h3>Thank You</h3>
    </div>
    {!! Form::close() !!}
@stop
