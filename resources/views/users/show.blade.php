@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Create A User</div>
                    <div class="panel-body">
                        {!! Form::open(['url' => 'users']) !!}
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
                            {!! Form::label('First Name', 'First Name:', ['class'=>'col-md-4 control-label' ]) !!}
                            <div class="col-md-6">
                                {!! Form::text('first_name',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Last Name', 'Last Name:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">
                                {!! Form::text('last_name', null, ['class' => 'form-control'] ) !!}</div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Email', 'Email:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">
                                {!! Form::text('email', null, ['cass'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="">Submit</button>
                                <input type="button" value="Cancel" onClick="history.go(-1);">
                                <span style="color: red"> <h5> * All Fields Are Mandatory</h5></span>
                                <input type="button" value="Link to Registration Form"
                                       onClick="window.open('http://tagg-preprod.herokuapp.com/register', '_blank');"/>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
