@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Security Questions Setup - {{ $user->first_name }} {{$user->last_name}}</div>
                    <div class="panel-body">
                        <div class="form-group{{ $errors->has('securityquestion1') ? ' has-error' : '' }}">
                            <label for="securityquestion1" class="control-label">First Security Question <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                            <div class="">
                                {!! Form::select('securityquestion1', array(null => 'Select...') + $securityquestions->all(), null, ['class'=>'form-control']) !!}
                                @if ($errors->has('securityquestion1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('securityquestion1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('answer1') ? ' has-error' : '' }}">
                            <label for="answer1" class="control-label">First Answer <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>
                            <div class="">
                                <input id="answer1" type="text" class="form-control" name="answer1" value="{{ old('answer1') }}" placeholder="Your First Answer" autocomplete="off" required autofocus>

                                @if ($errors->has('answer1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('answer1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('securityquestion2') ? ' has-error' : '' }}">
                            <label for="securityquestion2" class="control-label">Second Security Question <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                            <div class="">
                                {!! Form::select('securityquestion2', array(null => 'Select...') + $securityquestions->all(), null, ['class'=>'form-control']) !!}
                                @if ($errors->has('securityquestion2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('securityquestion2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('answer2') ? ' has-error' : '' }}">
                            <label for="answer2" class="control-label">Second Answer <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>
                            <div class="">
                                <input id="answer2" type="text" class="form-control" name="answer2" value="{{ old('answer2') }}" placeholder="Your Second Answer" autocomplete="off" required autofocus>

                                @if ($errors->has('answer2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('answer2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('securityquestion3') ? ' has-error' : '' }}">
                            <label for="securityquestion3" class="control-label">Third Security Question <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>

                            <div class="">
                                {!! Form::select('securityquestion3', array(null => 'Select...') + $securityquestions->all(), null, ['class'=>'form-control']) !!}
                                @if ($errors->has('securityquestion3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('securityquestion3') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('answer3') ? ' has-error' : '' }}">
                            <label for="answer3" class="control-label">Third Answer <span style="color: red; font-size: 20px; vertical-align:middle;">*</span></label>
                            <div class="">
                                <input id="answer3" type="text" class="form-control" name="answer3" value="{{ old('answer3') }}" placeholder="Your Third Answer" autocomplete="off" required autofocus>

                                @if ($errors->has('answer3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('answer3') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-4 col-md-offset-4">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>
            </div>
        </div>
    </div>
</div>
@stop