@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Create A User</div>
                    <div class="panel-body">

                        {{--{!! Form::open(['url' => 'users']) !!}--}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{ Form::hidden('organization_id', Auth::user()->organization_id) }}
                        {!! Form::open(['url' => 'users']) !!}

                        <div class="form-group">
                            {!! Form::label('First Name', 'First Name')!!}
                            <span style="color: red; font-size: 20px; vertical-align:middle;">*</span>
                            {!! Form::text('first_name',null,['class'=>'form-control', 'placeholder'=>'Enter Your First Name', 'required'])!!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Last Name', 'Last Name') !!}
                            <span style="color: red; font-size: 20px; vertical-align:middle;">*</span>
                            {!! Form::text('last_name',null,['class'=>'form-control', 'placeholder'=>'Enter Your Last Name','required']) !!}
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-Mail Address</label>
                            <span style="color: red; font-size: 20px; vertical-align:middle;">*</span>
                            <input id="email" type="email" class="form-control" name="email"
                                   placeholder="Enter Your Email Address"
                                   value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div class="form-group">
                            {!! Form::label('Business Location', 'Business Location') !!}
                            <span style="color: red; font-size: 20px; vertical-align:middle;">*</span>
                            {!! Form::select('location', array_merge(['' => '-- Please Select --'], $organizationStatusArray), null, ['class' => 'form-control', 'id' => 'loc-drop-down']) !!}
                        </div>

                        <div class="form-group" id="role-group" style="display:none">
                            {!! Form::label('Role', 'Role:') !!}
                            <span style="color: red; font-size: 20px; vertical-align:middle;">*</span>
                            {!! Form::select('role_id', $roles, null, ['class' => 'form-control', 'id' => 'locations-drop-down-parent']) !!}

                            {!! Form::select('role_id', [$roles[5]], null, ['class' => 'form-control', 'id' => 'locations-drop-down-child']) !!}
                        </div>

                    </div>


                    <div class="form-group">
                        <div class=" col-md-offset-4">
                            <button class="btn btn-primary" type="submit" class="" id="createbutton">Submit</button>
                            <input class="btn btn-primary" type="button" value="Cancel" onClick="history.go(-1);">
                            <span style="color: red"> <h5> Fields Marked With (*) Are Mandatory </h5></span>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <script>
        $("#loc-drop-down").change(function () {
            
            if (this.value == '') {
                document.getElementById("role-group").style.display = "none";
            } else {
                document.getElementById("role-group").style.display = "block";
                if (this.value.startsWith('parent')) {
                    document.getElementById("locations-drop-down-parent").style.display = "block";
                    document.getElementById("locations-drop-down-child").style.display = "none";
                } else if (this.value.startsWith('child')) {
                    document.getElementById("locations-drop-down-child").style.display = "block";
                    document.getElementById("locations-drop-down-parent").style.display = "none";
                }
            }

        });
    </script>
@stop
