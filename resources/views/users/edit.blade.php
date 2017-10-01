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
                            {!! Form::label('First Name', '* First Name:', ['class'=>'col-md-4 control-label', ]) !!}
                            <div class="col-lg-6">
                                {!! Form::text('first_name',null,['required'], ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Last Name', '* Last Name:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">
                                {!! Form::text('last_name', null, ['required'], ['class' => 'form-control'] ) !!}</div>
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

                            <div class="col-md-6">

                                <select class="form-control" name="state" id="state" required autofocus>
                                    <option value="">Select State</option>
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District Of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                </select>

                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>

                            {{--<div class="col-lg-6">{!! Form::text('state',null,['required'],['class'=>'form-control' ]) !!}</div>--}}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Zip Code', '* Zip Code:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6"> {!! Form::text('zipcode',null,['required'],['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                            <div class="form-group">
                                {!! Form::label('Phone Number', '* Phone Number:', ['class'=>'col-md-4 control-label', 'id' => 'phonenumber']) !!}
                                <div class="col-lg-6">{!! Form::text('phone_number',null,['required'],['class'=>'form-control']) !!}
                                    @if ($errors->has('phonenumber'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phonenumber') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
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
