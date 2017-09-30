@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Create A User </div>

                    <div class="panel-body">

                        {!! Form::model($user,['method' => 'PATCH', 'route'=>['users.update',$user->id], 'class' => 'form-horizontal']) !!}


                        <div class="form-group">
                            {!! Form::label('Email', 'Email:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">{!! Form::text('email',null,['required'],['class'=>'form-control']) !!}</div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <td><a href="{{route('register',$user->id)}}" class="btn btn-warning"> create acct </a>
                                </td>
                                {!! Form::submit('Cancel', ['class' => 'btn btn-primary']) !!}

                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection