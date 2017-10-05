@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update Profile</div>

                    <div class="panel-body">

                        {!! Form::model($user,['method' => 'PATCH','route'=>['users.update', $user->id], 'class' => 'form-horizontal']) !!}

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
                            <label for="first_name" class="col-md-4 control-label"> First Name <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>
                            <div class="col-lg-6">
                                {!! Form::text('first_name',null,['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="col-md-4 control-label"> Last Name <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>
                            <div class="col-lg-6">
                                {!! Form::text('last_name', null,['class' => 'form-control', 'required']) !!}</div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>
                            <div class="col-lg-6">{!! Form::text('email',null,['class' => 'form-control', 'required']) !!}</div>
                        </div>

                        <div class="form-group">
                            <label for="street_address1" class="col-md-4 control-label">Address 1 <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>
                            <div class="col-lg-6">{!! Form::text('street_address1',null,['class' => 'form-control', 'required']) !!}</div>
                        </div>

                        <div class="form-group">
                            <label for="street_address2" class="col-md-4 control-label"> Address 2 </label>
                            <div class="col-lg-6">   {!! Form::text('street_address2', null,['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            <label for="city" class="col-md-4 control-label">City <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>
                            <div class="col-lg-6">{!! Form::text('city',null,['class' => 'form-control', 'required']) !!}</div>
                        </div>

                        <div class="form-group">
                            <label for="state" class="col-md-4 control-label">State <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                            <div class="col-md-6">

                                {!! Form::select('state', array(null => 'Select...') + $states->all(), null, ['class'=>'form-control']) !!}

                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>

                            {{--<div class="col-lg-6">{!! Form::text('state',null,['required'],['class'=>'form-control' ]) !!}</div>--}}
                        </div>

                        <div class="form-group">
                            <label for="zipcode" class="col-md-4 control-label">Zipcode <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>
                            <div class="col-lg-6"> {!! Form::text('zipcode',null,['class' => 'form-control', 'required']) !!}</div>
                        </div>

                        <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                                <label for="phone_number" class="col-md-4 control-label">Phone Number <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>
                                <div class="col-lg-6">
                                    {!! Form::text('phone_number',null,['class' => 'form-control', 'required']) !!}
                                    @if ($errors->has('phonenumber'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phonenumber') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                                <a href="{{ route('users.index')}}" class="btn btn-primary">Cancel</a>
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
