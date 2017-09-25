@extends('app')
@section('content')
    <h1>Check Security Questions</h1>



    {!! Form::model($securityquestion, ['method' => 'GET','action'=>['SecurityquestionController@check', $securityquestion->id]]) !!}

    <div class="form-group">
        {!! Form::label('Question', 'Question:') !!}
        {!! Form::text('question1',null,['class'=>'form-control','readonly']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Answer', 'Answer:') !!}
        {!! Form::text('a1',null,['class'=>'form-control', 'autocomplete'=>'off']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Question', 'Question:') !!}
        {!! Form::text('question2',null,['class'=>'form-control','readonly']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Answer', 'Answer:') !!}
        {!! Form::text('a2',null,['class'=>'form-control', 'autocomplete'=>'off']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Question', 'Question:') !!}
        {!! Form::text('question3',null,['class'=>'form-control','readonly']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Answer', 'Answer:') !!}
        {!! Form::text('a3',null,['class'=>'form-control', 'autocomplete'=>'off']) !!}
    </div>

    <h4 style="color:red">
        {!! session()->get('error') !!}
    </h4>

    <br>
    <div class="form-group">
        {!! Form::submit('Check Answer', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop