@extends('app')
@section('content')
    <h1>Create Security Question</h1>
    {!! Form::open(['url' => 'securityquestions']) !!}

    <div class="form-group">
        {!! Form::select('user_id', $users) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Question', 'Question:') !!}
        {!! Form::text('question',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Answer', 'Answer:') !!}
        {!! Form::text('answer',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop
