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

    <div id="wrapper_1"; style="text-align: center"; aria-colcount="2">


        <div class="form-group"; >
            <div style="width:50%" align="left">  {!! Form::label('First Name', '* First Name:') !!} </div>
            <div style="width:50%" align="left">       {!! Form::text('first_name',null,['required'],['class'=>'form-control']) !!}</div>
    </div>

    <div class="form-group">
        <div style="width:50%" align="left">  {!! Form::label('Last Name', '* Last Name:') !!}</div>
        <div style="width:50%" align="left">  {!! Form::text('last_name',null,['required'],['class'=>'form-control'] ) !!}</div>
    </div>

    <div class="form-group">
        <div style="width:50%" align="left">  {!! Form::label('Email', '* Email:') !!}</div>
        <div style="width:50%" align="left">   {!! Form::text('email',null,['required'],['class'=>'form-control']) !!}</div>
    </div>


    <div class="form-group">
        <div style="width:50%" align="left">    {!! Form::label('Street Address1', '* Street Address 1:') !!}</div>
        <div style="width:50%" align="left">    {!! Form::text('street_address1',null,['required'],['class'=>'form-control']) !!}</div>
    </div>
    <div class="form-group">
        <div style="width:50%" align="left">  {!! Form::label('Street Address2', 'Street Address 2:') !!}</div>
        <div style="width:50%" align="left">   {!! Form::text('street_address2', null,['class'=>'form-control']) !!}</div>
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
    </div>
    {!! Form::close() !!}
@stop
