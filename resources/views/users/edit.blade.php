@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update Profile</div>

                    <div class="panel-body">

                        {!! Form::model($user,['method' => 'PATCH','route'=>['users.update',$user->id], 'class' => 'form-horizontal']) !!}

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            {!! Form::label('First Name', '* First Name:', ['class'=>'col-md-4 control-label', ]) !!}
                            <div class="col-lg-6">
                                {!! Form::text('first_name',null,['required'], ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Last Name', '* Last Name:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">
                                {!! Form::text('last_name',null,['required'], ['class' => 'form-control'] ) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Email', '* Email:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">{!! Form::text('email',null,['required'],['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Street Address1', '* Street Address 1:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">{!! Form::text('street_address1',null,['required'],['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Street Address2', 'Street Address 2:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">   {!! Form::text('street_address2', null,[''],['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('City', '* City:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">{!! Form::text('city',null,['required'],['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('State', '* State:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">{!! Form::text('state',null,['required'],['class'=>'form-control' ]) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Zip Code', '* Zip Code:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6"> {!! Form::text('zipcode',null,['required'],['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Phone Number', '* Phone Number:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">{!! Form::text('phone_number',null,['required'],['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                                {!! Form::submit('Cancel', ['class' => 'btn btn-primary']) !!}
                                <span style="color: red"> <h5>Fields Marked With (<span
                                                style="color: red; font-size: 20px; vertical-align:middle;">*</span>) Are Mandatory</h5></span>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
