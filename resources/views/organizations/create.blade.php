@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Donation Request Form</div>

                    <div class="panel-body">
                        {!! Form::open(['action' => 'OrganizationController@create', 'class' => 'form-horizontal']) !!}

                        @include('organizations.form', ['submitButtonText' => 'Add Organization'])

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection