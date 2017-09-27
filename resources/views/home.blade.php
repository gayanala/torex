@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <strong>{{$role}}</strong> is logged in!

                        <a href="{{route('reset-password')}}" class="btn btn-primary">Reset Password</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
