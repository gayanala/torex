@extends('app')
@section('content')

    <h1>Template</h1>

    {!! Form::open(['url' => 'posts']) !!}

    <div class="form-group">
        {!! Form::label('First Name', 'First Name:') !!}
        {!! Form::text('first_name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Last Name', 'Last Name:') !!}
        {!! Form::text('last_name',null,['class'=>'form-control']) !!}
    </div>

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
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop
