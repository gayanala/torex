@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update Template</div>

                    <div class="panel-body">

                        {!! Form::model($emailtemplate,['method' => 'PATCH','route'=>['emailtemplates.edit', $emailtemplate->template_type_id], 'class' => 'form-horizontal']) !!}

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
                            {!! Form::label('Email Subject', '* Email Subject:', ['class'=>'col-md-4 control-label', ]) !!}
                            <div class="col-lg-6">
                                {!! Form::text('email_subject',null,['required'], ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('Email Message', '* Email Message:', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-lg-6">
                                {!! Form::text('email_message', null, ['required'], ['class' => 'form-control'] ) !!}</div>
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
